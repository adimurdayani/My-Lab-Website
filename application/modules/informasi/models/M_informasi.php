<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_informasi extends CI_Model
{

    public function get_informasi()
    {
        $query =
            "SELECT `tb_informasi`.*, `tb_kategori_register`.`kategori`
                FROM `tb_informasi` 
                JOIN `tb_kategori_register` ON `tb_informasi`.`kategori_register_id` = `tb_kategori_register`.`id`
                ORDER BY `tb_informasi`.`id` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_informasi_id($id)
    {
        $query =
            "SELECT `tb_informasi`.*, `tb_kategori_register`.`kategori`
                FROM `tb_informasi` 
                JOIN `tb_kategori_register` ON `tb_informasi`.`kategori_register_id` = `tb_kategori_register`.`id`
                WHERE `tb_informasi`.`id` = $id
                ";
        return $this->db->query($query)->row_array();
    }

    public function tambah()
    {
        $data = [
            'kategori_register_id' => $this->input->post('kategori_register_id'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal_buka' => $this->input->post('tanggal_buka'),
            'tanggal_tutup' => $this->input->post('tanggal_tutup')
        ];

        return $this->db->insert('tb_informasi', $data);
    }

    public function edit()
    {
        $data = [
            'kategori_register_id' => $this->input->post('kategori_register_id'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal_buka' => $this->input->post('tanggal_buka'),
            'tanggal_tutup' => $this->input->post('tanggal_tutup')
        ];

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('tb_informasi', $data);
    }

    public function hapus_all($id)
    {
        $this->db->where_in('id', $id);
        return $this->db->delete('tb_informasi');
    }
}

/* End of file M_informasi.php */
