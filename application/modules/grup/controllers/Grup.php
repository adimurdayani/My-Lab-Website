<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Grup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_grup');
    }


    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = 'Grup User';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('grup', $data, FALSE);
        }
    }

    public function load_data()
    {
        $data =  $this->m_grup->get_grup();
        echo json_encode($data);
    }

    public function tambah()
    {
        $data = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description')
        ];
        $this->m_grup->tambah_grup($data);
    }

    public function update()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->m_grup->update_grup($data, $this->input->post('id'));
    }

    public function delete()
    {
        $this->m_grup->delete_grup($this->input->post('id'));
    }
}

/* End of file Grup.php */
