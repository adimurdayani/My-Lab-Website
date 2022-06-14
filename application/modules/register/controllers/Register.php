<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_register');
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
            $data['title'] = 'Register';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_register'] = $this->db->get('tb_register')->result();
            $data['get_kategori_register'] = $this->db->get('tb_kategori_register')->result();

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
        $this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required');
        $this->form_validation->set_rules('nim', 'nim', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[8]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'password confirm', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "' . validation_errors() . '"
                    })
                })'
            );

            redirect('register');
        } else {

            $data = [
                'nim' => $this->input->post('nim'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'kelamin' => $this->input->post('kelamin'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'active' => 0,
                'created_at' => date("Y-m-d")
            ];

            $this->db->insert('tb_register', $data);
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
            redirect('register', 'refresh');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required');
        $this->form_validation->set_rules('nim', 'nim', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[8]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'password confirm', 'required');

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

            redirect('register', 'refresh');
        } else {

            $id = $this->input->post('id');

            $data = [
                'nim' => $this->input->post('nim'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'kelamin' => $this->input->post('kelamin'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'updated_at' => date("Y-m-d")
            ];

            $this->db->where('id', $id);
            $this->db->update('tb_register', $data);
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
            redirect('register', 'refresh');
        }
    }

    public function active()
    {
        $this->form_validation->set_rules('active', 'aktifasi akun', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Gagal Aktivasi!"
                    })
                })'
            );

            redirect('register', 'refresh');
        } else {
            $id = $this->input->post('id');
            $data = [
                'updated_at' => date("Y-m-d"),
                'active' => $this->input->post('active'),
            ];

            $this->db->where('id', $id);
            $this->db->update('tb_register', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Berhasil diaktivasi!"
                    })
                })'
            );
            redirect('register', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('tb_register', ['id' => $id]);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Data berhasil dihapus!"
                })
            })'
        );
        redirect('register', 'refresh');
    }

    public function hapus_all()
    {
        $id = $_POST['id'];
        if (!empty($id)) {
            $this->m_register->delete($id);
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
            redirect('register');
        } else {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Data gagal dihapus!"
                    })
                })'
            );
            redirect('register');
        }
    }
}

/* End of file Konfigurasi.php */
