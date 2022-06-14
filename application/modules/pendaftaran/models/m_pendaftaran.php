<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_pendaftaran extends CI_Model
{

    public function get_pendaftaran()
    {
        $query =
            " SELECT `tb_pendaftaran_h`.*,`tb_kategori_praktikum`.`kategori`
                FROM `tb_pendaftaran_h` 
                JOIN `tb_kategori_praktikum` ON `tb_pendaftaran_h`.`kategori_id` = `tb_kategori_praktikum`.`id`
                ORDER BY `tb_pendaftaran_h`.`id` DESC
                ";
        return $this->db->query($query)->result();
    }

    public function delete($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_pendaftaran_h');
    }

    public function get_pendaftaran_soft()
    {
        $query =
            " SELECT `tb_pendaftaran_s`.*,`tb_kategori_praktikum`.`kategori`
                FROM `tb_pendaftaran_s` 
                JOIN `tb_kategori_praktikum` ON `tb_pendaftaran_s`.`kategori_id` = `tb_kategori_praktikum`.`id`
                ORDER BY `tb_pendaftaran_s`.`id` DESC
                ";
        return $this->db->query($query)->result();
    }

    public function delete_soft($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_pendaftaran_s');
    }
}

/* End of file m_pendaftaran.php */
