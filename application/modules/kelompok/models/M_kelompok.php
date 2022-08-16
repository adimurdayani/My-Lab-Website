<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kelompok extends CI_Model
{

    public function get_data()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('tb_kelompok')->result();
    }

    public function get_mahasiswa()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('tb_mahasiswa')->result();
    }

    public function tambah()
    {
        $mahasiswa = $this->db->get_where('tb_mahasiswa', ['id' => $this->input->post('id_mahasiswa')])->row();
        $user =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();

        $data = [
            'id_mahasiswa' => $mahasiswa->id,
            'nim' => $mahasiswa->nim,
            'nama' => $mahasiswa->nama,
            'kelompok' => $this->input->post('kelompok'),
            'user_id' => $user->id,
            'tanggal' => date("d M Y")
        ];
        return  $this->db->insert('tb_kelompok', $data);
    }

    public function edit()
    {
        $mahasiswa = $this->db->get_where('tb_mahasiswa', ['id' => $this->input->post('id_mahasiswa')])->row();
        $user =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();

        $data = [
            'id_mahasiswa' => $mahasiswa->id,
            'nim' => $mahasiswa->nim,
            'nama' => $mahasiswa->nama,
            'kelompok' => $this->input->post('kelompok'),
            'user_id' => $user->id,
            'tanggal' => date("d M Y")
        ];
        $this->db->where('id', $this->input->post('id'));
        return  $this->db->update('tb_kelompok', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        return  $this->db->delete('tb_kelompok');
    }

    public function hapus_all($id)
    {
        $this->db->where_in('id', $id);
        return  $this->db->delete('tb_kelompok');
    }
}

/* End of file M_kelompok.php */
