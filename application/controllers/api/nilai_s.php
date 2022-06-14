<?php

defined('BASEPATH') or exit('No direct script access allowed');

class nilai_s extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_api');
    }

    public function index_get()
    {
        $nilai_software = $this->m_api->get_nilai_s();

        if ($nilai_software) {
            $this->response([
                'status'        => 200,
                'message'       => 'sukses',
                'nilai'     => $nilai_software
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
