<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa extends MY_Controller
{

    public function index_get()
    {
        // mengambil data yang di kirim
        $mahasiswa = $this->db->get('tb_mahasiswa')->result_array();

        if ($mahasiswa) {
            # response mahasiswa jika data mahasiswa ada, dan menampilkan semua data mahasiswa
            $this->response([
                'status'        => 200,
                'message'       => 'sukses',
                'mahasiswa'     => $mahasiswa
            ], REST_Controller::HTTP_OK);
        } else {
            # response mahasiswa jika mahasiswa tidak ada
            $this->response([
                'status'  => 400,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

/* End of file mahasiswa.php */
