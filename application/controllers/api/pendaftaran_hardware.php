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
            'kategori_lab'          => 3,
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
                'status'        => 200,
                'message'       => 'sukses',
                'hardware'     => $mahasiswa
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'  => 400,
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

    public function upload_foto_post($nim)
    {

        $config['upload_path']    = './assets/backend/images/upload/';
        $config['allowed_types']  = 'jpg|png|jpeg';
        $config['max_size']       = '1024';
        $config['encrypt_name']    = TRUE;

        $this->load->library('upload', $config);

        if (!empty($_FILES['image'])) {
            # code...
            $this->upload->do_upload('image');
            $data_icon = $this->upload->data();
            $file_icon = $data_icon['file_name'];
        } else {
            $this->response([
                'status' => 0,
                'message' => 'gambar tidak ditemukan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

        $data = [
            'image' => $file_icon
        ];

        $this->db->where('nim', $nim);
        $output = $this->db->update('tb_pendaftaran_h', $data);
        if ($data) {
            $this->response([
                'status' => 200,
                'message' => 'data tersimpan',
                'foto' => $data
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => 400,
                'message' => 'data gagal tersimpan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function upload_transaksi_post($nim)
    {

        $config['upload_path']    = './assets/backend/images/upload/';
        $config['allowed_types']  = 'jpg|png|jpeg';
        $config['max_size']       = '1024';
        $config['encrypt_name']    = TRUE;

        $this->load->library('upload', $config);

        if (!empty($_FILES['img_transaksi'])) {
            # code...
            $this->upload->do_upload('img_transaksi');
            $data_icon = $this->upload->data();
            $file_icon = $data_icon['file_name'];
        } else {
            $this->response([
                'status' => 0,
                'message' => 'gambar tidak ditemukan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

        $data = [
            'img_transaksi' => $file_icon
        ];

        $this->db->where('nim', $nim);
        $output = $this->db->update('tb_pendaftaran_h', $data);
        if ($data) {
            $this->response([
                'status' => 200,
                'message' => 'data tersimpan',
                'foto' => $data
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => 400,
                'message' => 'data gagal tersimpan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

/* End of file pendaftaran_hardware.php */
