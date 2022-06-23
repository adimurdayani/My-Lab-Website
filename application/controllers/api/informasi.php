<?php

defined('BASEPATH') or exit('No direct script access allowed');

class informasi extends MY_Controller
{

    public function index_get()
    {
        // mengambil data yang di kirim
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

    public function detail_informasi_post()
    {
        $informasi_id = $this->post('informasi_id');
        if ($informasi_id === null) {
            $this->response([
                'status'  => 400,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $detail_informasi = $this->db->get_where('tb_informasi_detail', ['informasi_id' => $informasi_id])->result_array();
        }

        if ($detail_informasi == 0) {
            $this->response([
                'status'  => 400,
                'message' => 'Data belum diupdate'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $this->response([
                'status'                => 200,
                'message'               => 'sukses',
                'informasi_detail'      => $detail_informasi
            ], REST_Controller::HTTP_OK);
        }
    }
}

/* End of file mahasiswa.php */
