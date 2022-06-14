<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_mahasiswa extends CI_Model
{

    public function get_mahasiswa()
    {
        $query =
            " SELECT `tb_mahasiswa`.*,`tb_kategori_jurusan`.`kategori`
                FROM `tb_mahasiswa` 
                JOIN `tb_kategori_jurusan` ON `tb_mahasiswa`.`kategori_id` = `tb_kategori_jurusan`.`id`
                ORDER BY `tb_mahasiswa`.`id` DESC
                ";
        return $this->db->query($query)->result();
    }

    public function delete($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_mahasiswa');
    }
}

/* End of file m_mahasiswa.php */
