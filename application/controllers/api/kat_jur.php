<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kat_jur extends MY_Controller
{

    public function index_get()
    {
        // mengambil data yang di kirim
        $id = $this->get('id');

        // kondisi jika id laporan tidak di temukan 
        if ($id === NULL) {
            // mengambil data dari database
            $kategori_jurusan = $this->db->get('tb_kategori_jurusan')->result_array();
        } else {
            // mengambil data dengan id yang di kirim
            $kategori_jurusan = $this->db->get_where('tb_kategori_jurusan', ['id' => $id])->row_array();
        }

        if ($kategori_jurusan) {
            $this->response([
                'status'        => 200,
                'message'       => 'sukses',
                'kategori_jurusan'     => $kategori_jurusan
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
