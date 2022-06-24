<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_informasi');
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
            $data['title'] = 'Informasi';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_informasi'] = $this->m_informasi->get_informasi();
            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('index', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function tambah()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = 'Informasi';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_informasi'] = $this->db->get('tb_informasi')->result();
            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();
            $data['get_kategori_register'] = $this->db->get('tb_kategori_register')->result_array();

            $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('tambah', $data, FALSE);
                $this->load->view('template/footer', $data, FALSE);
            } else {
                $this->m_informasi->tambah();

                $this->session->set_flashdata(
                    'success',
                    '$(document).ready(function(e) {
                        Swal.fire({
                            type: "success",
                            title: "Sukses",
                            text: "Data berhasil disimpan!"
                        })
                    })'
                );
                redirect('informasi', 'refresh');
            }
        }
    }

    public function edit($id)
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = 'Informasi';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

            $getid = base64_decode($id);
            $data['get_informasi'] = $this->m_informasi->get_informasi_id($getid);
            $this->db->order_by('id', 'desc');

            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();
            $data['get_kategori_register'] = $this->db->get('tb_kategori_register')->result_array();

            $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('edit', $data, FALSE);
                $this->load->view('template/footer', $data, FALSE);
            } else {
                $this->m_informasi->edit();
                $this->session->set_flashdata(
                    'success',
                    '$(document).ready(function(e) {
                        Swal.fire({
                            type: "success",
                            title: "Sukses",
                            text: "Data berhasil diupdate!"
                        })
                    })'
                );
                redirect('informasi', 'refresh');
            }
        }
    }

    public function hapus($id)
    {
        $getid = base64_decode($id);
        $this->db->delete('tb_informasi', ['id' => $getid]);
        redirect('informasi', 'refresh');
    }

    public function hapus_all()
    {
        $getid = $_POST['id'];
        $this->m_informasi->hapus_all($getid);
        redirect('informasi', 'refresh');
    }
}

/* End of file Konfigurasi.php */
