<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kelompok');
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
            $data['title'] = "Data kelompok";
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_data'] = $this->m_kelompok->get_data();
            $data['get_mahasiswa'] = $this->m_kelompok->get_mahasiswa();

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
            $this->form_validation->set_rules('nim', 'nim', 'trim');
            $this->form_validation->set_rules('nama', 'nama', 'trim');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata(
                    'error',
                    '$(document).ready(function(e) {
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "Oops...",
                            text: "Data gagal disimpan!"
                        })
                    })'
                );
                redirect('kelompok');
            } else {
                $this->m_kelompok->tambah();
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
                redirect('kelompok', 'refresh');
            }
        }
    }

    public function edit()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $this->form_validation->set_rules('nim', 'nim', 'trim');
            $this->form_validation->set_rules('nama', 'nama', 'trim');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata(
                    'error',
                    '$(document).ready(function(e) {
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "Oops...",
                            text: "Data gagal disimpan!"
                        })
                    })'
                );
                redirect('kelompok');
            } else {
                $this->m_kelompok->edit();
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
                redirect('kelompok', 'refresh');
            }
        }
    }

    public function hapus($id)
    {
        $this->m_kelompok->hapus($id);
        redirect('kelompok', 'refresh');
    }

    public function hapus_all()
    {
        $id = $_POST['id'];
        if (!empty($id)) {
            $this->m_kelompok->hapus_all($id);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Semua data berhasil dihapus!"
                })
            })'
            );
            redirect('kelompok');
        } else {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                Swal.fire({
                    type: "error",
                    title: "Gagal",
                    text: "Data yang dipilih tidak ada!"
                })
            })'
            );
            redirect('kelompok');
        }
    }
}

/* End of file Kelompok.php */
