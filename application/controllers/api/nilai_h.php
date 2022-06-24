<?php

defined('BASEPATH') or exit('No direct script access allowed');

class nilai_h extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_api');
    }


    public function index_get()
    {
        $nilai_hardware = $this->m_api->get_nilai();

        if ($nilai_hardware) {
            $this->response([
                'status'        => 200,
                'message'       => 'sukses',
                'nilai'     => $nilai_hardware
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'  => 400,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_post()
    {
        $nim = $this->post('nim');
        if ($nim === null) {
            $this->response([
                'status'  => 400,
                'message' => 'nim tidak ditemukan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $nilai_hardware = $this->m_api->get_nilai();
        }

        if ($nilai_hardware) {
            $this->response([
                'status'        => 200,
                'message'       => 'sukses',
                'nilai'     => $nilai_hardware
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
