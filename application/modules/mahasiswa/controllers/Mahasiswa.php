<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_mahasiswa');
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
            $data['title'] = "Mahasiswa";
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_mahasiswa'] = $this->db->get('tb_mahasiswa')->result();

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
            $data['title'] = "Tambah Mahasiswa";
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_kategori_jurusan'] = $this->db->get('tb_kategori_jurusan')->result();

            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('tambah', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function post()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('nim', 'nim', 'trim|required|is_unique[tb_mahasiswa.nim]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Data mahasiswa gagal disimpan!"
                    })
                })'
            );
            redirect('mahasiswa', 'refresh');
        } else {
            $data = [
                'nim'           => $this->input->post('nim'),
                'nama'          => $this->input->post('nama'),
                'angkatan'   => $this->input->post('angkatan'),
            ];
            $this->db->insert('tb_mahasiswa', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Data mahasiswa berhasil disimpan!"
                    })
                })'
            );
            redirect('mahasiswa', 'refresh');
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
            $data['title'] = "Tambah Mahasiswa";
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $decode = base64_decode($id);
            $data['get_mahasiswa'] = $this->db->get_where('tb_mahasiswa', ['id' => $decode])->row();
            $data['get_kategori_jurusan'] = $this->db->get('tb_kategori_jurusan')->result();

            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('edit', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('nim', 'nim', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Data mahasiswa gagal disimpan!"
                    })
                })'
            );
            redirect('mahasiswa', 'refresh');
        } else {
            $id = $this->input->post('id');

            $data = [
                'nim'           => $this->input->post('nim'),
                'nama'          => $this->input->post('nama'),
                'angkatan'   => $this->input->post('angkatan'),
            ];
            $this->db->where('id', $id);
            $this->db->update('tb_mahasiswa', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Data mahasiswa berhasil terupdate!"
                    })
                })'
            );
            redirect('mahasiswa', 'refresh');
        }
    }

    public function hapus($id)
    {
        $decode = base64_decode($id);
        $this->db->delete('tb_mahasiswa', ['id' => $decode]);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Data mahasiswa berhasil dihapus!"
                })
            })'
        );
        redirect('mahasiswa', 'refresh');
    }

    public function hapus_all()
    {
        $id = $_POST['id'];
        if (!empty($id)) {
            $this->m_mahasiswa->delete($id);
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
            redirect('mahasiswa');
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
            redirect('mahasiswa');
        }
    }
}

/* End of file Mahasiswa.php */
