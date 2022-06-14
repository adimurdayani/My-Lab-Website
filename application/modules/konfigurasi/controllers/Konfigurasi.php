<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = 'Konfigurasi Website';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_total'] = $this->db->get('tb_konfigurasi')->num_rows();

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
        $this->form_validation->set_rules('nama_web', 'nama web', 'trim|required');

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
            redirect('konfigurasi', 'refresh');
        } else {

            $config['upload_path']    = './assets/backend/images/upload/';
            $config['allowed_types']  = 'jpg|png|jpeg|svg';
            $config['max_size']       = '1024';
            $config['encrypt_name']    = TRUE;

            $this->load->library('upload', $config);

            if (!empty($_FILES['icon_web'])) {
                # code...
                $this->upload->do_upload('icon_web');
                $data_icon = $this->upload->data();
                $file_icon = $data_icon['file_name'];
            }

            $data = [
                'nama_web' => $this->input->post('nama_web'),
                'icon_web' => $file_icon,
                'created_at' => date("d M Y")
            ];
            $this->db->insert('tb_konfigurasi', $data);
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
            redirect('konfigurasi', 'refresh');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama_web', '', 'trim|required');

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
            redirect('konfigurasi', 'refresh');
        } else {

            $id = $this->input->post('id');

            $config['upload_path']    = './assets/backend/images/upload/';
            $config['allowed_types']  = 'jpg|png|jpeg|svg';
            $config['max_size']       = '1024';
            $config['encrypt_name']    = TRUE;

            $this->load->library('upload', $config);

            if (!empty($_FILES['icon_web'])) {
                # code...
                $this->upload->do_upload('icon_web');
                $data_icon = $this->upload->data();
                $file_icon = $data_icon['file_name'];
            }

            $data = [
                'nama_web' => $this->input->post('nama_web'),
                'icon_web' => $file_icon,
                'updated_at' => date("d M Y")
            ];

            $this->db->where('id', $id);
            $this->db->update('tb_konfigurasi', $data);
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
            redirect('konfigurasi', 'refresh');
        }
    }
}

/* End of file Konfigurasi.php */
