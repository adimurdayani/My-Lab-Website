<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_jadwal extends CI_Model
{
    public function delete($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_jadwal');
    }
}

/* End of file m_jadwal.php */
