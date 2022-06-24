<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sertifikat');
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
            $data['title'] = 'Sertifikat';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();
            $data['get_sertifikat'] = $this->db->get('tb_sertifikat')->result_array();

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
            $data['title'] = 'Sertifikat';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            $this->db->order_by('id', 'desc');
            $data['get_nilai_h'] = $this->m_sertifikat->get_nilai_h();
            $data['get_nilai_s'] = $this->m_sertifikat->get_nilai_s();

            $this->form_validation->set_rules('img_sertifikat', 'id user', 'trim');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('tambah', $data, FALSE);
            } else {

                $config['upload_path']    = './assets/backend/images/upload/';
                $config['allowed_types']  = 'jpg|png|jpeg';
                $config['max_size']       = '1024';
                $config['encrypt_name']    = TRUE;

                $this->load->library('upload', $config);

                if (!empty($_FILES['img_sertifikat'])) {
                    # code...
                    $this->upload->do_upload('img_sertifikat');
                    $data_img = $this->upload->data();
                    $file_img = $data_img['file_name'];
                } else {
                    $this->session->set_flashdata(
                        'error',
                        '$(document).ready(function(e) {
                            Swal.fire({
                                icon: "error",
                                type: "error",
                                title: "Oops...",
                                text: "Gambar gagal diupload!"
                            })
                        })'
                    );
                    redirect('sertifikat', 'refresh');
                }

                $this->m_sertifikat->tambah($file_img);
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
                redirect('sertifikat', 'refresh');
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
            $data['title'] = 'Sertifikat';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            $this->db->order_by('id', 'desc');
            $data['get_mahasiswa'] = $this->db->get('tb_register')->result_array();

            $getid = base64_decode($id);
            $data['get_sertifikat'] = $this->m_sertifikat->get_sertifikat_id($getid);

            $this->form_validation->set_rules('user_id', 'id user', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('edit', $data, FALSE);
            } else {

                $config['upload_path']    = './assets/backend/images/upload/';
                $config['allowed_types']  = 'jpg|png|jpeg';
                $config['max_size']       = '1024';
                $config['encrypt_name']    = TRUE;

                $this->load->library('upload', $config);

                if (!empty($_FILES['img_sertifikat'])) {
                    # code...
                    $this->upload->do_upload('img_sertifikat');
                    $data_img = $this->upload->data();
                    $file_img = $data_img['file_name'];
                } else {
                    $this->session->set_flashdata(
                        'error',
                        '$(document).ready(function(e) {
                            Swal.fire({
                                icon: "error",
                                type: "error",
                                title: "Oops...",
                                text: "Gambar gagal diupload!"
                            })
                        })'
                    );
                    redirect('sertifikat', 'refresh');
                }

                $this->m_sertifikat->edit($file_img);
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
                redirect('sertifikat', 'refresh');
            }
        }
    }

    public function cetak_sertifikat($id)
    {
        $data['title'] = "Sertifika";
        $getid = base64_decode($id);
        $data['get_sertifikat'] = $this->db->get_where('tb_sertifikat', ['id' => $getid])->row_array();
        $this->load->view('cetak-sertifikat', $data, FALSE);
    }

    public function cetak_sertifikat_software($id)
    {
        $data['title'] = "Sertifika";
        $nilai = $this->db->get_where('tb_nilai_s', ['nim' => $id])->row();
        $sertifikat = $this->db->get_where('tb_sertifikat', ['nilai_soft_id' => $nilai->id])->row_array();
        $data['get_sertifikat'] = $this->db->get_where('tb_sertifikat', ['id' => $sertifikat['id']])->row_array();
        $this->load->view('cetak-sertifikat', $data, FALSE);
    }

    public function cetak_sertifikat_hardware($id)
    {
        $data['title'] = "Sertifika";
        $nilai = $this->db->get_where('tb_nilai_h', ['nim' => $id])->row();
        $sertifikat = $this->db->get_where('tb_sertifikat', ['nilai_hard_id' => $nilai->id])->row_array();
        $data['get_sertifikat'] = $this->db->get_where('tb_sertifikat', ['id' => $sertifikat['id']])->row_array();
        $this->load->view('cetak-sertifikat', $data, FALSE);
    }

    public function detail($id)
    {
        $data['title'] = "Sertifika";
        $getid = base64_decode($id);
        $data['get_sertifikat'] = $this->db->get_where('tb_sertifikat', ['id' => $getid])->row_array();
        $this->load->view('detail', $data, FALSE);
    }

    public function hapus($id)
    {
        $getid = base64_decode($id);
        $this->db->delete('tb_sertifikat', ['id' => $getid]);
        redirect('sertifikat', 'refresh');
    }

    public function hapus_all()
    {
        $getid = $_POST['id'];
        $this->m_sertifikat->hapus_all($getid);
        redirect('sertifikat', 'refresh');
    }
}

/* End of file Konfigurasi.php */
