<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_grup extends CI_Model
{
    public function get_grup()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('groups');
        return $query->result_array();
    }

    public function tambah_grup($data)
    {
        $this->db->insert('groups', $data);
    }

    public function update_grup($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('groups', $data);
    }

    public function delete_grup($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('groups');
    }
}

/* End of file m_grup.php */
