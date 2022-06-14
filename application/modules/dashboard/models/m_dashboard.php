<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_dashboard extends CI_Model
{

    public function get_total()
    {
        $this->db->group_by('date');
        $this->db->select('date');
        $this->db->select('hits');
        $this->db->select("count(*) as total");
        return $this->db->from('tb_visitor')
            ->get()
            ->result();
    }
    public function get_total_userkoneksi()
    {
        $this->db->group_by('browser');
        $this->db->select('browser');
        $this->db->select('hits');
        $this->db->select("count(*) as total_koneksi");
        return $this->db->from('tb_visitor')
            ->get()
            ->result();
    }
}

/* End of file m_dashboard.php */
