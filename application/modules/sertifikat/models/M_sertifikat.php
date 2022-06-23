<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_sertifikat extends CI_Model
{

    public function get_sertifikat_id($id)
    {
        $query =
            "SELECT `tb_sertifikat`.*,`tb_kategori_praktikum`.`keterangan`, `tb_kategori_register`.`kategori`, `tb_register`.`nim`, `tb_register`.`nama`
                FROM `tb_sertifikat` 
                JOIN `tb_kategori_praktikum` ON `tb_sertifikat`.`kategori_praktikum_id` = `tb_kategori_praktikum`.`id`
                JOIN `tb_kategori_register` ON `tb_sertifikat`.`kategori_register_id` = `tb_kategori_register`.`id`
                JOIN `tb_register` ON `tb_sertifikat`.`user_id` = `tb_register`.`id`
                WHERE `tb_sertifikat`.`id` = $id
                ";
        return $this->db->query($query)->row_array();
    }

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


    public function tambah($img_sertifikat)
    {
        $no_sertifikat  = 0;
        $sertifikat  = $this->db->get('tb_sertifikat')->num_rows();
        $no_sertifikat = $sertifikat + 1;

        $data = [
            'img_sertifikat' => $img_sertifikat,
            'created_at' => date('d M Y'),
            'no_sertifikat' => "SL-00" . $no_sertifikat,
            'nilai_hard_id' => $this->input->post('id_hardware'),
            'nilai_soft_id' => $this->input->post('id_software'),
        ];
        return $this->db->insert('tb_sertifikat', $data);
    }

    public function edit($img_sertifikat)
    {
        $register = $this->db->get_where('tb_register', ['id' =>  $this->input->post('user_id')])->row();
        $nilai_hardware = $this->db->get_where('tb_nilai_h', ['nim' => $register->nim])->row();
        $nilai_software = $this->db->get_where('tb_nilai_s', ['nim' => $register->nim])->row();

        $data_img = $this->db->get_where('tb_sertifikat', ['id' => $this->input->post('id')])->row();
        if ($data_img->img_sertifikat != null) {
            $target_img = './assets/backend/images/upload/' . $data_img->img_sertifikat;
            unlink($target_img);
        }

        $data = [
            'user_id' => $this->input->post('user_id'),
            'img_sertifikat' => $img_sertifikat,
            'created_at' => date('d M Y'),
            'nilai_hard_id' => $nilai_hardware->id,
            'nilai_soft_id' => $nilai_software->id,
        ];
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('tb_sertifikat', $data);
    }

    public function hapus_all($id)
    {
        $this->db->where_in('id', $id);
        return $this->db->delete('tb_sertifikat');
    }
}

/* End of file M_sertifikat.php */
