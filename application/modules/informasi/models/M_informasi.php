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
                WHERE `tb_informasi`.`parent_id` =$id
                ";
        return $this->db->query($query)->row_array();
    }

    public function tambah()
    {
        $informasi = $this->db->get('tb_informasi')->num_rows();
        $jml = $informasi + 1;
        $date = date('Ymd');
        $parent_id = $date . $jml;
        $data = [
            'kategori_register_id' => $this->input->post('kategori_register_id'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => $this->input->post('tanggal'),
            'parent_id' => $parent_id
        ];

        return $this->db->insert('tb_informasi', $data);
    }

    public function edit()
    {
        $data = [
            'kategori_register_id' => $this->input->post('kategori_register_id'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => $this->input->post('tanggal')
        ];

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('tb_informasi', $data);
    }

    public function tambah_informasi_detail($id)
    {
        $informasi = $this->db->get('tb_informasi')->num_rows();
        $jml = $informasi + 1;
        $date = date('Ymd');
        $parent_id = $date . $jml;
        $jadwal = $this->db->get_where('tb_jadwal', ['id' => $id])->row();
        $data = [
            'informasi_id' => $parent_id,
            'jadwal_id' => $jadwal->id,
            'nama_praktikum' => $jadwal->judul,
            'tanggal_praktikum' => $jadwal->tanggal,
            'jam_praktikum' => $jadwal->jam,
            'tanggal' => date('d M Y')
        ];

        return $this->db->insert('tb_informasi_session', $data);
    }

    public function tambah_informasi_detail_session($id, $parent)
    {
        $jadwal = $this->db->get_where('tb_jadwal', ['id' => $id])->row();
        $data = [
            'informasi_id' => $parent,
            'jadwal_id' => $jadwal->id,
            'nama_praktikum' => $jadwal->judul,
            'tanggal_praktikum' => $jadwal->tanggal,
            'jam_praktikum' => $jadwal->jam,
            'tanggal' => date('d M Y')
        ];

        return $this->db->insert('tb_informasi_session', $data);
    }

    public function hapus_all($id)
    {
        $this->db->where_in('parent_id', $id);
        return $this->db->delete('tb_informasi');
    }
}

/* End of file M_informasi.php */
