<?php

defined('BASEPATH') or exit('No direct script access allowed');

class informasi extends MY_Controller
{

    public function index_get()
    {
        // mengambil data yang di kirim
        $this->db->order_by('id', 'desc');
        $informasi = $this->db->get('tb_informasi')->result_array();

        if ($informasi) {
            # response jika data ada, dan menampilkan semua data
            $this->response([
                'status'        => 200,
                'message'       => 'sukses',
                'informasi'     => $informasi
            ], REST_Controller::HTTP_OK);
        } else {
            # response informasi jika informasi tidak ada
            $this->response([
                'status'  => 400,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

/* End of file mahasiswa.php */
