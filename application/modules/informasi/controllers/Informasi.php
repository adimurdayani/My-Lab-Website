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

            $data['get_informasi_detail'] = $this->db->get('tb_informasi_session')->result_array();
            $data['get_jadwal'] = $this->db->get('tb_jadwal')->result_array();
            $data['get_kategori_register'] = $this->db->get('tb_kategori_register')->result_array();

            $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('tambah', $data, FALSE);
            } else {
                $this->m_informasi->tambah();
                $nama_praktikum = $_POST['nama_praktikum'];
                $tanggal_praktikum = $_POST['tanggal_praktikum'];
                $informasi_id = $_POST['informasi_id'];
                $jam_praktikum = $_POST['jam_praktikum'];
                $jadwal_id = $_POST['jadwal_id'];

                $this->db->where_in('informasi_id', $informasi_id);
                $this->db->delete('tb_informasi_session');

                $data_array = array();
                $index = 0;

                foreach ($informasi_id as $getdata) {
                    array_push($data_array, array(
                        'informasi_id' => $informasi_id[$index],
                        'jadwal_id' => $jadwal_id[$index],
                        'nama_praktikum' => $nama_praktikum[$index],
                        'tanggal_praktikum' => $tanggal_praktikum[$index],
                        'jam_praktikum' => $jam_praktikum[$index],
                        'tanggal' => date('d M Y')
                    ));
                    $index++;
                }
                $this->db->insert_batch('tb_informasi_detail', $data_array);

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

            $data['get_informasi_detail'] = $this->db->get_where('tb_informasi_detail', ['informasi_id' => $getid])->result_array();
            $data['get_informasi_session'] = $this->db->get('tb_informasi_session')->result_array();
            $data['get_jadwal'] = $this->db->get('tb_jadwal')->result_array();
            $data['get_kategori_register'] = $this->db->get('tb_kategori_register')->result_array();

            $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('edit', $data, FALSE);
            } else {
                $this->m_informasi->edit();
                $nama_praktikum = $_POST['nama_praktikum'];
                $tanggal_praktikum = $_POST['tanggal_praktikum'];
                $informasi_id = $_POST['informasi_id'];
                $jam_praktikum = $_POST['jam_praktikum'];
                $jadwal_id = $_POST['jadwal_id'];

                $this->db->where_in('informasi_id', $informasi_id);
                $this->db->delete('tb_informasi_session');

                $data_array = array();
                $index = 0;

                foreach ($informasi_id as $getdata) {
                    array_push($data_array, array(
                        'informasi_id' => $informasi_id[$index],
                        'jadwal_id' => $jadwal_id[$index],
                        'nama_praktikum' => $nama_praktikum[$index],
                        'tanggal_praktikum' => $tanggal_praktikum[$index],
                        'jam_praktikum' => $jam_praktikum[$index],
                        'tanggal' => date('d M Y')
                    ));
                    $index++;
                }
                $this->db->insert_batch('tb_informasi_detail', $data_array);

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
        $this->db->delete('tb_informasi_detail', ['informasi_id' => $getid]);
        $this->db->delete('tb_informasi', ['parent_id' => $getid]);
        redirect('informasi', 'refresh');
    }

    public function hapus_all()
    {
        $getid = $_POST['parent_id'];
        $this->db->where_in('informasi_id', $getid);
        $this->db->delete('tb_informasi_detail');
        $this->m_informasi->hapus_all($getid);
        redirect('informasi', 'refresh');
    }

    public function tambah_informasi_detail()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {

            $idjadwal = $this->input->post('idjadwal');
            $this->m_informasi->tambah_informasi_detail($idjadwal);
        }
    }

    public function tambah_detail()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {

            $idjadwal = $this->input->post('idjadwal');
            $parent = $this->input->post('parent');
            $this->m_informasi->tambah_informasi_detail_session($idjadwal,  $parent);
        }
    }

    public function hapus_informasi_session()
    {
        $getid = $this->input->post('informasiid');
        $informasi_session  = $this->db->get_where('tb_informasi_session', ['informasi_id' => $getid])->row();

        $this->db->delete('tb_informasi_session', ['id_detail' => $informasi_session->id_detail]);
    }

    public function hapus_informasi_detail()
    {
        $getid = $this->input->post('informasiid');
        $informasi_detail  = $this->db->get_where('tb_informasi_detail', ['informasi_id' => $getid])->row();

        $this->db->delete('tb_informasi_detail', ['id_detail' => $informasi_detail->id_detail]);
    }
}

/* End of file Konfigurasi.php */
