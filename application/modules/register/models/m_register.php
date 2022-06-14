<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_register extends CI_Model
{

    public function get_register()
    {
        $query =
            " SELECT `tb_register`.*,`tb_kategori_register`.`kategori`
                FROM `tb_register` 
                JOIN `tb_kategori_register` ON `tb_register`.`kategori_id` = `tb_kategori_register`.`id`
                ORDER BY `tb_register`.`id` DESC
                ";
        return $this->db->query($query)->result();
    }


    public function delete($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_register');
    }
}

/* End of file m_register.php */
