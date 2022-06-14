<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_nilai extends CI_Model
{

    public function get_nilai_h()
    {
        # code... $query =
        $query = "SELECT `tb_nilai_h`.*,`tb_pendaftaran_h`.`nama`,`tb_pendaftaran_h`.`kelamin`,`tb_kategori_register`.`kategori`
                    FROM `tb_nilai_h` 
                    JOIN `tb_pendaftaran_h` ON `tb_nilai_h`.`nim` = `tb_pendaftaran_h`.`nim`
                    JOIN `tb_kategori_register` ON `tb_nilai_h`.`kategori_lab` = `tb_kategori_register`.`id`
                    ORDER BY `tb_nilai_h`.`id` DESC
                    ";
        return $this->db->query($query)->result();
    }

    public function get_nilai_s()
    {
        # code... $query =
        $query = "SELECT `tb_nilai_s`.*,`tb_pendaftaran_s`.`nama`,`tb_pendaftaran_s`.`kelamin`,`tb_kategori_register`.`kategori`
                    FROM `tb_nilai_s` 
                    JOIN `tb_pendaftaran_s` ON `tb_nilai_s`.`nim` = `tb_pendaftaran_s`.`nim`
                    JOIN `tb_kategori_register` ON `tb_nilai_s`.`kategori_lab` = `tb_kategori_register`.`id`
                    ORDER BY `tb_nilai_s`.`id` DESC
                    ";
        return $this->db->query($query)->result();
    }

    public function delete_soft($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_nilai_s');
    }

    public function delete_hard($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_nilai_h');
    }
}

/* End of file m_nilai.php */
