<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_user extends CI_Model
{
    public function delete($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('users');
    }
}

/* End of file M_user.php */
