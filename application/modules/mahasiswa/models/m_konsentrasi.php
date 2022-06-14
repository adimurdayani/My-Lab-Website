<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_konsentrasi extends CI_Model
{

    public function get_konsentrasi()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('tb_kategori_jurusan');
        return $query->result_array();
    }

    public function tambah_konsentrasi($data)
    {
        $this->db->insert('tb_kategori_jurusan', $data);
    }

    public function update_konsentrasi($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_kategori_jurusan', $data);
    }

    public function delete_konsentrasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_kategori_jurusan');
    }
}

/* End of file m_konsentrasi.php */
