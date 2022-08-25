<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kat_prakt extends MY_Controller
{

    public function index_get()
    {
        // mengambil data yang di kirim
        $id = $this->get('id');

        // kondisi jika id laporan tidak di temukan 
        if ($id === NULL) {
            // mengambil data dari database
            $kategori_praktikum = $this->db->get_where('tb_kategori_praktikum', ['keterangan !=' => "software"])->result_array();
        } else {
            // mengambil data dengan id yang di kirim
            $kategori_praktikum = $this->db->get_where('tb_kategori_praktikum', ['id' => $id])->row_array();
        }

        if ($kategori_praktikum) {
            $this->response([
                'status'        => 200,
                'message'       => 'sukses',
                'kategori_praktikum'     => $kategori_praktikum
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'  => 400,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function praktek_get()
    {
        // mengambil data yang di kirim
        $id = $this->get('id');

        // kondisi jika id laporan tidak di temukan 
        if ($id === NULL) {
            // mengambil data dari database
            $kategori_praktikum = $this->db->get_where('tb_kategori_praktikum', ['keterangan !=' => "hardware"])->result_array();
        } else {
            // mengambil data dengan id yang di kirim
            $kategori_praktikum = $this->db->get_where('tb_kategori_praktikum', ['id' => $id])->row_array();
        }

        if ($kategori_praktikum) {
            $this->response([
                'status'        => 200,
                'message'       => 'sukses',
                'kategori_praktikum'     => $kategori_praktikum
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'  => 400,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

/* End of file mahasiswa.php */
