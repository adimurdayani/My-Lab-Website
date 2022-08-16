<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pendaftaran_software extends MY_Controller
{

    public function index_post()
    {

        $config['upload_path']    = './assets/backend/images/upload/';
        $config['allowed_types']  = 'jpg|png|jpeg|svg';
        $config['max_size']       = '1024';
        $config['encrypt_name']    = TRUE;

        $this->load->library('upload', $config);

        if (!empty($_FILES['foto'])) {
            # code...
            $this->upload->do_upload('foto');
            $data_icon = $this->upload->data();
            $file_icon = $data_icon['file_name'];
        }

        if (!empty($_FILES['img_transaksi'])) {
            # code...
            $this->upload->do_upload('img_transaksi');
            $data_transaksi = $this->upload->data();
            $file_transaksi = $data_transaksi['file_name'];
        }

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
            'created_at'            => date("d-m-Y"),
            'foto'                  => $file_icon,
            'img_transaksi'         => $file_transaksi
        ];

        $output = $this->db->insert('tb_pendaftaran_s', $data);
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
        $this->db->order_by('id', 'desc');
        $mahasiswa = $this->db->get_where('tb_pendaftaran_s', ['kategori_lab' => 4])->result_array();

        if ($mahasiswa) {
            $this->response([
                'status'        => 1,
                'message'       => 'sukses',
                'software'     => $mahasiswa
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
        return 'SW-' . date('Y') . '/' . date('m') . '/' . $string;
    }
}

/* End of file pendaftaran_software.php */
