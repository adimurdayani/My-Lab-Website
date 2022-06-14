<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kat_reg extends MY_Controller
{

    public function index_get()
    {
        // mengambil data yang di kirim
        $id = $this->get('id');

        // kondisi jika id laporan tidak di temukan 
        if ($id === NULL) {
            // mengambil data dari database
            $kategori_register = $this->db->get('tb_kategori_register')->result_array();
        } else {
            // mengambil data dengan id yang di kirim
            $kategori_register = $this->db->get_where('tb_kategori_register', ['id' => $id])->row_array();
        }

        if ($kategori_register) {
            $this->response([
                'status'        => 200,
                'message'       => 'sukses',
                'kategori_register'     => $kategori_register
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'  => 400,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

/* End of file mahasiswa.php */
