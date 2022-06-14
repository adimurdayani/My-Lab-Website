<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal');
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
            $data['title'] = 'Jadwal';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_jadwal'] = $this->db->get('tb_jadwal')->result();
            $data['get_kategori_praktikum'] = $this->db->get('tb_kategori_praktikum')->result();

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
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('nama_dosen', 'nama dosen', 'trim|required');
        $this->form_validation->set_rules('jam', 'jam', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Jadwal gagal disimpan!"
                    })
                })'
            );
            redirect('jadwal', 'refresh');
        } else {
            $data = [
                'judul'  => $this->input->post('judul'),
                'keterangan'  => $this->input->post('keterangan'),
                'tanggal'  => $this->input->post('tanggal'),
                'nama_dosen'  => $this->input->post('nama_dosen'),
                'jam'  => $this->input->post('jam')
            ];
            $this->db->insert('tb_jadwal', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Jadwal berhasil disimpan!"
                    })
                })'
            );
            redirect('jadwal', 'refresh');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('nama_dosen', 'nama dosen', 'trim|required');
        $this->form_validation->set_rules('jam', 'jam', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Jadwal gagal disimpan!"
                    })
                })'
            );
            redirect('jadwal', 'refresh');
        } else {
            $id  = $this->input->post('id');

            $data = [
                'judul'  => $this->input->post('judul'),
                'keterangan'  => $this->input->post('keterangan'),
                'tanggal'  => $this->input->post('tanggal'),
                'nama_dosen'  => $this->input->post('nama_dosen'),
                'jam'  => $this->input->post('jam')
            ];
            $this->db->where('id', $id);
            $this->db->update('tb_jadwal', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Jadwal berhasil update!"
                    })
                })'
            );
            redirect('jadwal', 'refresh');
        }
    }

    public function hapus($id)
    {
        $decode = base64_decode($id);
        $this->db->delete('tb_jadwal', ['id' => $decode]);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Jadwal berhasil dihapus!"
                })
            })'
        );
        redirect('jadwal', 'refresh');
    }

    public function hapus_all()
    {
        $id = $_POST['id'];
        $this->m_jadwal->delete($id);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Semua data jadwal berhasil dihapus!"
                })
            })'
        );
        redirect('jadwal');
    }
}

/* End of file Konfigurasi.php */
