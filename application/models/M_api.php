<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_api extends CI_Model
{

    public function get_email($email)
    {
        return $this->db->get_where('tb_register', $email);
    }

    public function get_nilai()
    {
        $query = "SELECT `tb_nilai_h`.*,`tb_pendaftaran_h`.`nama`,`tb_pendaftaran_h`.`kelamin`,`tb_kategori_register`.`kategori`
                    FROM `tb_nilai_h` 
                    JOIN `tb_pendaftaran_h` ON `tb_nilai_h`.`nim` = `tb_pendaftaran_h`.`nim`
                    JOIN `tb_kategori_register` ON `tb_nilai_h`.`kategori_lab` = `tb_kategori_register`.`id`
                    ORDER BY `tb_nilai_h`.`id` DESC
                    ";
        return $this->db->query($query)->result_array();
    }

    public function get_nilai_s()
    {
        $query = "SELECT `tb_nilai_s`.*,`tb_pendaftaran_s`.`nama`,`tb_pendaftaran_s`.`kelamin`,`tb_kategori_register`.`kategori`
                    FROM `tb_nilai_s` 
                    JOIN `tb_pendaftaran_s` ON `tb_nilai_s`.`nim` = `tb_pendaftaran_s`.`nim`
                    JOIN `tb_kategori_register` ON `tb_nilai_s`.`kategori_lab` = `tb_kategori_register`.`id`
                    ORDER BY `tb_nilai_s`.`id` DESC
                    ";
        return $this->db->query($query)->result_array();
    }

    public function get_all_hardware()
    {
        $query = "SELECT `tb_pendaftaran_h`.*,`tb_kategori_praktikum`.`kategori`,`tb_kategori_register`.`kategori`
                    FROM `tb_pendaftaran_h` 
                    JOIN `tb_kategori_praktikum` ON `tb_pendaftaran_h`.`kategori_id` = `tb_kategori_praktikum`.`id`
                    JOIN `tb_kategori_register` ON `tb_pendaftaran_h`.`kategori_lab` = `tb_kategori_register`.`id`
                    WHERE `tb_pendaftaran_h`.`kategori_lab` = 3
                    ORDER BY `tb_pendaftaran_h`.`id` DESC
                    ";
        return $this->db->query($query)->result_array();
    }
}


/* End of file M_api.php */
