<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pendaftaran_hardware extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_api');
    }

    public function index_post()
    {
        $kode = $this->generate_code(10);
        $data = [
            'daftar_id'             => $kode,
            'nama'                  => $this->post('nama'),
            'nim'                   => $this->post('nim'),
            'kelamin'               => $this->post('kelamin'),
            'agama'                 => $this->post('agama'),
            'kategori_id'           => $this->post('kategori_id'),
            'kategori_lab'          => $this->post('kategori_lab'),
            'semester'              => $this->post('semester'),
            'alamat'                => $this->post('alamat'),
            'nama_ortu'             => $this->post('nama_ortu'),
            'pekerjaan_ortu'        => $this->post('pekerjaan_ortu'),
            'alamat_ortu'           => $this->post('alamat_ortu'),
            'kabupaten'             => $this->post('kabupaten'),
            'provinsi'              => $this->post('provinsi'),
            'created_at'            => date("d-m-Y")
        ];

        $output = $this->db->insert('tb_pendaftaran_h', $data);
        if ($output == 0) {
            $this->response([
                'status' => 400,
                'message' => 'Pendaftaran gagal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $this->response([
                'status' => 200,
                'message' => 'Pendaftaran sukses',
                'pendaftaran' => $data
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_get()
    {
        $mahasiswa = $this->m_api->get_all_hardware();

        if ($mahasiswa) {
            $this->response([
                'status'        => 1,
                'message'       => 'sukses',
                'hardware'     => $mahasiswa
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'  => 0,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
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
}

/* End of file pendaftaran_hardware.php */
