<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_soft extends CI_Controller
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
            $data['title'] = 'Pendaftaran Software';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_pendaftaran'] = $this->m_pendaftaran->get_pendaftaran_soft();

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
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {

            $data['title'] = 'Tambah Pendaftaran Software';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_kategori_praktikum'] = $this->db->get('tb_kategori_praktikum')->result();
            $data['get_kategori_register'] = $this->db->get('tb_kategori_register')->result();
            $data['get_register'] = $this->db->get('tb_register')->result();
            $data['kode'] = $this->generate_code(10);

            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('tambah_soft', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function post()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('nim', 'nim', 'trim|required|is_unique[tb_pendaftaran_s.nim]');
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
            redirect('pendaftaran/pendaftaran_soft', 'refresh');
        } else {
            $data = [
                'daftar_id'             => $this->input->post('daftar_id'),
                'nama'                  => $this->input->post('nama'),
                'nim'                   => $this->input->post('nim'),
                'kelamin'               => $this->input->post('kelamin'),
                'agama'                 => $this->input->post('agama'),
                'kategori_id'           => $this->input->post('kategori_id'),
                'kategori_lab'          => $this->input->post('kategori_lab'),
                'semester'              => $this->input->post('semester'),
                'alamat'                => $this->input->post('alamat'),
                'nama_ortu'             => $this->input->post('nama_ortu'),
                'pekerjaan_ortu'        => $this->input->post('pekerjaan_ortu'),
                'alamat_ortu'           => $this->input->post('alamat_ortu'),
                'kabupaten'             => $this->input->post('kabupaten'),
                'provinsi'              => $this->input->post('provinsi'),
                'created_at'            => date("d-m-Y")
            ];

            $this->db->insert('tb_pendaftaran_s', $data);
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
            redirect('pendaftaran/pendaftaran_soft', 'refresh');
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
            $data['get_pendaftaran'] = $this->db->get_where('tb_pendaftaran_s', ['id' => $decode])->row();
            $data['get_kategori_praktikum'] = $this->db->get('tb_kategori_praktikum')->result();
            $data['get_kategori_register'] = $this->db->get('tb_kategori_register')->result();
            $data['get_register'] = $this->db->get('tb_register')->result();

            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('edit_soft', $data, FALSE);
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
            redirect('pendaftaran/pendaftaran_soft', 'refresh');
        } else {
            $id = $this->input->post('id');

            $data = [
                'nama'                  => $this->input->post('nama'),
                'nim'                   => $this->input->post('nim'),
                'kelamin'               => $this->input->post('kelamin'),
                'agama'                 => $this->input->post('agama'),
                'kategori_id'           => $this->input->post('kategori_id'),
                'kategori_lab'          => $this->input->post('kategori_lab'),
                'semester'              => $this->input->post('semester'),
                'alamat'                => $this->input->post('alamat'),
                'nama_ortu'             => $this->input->post('nama_ortu'),
                'pekerjaan_ortu'        => $this->input->post('pekerjaan_ortu'),
                'alamat_ortu'           => $this->input->post('alamat_ortu'),
                'kabupaten'             => $this->input->post('kabupaten'),
                'provinsi'              => $this->input->post('provinsi'),
                'updated_at'            => date("d-m-Y")
            ];
            $this->db->where('id', $id);
            $this->db->update('tb_pendaftaran_s', $data);
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
            redirect('pendaftaran/pendaftaran_soft', 'refresh');
        }
    }

    public function hapus($id)
    {
        $decode = base64_decode($id);
        $this->db->delete('tb_pendaftaran_s', ['id' => $decode]);
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
        redirect('pendaftaran/pendaftaran_soft', 'refresh');
    }

    public function hapus_all()
    {
        $id = $_POST['id'];
        $this->m_pendaftaran->delete_soft($id);
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
        redirect('pendaftaran/pendaftaran_soft');
    }

    private function generate_code($panjang_angka)
    {
        $code = '1234567890QWERTYUIOPASDFGHJKLZXCVBNM' . time();
        $string = '';
        for ($i = 0; $i < $panjang_angka; $i++) {
            $pos = rand(0, strlen($code) - 1);
            $string .= $code[$pos];
        }
        return 'SW-' . date('Y') . '/' . date('m') . '/' . $string;
    }
}

/* End of file Konfigurasi.php */
