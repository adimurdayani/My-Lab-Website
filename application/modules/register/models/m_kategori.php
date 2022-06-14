<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_kategori extends CI_Model
{

    public function get_kategori()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('tb_kategori_register');
        return $query->result_array();
    }

    public function tambah_kategori($data)
    {
        $this->db->insert('tb_kategori_register', $data);
    }

    public function update_kategori($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_kategori_register', $data);
    }

    public function delete_kategori($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_kategori_register');
    }
}

/* End of file m_konsentrasi.php */
