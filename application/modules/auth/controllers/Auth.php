<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function index()
    {
        $data['title'] = "Login";
        // $this->load->view('index', $data, FALSE);

        $this->data['title'] = $this->lang->line('login_heading');

        $ip = $this->input->ip_address();
        $date = date("Y-m-d");
        $waktu = time();
        $timeinsert = date("Y-m-d H:i:s");
        $browser = $this->agent->browser();
        $browser_versi = $this->agent->version();
        $os = $this->agent->platform();

        // cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $cek_ip = $this->db->query("SELECT * FROM tb_visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        $cek_user_ip = isset($cek_ip) ? ($cek_ip) : 0;

        // kalau belum ada, simpan data user tersebut ke database
        if ($cek_user_ip == 0) {
            $this->db->query("INSERT INTO tb_visitor(ip, date, hits, os, browser, versi, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $os . "','" . $browser . "','" . $browser_versi . "','" . $waktu . "','" . $timeinsert . "')");
        } else { //jika sudah ada, update
            $this->db->query("UPDATE tb_visitor SET hits=hits+1, os='" . $os . "', browser='" . $browser . "', versi='" . $browser_versi . "', online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }

        // validate form input
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if ($this->form_validation->run() === TRUE) {
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool)$this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('dashboard', 'refresh');
            } else {
                // if the login was un-successful
                // redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('auth', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } else {
            // the user is not logging in so display the login page
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['identity'] = [
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            ];

            $this->data['password'] = [
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
            ];

            $this->_render_page(DIRECTORY_SEPARATOR . 'index', $this->data);
        }
    }

    public function logout()
    {
        $this->data['title'] = "Logout";

        // log the user out
        $this->ion_auth->logout();

        // redirect them to the login page
        redirect('auth', 'refresh');
    }

    public function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return [$key => $value];
    }

    /**
     * @return bool Whether the posted CSRF token matches
     */
    public function _valid_csrf_nonce()
    {
        $csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
        if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue')) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * @param string     $view
     * @param array|null $data
     * @param bool       $returnhtml
     *
     * @return mixed
     */
    public function _render_page($view, $data = NULL, $returnhtml = FALSE) //I think this makes more sense
    {

        $viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $viewdata, $returnhtml);

        // This will return html on 3rd argument being true
        if ($returnhtml) {
            return $view_html;
        }
    }

    public function block()
    {
        $this->load->view('blocked');
    }
}

/* End of file Auth.php */
