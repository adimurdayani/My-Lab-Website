<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
    }
    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = "Dashboard";
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

            $ip = $this->input->ip_address();
            $date = date("Y-m-d");
            $waktu = time();
            $timeinsert = date("Y-m-d H:i:s");

            // cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
            $cek_ip = $this->db->query("SELECT * FROM tb_visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
            $cek_user_ip = isset($cek_ip) ? ($cek_ip) : 0;

            // kalau belum ada, simpan data user tersebut ke database
            if ($cek_user_ip == 0) {
                $this->db->query("INSERT INTO tb_visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
            } else { //jika sudah ada, update
                $this->db->query("UPDATE tb_visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
            }

            // jumlah pengujung sekarang
            $this->db->group_by('ip');
            $pengunjung_hariini = $this->db->get_where('tb_visitor', ['date' => $date])->num_rows();
            $db_pengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM tb_visitor")->row();

            // total pengunjung
            $total_pengunjung = isset($db_pengunjung->hits) ? ($db_pengunjung->hits) : 0;
            $batas_waktu = time() - 300;

            // jumlah pengujung online
            $pengunjung_online = $this->db->query("SELECT * FROM tb_visitor WHERE online > '" . $batas_waktu . "'")->num_rows();

            $data['pengunjung_hariini'] = $pengunjung_hariini;
            $data['total_pengunjung'] = $total_pengunjung;
            $data['pengunjung_online'] = $pengunjung_online;
            $this->db->limit(5);
            $data['get_register'] = $this->db->get('tb_register')->result();

            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();
            $data['get_total_regis'] = $this->db->get('tb_register')->num_rows();
            $data['get_total'] = $this->db->get('tb_visitor')->num_rows();

            $data['get_total_hits'] = $this->m_dashboard->get_total();
            $data['get_total_userkoneksi'] = $this->m_dashboard->get_total_userkoneksi();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('index', $data, FALSE);
        }
    }

    public function total_data()
    {
        $get_total_mahasiswa = $this->db->get('tb_mahasiswa')->num_rows();
        $get_total_register = $this->db->get('tb_register')->num_rows();

        $result['total_mahasiswa'] = $get_total_mahasiswa;
        $result['total_register'] = $get_total_register;
        echo json_encode($result);
    }
}

/* End of file Dashboard.php */
