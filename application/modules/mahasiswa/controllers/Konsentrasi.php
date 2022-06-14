<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konsentrasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konsentrasi');
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
            $data['title'] = "Data Konsentrasi";
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('konsentrasi', $data, FALSE);
        }
    }

    public function load_data()
    {
        $data =  $this->m_konsentrasi->get_konsentrasi();
        echo json_encode($data);
    }

    public function tambah()
    {
        $data = [
            'kategori' => $this->input->post('kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'created_at' => date("Y-m-d")
        ];
        $this->m_konsentrasi->tambah_konsentrasi($data);
    }

    public function update()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->m_konsentrasi->update_konsentrasi($data, $this->input->post('id'));
    }

    public function delete()
    {
        $this->m_konsentrasi->delete_konsentrasi($this->input->post('id'));
    }
}

/* End of file Konsentrasi.php */
