<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_soft extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_nilai');
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
            $data['title'] = 'Nilai Praktikum Software';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_nim'] = $this->db->get('tb_pendaftaran_s')->result();
            $data['get_kategori_lab'] = $this->db->get('tb_kategori_register')->result();
            $data['get_nilai_soft'] = $this->m_nilai->get_nilai_s();
            $data['get_kategori_praktikum'] = $this->db->get('tb_kategori_praktikum')->result();

            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('index_soft', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nim', 'nim', 'trim|required');
        $this->form_validation->set_rules('nilai_tugas', 'nilai tugas', 'trim|required');
        $this->form_validation->set_rules('nilai_uas', 'nilai uas', 'trim|required');

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
            redirect('nilai/nilai_soft', 'refresh');
        } else {
            $data = [
                'kategori_lab' => $this->input->post('kategori_lab'),
                'nim' => $this->input->post('nim'),
                'nilai_tugas' => $this->input->post('nilai_tugas'),
                'nilai_uas' => $this->input->post('nilai_uas'),
                'created_at' => date("d M Y"),
                'updated_at' => date("d M Y"),
                'kategori_praktikum_id' => $this->input->post('kategori_praktikum_id')
            ];
            $this->db->insert('tb_nilai_s', $data);
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
            redirect('nilai/nilai_soft', 'refresh');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nim', 'nim', 'trim|required');
        $this->form_validation->set_rules('nilai_tugas', 'nilai tugas', 'trim|required');
        $this->form_validation->set_rules('nilai_uas', 'nilai uas', 'trim|required');

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
            redirect('nilai/nilai_soft', 'refresh');
        } else {
            $id = $this->input->post('id');

            $data = [
                'kategori_lab' => $this->input->post('kategori_lab'),
                'nim'           => $this->input->post('nim'),
                'nilai_tugas'   => $this->input->post('nilai_tugas'),
                'nilai_uas'     => $this->input->post('nilai_uas'),
                'updated_at'    => date("d M Y"),
                'kategori_praktikum_id' => $this->input->post('kategori_praktikum_id')
            ];
            $this->db->where('id', $id);
            $this->db->update('tb_nilai_s', $data);
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
            redirect('nilai/nilai_soft', 'refresh');
        }
    }

    public function hapus($id)
    {
        $decode = base64_decode($id);
        $this->db->delete('tb_nilai_s', ['id' => $decode]);
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
        redirect('nilai/nilai_soft', 'refresh');
    }

    public function hapus_all()
    {
        $id = $_POST['id'];
        $this->m_nilai->delete_soft($id);
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
        redirect('nilai/nilai_soft');
    }
}

/* End of file Nilai_soft.php */
