<?php

defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class login extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_api');
  }

  public function index_post()
  {
    $email = $this->post('email'); //data input username
    $password = $this->post('password'); //data input password
    $user_arr = array('email' => $email);

    $val = $this->m_api->get_email($user_arr)->row();

    if ($this->m_api->get_email($user_arr)->num_rows() == 0) {

      $this->response([
        'status' => 400,
        'message' => 'Email tidak ditemukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }

    $match = $val->password; //mengambil data password dari database
    $status = $val->active;

    if (password_verify($password, $match)) { //kondisi jika password yang di input sama dengan password yang ada di database

      if ($status != 0) {
        $this->response([
          'status' => 200,
          'message' => 'Login sukses',
          'data' => $val
        ], REST_Controller::HTTP_OK); //response jika data berhasil digunakan untuk login
      } else {
        $this->response([
          'status' => 400,
          'message' => 'Akun tidak teraktivasi'
        ], REST_Controller::HTTP_BAD_REQUEST); //response jika data tidak ditemukan
      }
    } else {
      $this->response([
        'status' => 400,
        'message' => 'Password salah'
      ], REST_Controller::HTTP_BAD_REQUEST); //response jika data tidak ditemukan

    }
  }

  public function register_post()
  {
    $data = [
      'nim' => $this->post('nim'),
      'nama' => $this->post('nama'),
      'email' => $this->post('email'),
      'phone' => $this->post('phone'),
      'password' => password_hash($this->post('password'), PASSWORD_DEFAULT),
      'active' => 0,
      'created_at' => date("d M Y H:i"),
      'updated_at' => date("d M Y H:i")
    ];

    $output = $this->db->insert('tb_register', $data);
    if ($output == 0) {
      $this->response([
        'status' => 400,
        'message' => 'Registrasi gagal'
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {
      $this->response([
        'status' => 200,
        'message' => 'Registrasi sukses',
        'data' => $data
      ], REST_Controller::HTTP_OK);
    }
  }

  public function edit_post()
  {
    $id = $this->post('id');

    if ($id == 0) {

      $this->response([
        'status' => 400,
        'message' => 'id tidak ditemukan'
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {

      $data = [
        'nim' => $this->post('nim'),
        'nama' => $this->post('nama'),
        'email' => $this->post('email'),
        'phone' => $this->post('phone'),
        'kelamin' => $this->post('kelamin'),
        'updated_at' => date("d M Y H:i")
      ];

      $this->db->where('id', $id);
      $output = $this->db->update('tb_register', $data);

      if ($output == 0) {

        $this->response([
          'status' => 400,
          'message' => 'data tidak tersimpan'
        ], REST_Controller::HTTP_BAD_REQUEST);
      } else {

        $this->response([
          'status' => 200,
          'message' => 'Data berhasil disimpan',
          'data' => $data
        ], REST_Controller::HTTP_OK);
      }
    }
  }

  public function ubahpassword_post()
  {
    $id = $this->post('id');

    if ($id == 0) {

      $this->response([
        'status' => 400,
        'message' => 'id tidak ditemukan'
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {

      $data = [
        'password' => password_hash($this->post('password'), PASSWORD_DEFAULT),
        'updated_at' => date("d M Y H:i")
      ];

      $this->db->where('id', $id);
      $output = $this->db->update('tb_register', $data);

      if ($output == 0) {

        $this->response([
          'status' => 400,
          'message' => 'data tidak tersimpan'
        ], REST_Controller::HTTP_BAD_REQUEST);
      } else {

        $this->response([
          'status' => 200,
          'message' => 'Data berhasil disimpan',
          'data' => $data
        ], REST_Controller::HTTP_OK);
      }
    }
  }
}
