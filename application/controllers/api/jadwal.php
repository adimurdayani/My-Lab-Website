<?php

defined('BASEPATH') or exit('No direct script access allowed');

class jadwal extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_api');
    }

    public function index_get()
    {
        $jadwal = $this->db->get('tb_jadwal')->result_array();

        if ($jadwal) {
            $this->response([
                'status'        => 200,
                'message'       => 'sukses',
                'jadwal'     => $jadwal
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'  => 400,
                'message' => 'data tidak di temukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

/* End of file mahasiswa.php */
