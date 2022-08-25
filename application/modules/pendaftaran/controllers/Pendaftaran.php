<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pendaftaran');
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
            $data['title'] = 'Pendaftaran Hardware';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_pendaftaran'] = $this->m_pendaftaran->get_pendaftaran();
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

            $data['title'] = 'Tambah Pendaftaran Hardware';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_kategori_praktikum'] = $this->db->get('tb_kategori_praktikum')->result();
            $data['kode'] = $this->generate_code(10);
            $data['get_kategori_register'] = $this->db->get('tb_kategori_register')->result();
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();
            $data['get_register'] = $this->db->get('tb_register')->result();

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
        $this->form_validation->set_rules('nim', 'nim', 'trim|required|is_unique[tb_pendaftaran_h.nim]');
        $this->form_validation->set_rules('kategori_id', 'kategori praktikum', 'trim|required');
        $this->form_validation->set_rules('semester', 'semester', 'trim|required');
        $this->form_validation->set_rules('nama_ortu', 'nama ortu', 'trim|required');
        $this->form_validation->set_rules('pekerjaan_ortu', 'pekerjaan ortu', 'trim|required');
        $this->form_validation->set_rules('alamat_ortu', 'alamat ortu', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
        $this->form_validation->set_rules('agama', 'agama', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Data pendaftaran gagal disimpan!"
                    })
                })'
            );
            redirect('pendaftaran', 'refresh');
        } else {
            $config['upload_path']    = './assets/backend/images/upload/';
            $config['allowed_types']  = 'jpg|png|jpeg|svg';
            $config['max_size']       = '1024';
            $config['encrypt_name']    = TRUE;

            $this->load->library('upload', $config);

            if (!empty($_FILES['image'])) {
                # code...
                $this->upload->do_upload('image');
                $data_icon = $this->upload->data();
                $file_icon = $data_icon['file_name'];
            }

            $data = [
                'daftar_id'             => $this->input->post('daftar_id'),
                'nama'                  => $this->input->post('nama'),
                'nim'                   => $this->input->post('nim'),
                'kelamin'               => $this->input->post('kelamin'),
                'agama'                 => $this->input->post('agama'),
                'kategori_id'           => $this->input->post('kategori_id'),
                'kategori_lab'          => 3,
                'semester'              => $this->input->post('semester'),
                'alamat'                => $this->input->post('alamat'),
                'nama_ortu'             => $this->input->post('nama_ortu'),
                'pekerjaan_ortu'        => $this->input->post('pekerjaan_ortu'),
                'alamat_ortu'           => $this->input->post('alamat_ortu'),
                'kabupaten'             => $this->input->post('kabupaten'),
                'provinsi'              => $this->input->post('provinsi'),
                'created_at'            => date("d-m-Y"),
                'image'              => $file_icon
            ];

            $this->db->insert('tb_pendaftaran_h', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Data pendaftaran berhasil disimpan!"
                    })
                })'
            );
            redirect('pendaftaran', 'refresh');
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
            $data['title'] = 'Tambah Pendaftaran Hardware';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $decode = base64_decode($id);
            $data['get_pendaftaran'] = $this->db->get_where('tb_pendaftaran_h', ['id' => $decode])->row();
            $data['get_kategori_praktikum'] = $this->db->get('tb_kategori_praktikum')->result();
            $data['get_kategori_register'] = $this->db->get('tb_kategori_register')->result();
            $data['get_register'] = $this->db->get('tb_register')->result();

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
        $this->form_validation->set_rules('kategori_id', 'kategori praktikum', 'trim|required');
        $this->form_validation->set_rules('semester', 'semester', 'trim|required');
        $this->form_validation->set_rules('nama_ortu', 'nama ortu', 'trim|required');
        $this->form_validation->set_rules('pekerjaan_ortu', 'pekerjaan ortu', 'trim|required');
        $this->form_validation->set_rules('alamat_ortu', 'alamat ortu', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
        $this->form_validation->set_rules('agama', 'agama', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Data pendaftaran gagal disimpan!"
                    })
                })'
            );
            redirect('pendaftaran', 'refresh');
        } else {
            $id = $this->input->post('id');

            $config['upload_path']    = './assets/backend/images/upload/';
            $config['allowed_types']  = 'jpg|png|jpeg|svg';
            $config['max_size']       = '1024';
            $config['encrypt_name']    = TRUE;

            $this->load->library('upload', $config);

            if (!empty($_FILES['image'])) {
                # code...
                $this->upload->do_upload('image');
                $data_icon = $this->upload->data();
                $file_icon = $data_icon['file_name'];
            }

            $data = [
                'nama'                  => $this->input->post('nama'),
                'nim'                   => $this->input->post('nim'),
                'kelamin'               => $this->input->post('kelamin'),
                'agama'                 => $this->input->post('agama'),
                'kategori_id'           => $this->input->post('kategori_id'),
                'kategori_lab'          => 3,
                'semester'              => $this->input->post('semester'),
                'alamat'                => $this->input->post('alamat'),
                'nama_ortu'             => $this->input->post('nama_ortu'),
                'pekerjaan_ortu'        => $this->input->post('pekerjaan_ortu'),
                'alamat_ortu'           => $this->input->post('alamat_ortu'),
                'kabupaten'             => $this->input->post('kabupaten'),
                'provinsi'              => $this->input->post('provinsi'),
                'updated_at'            => date("d-m-Y"),
                'image'              => $$file_icon
            ];

            $this->db->where('id', $id);
            $this->db->update('tb_pendaftaran_h', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Data pendaftaran berhasil diupdate!"
                    })
                })'
            );
            redirect('pendaftaran', 'refresh');
        }
    }

    public function hapus($id)
    {
        $decode = base64_decode($id);
        $this->db->delete('tb_pendaftaran_h', ['id' => $decode]);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Data pendaftaran berhasil dihapus!"
                })
            })'
        );
        redirect('pendaftaran', 'refresh');
    }

    public function hapus_all()
    {
        $id = $_POST['id'];
        $this->m_pendaftaran->delete($id);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Semua data pendaftaran berhasil dihapus!"
                })
            })'
        );
        redirect('pendaftaran');
    }

    private function generate_code($panjang_angka)
    {
        $code = '1234567890QWERTYUIOPASDFGHJKLZXCVBNM' . time();
        $string = '';
        for ($i = 0; $i < $panjang_angka; $i++) {
            $pos = rand(0, strlen($code) - 1);
            $string .= $code[$pos];
        }
        return 'HW-' . date('Y') . '/' . date('m') . '/' . $string;
    }

    public function cetak()
    {
        $semester = $this->input->post('semester');
        $this->db->where('semester', $semester);
        $data['get_data'] = $this->db->get('tb_pendaftaran_h')->result();
        $this->load->view('cetak', $data, FALSE);
    }
}

/* End of file Konfigurasi.php */
