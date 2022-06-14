<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        // is_logged_in();
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = "User";

            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            //list the users
            $data['users'] = $this->ion_auth->users()->row();
            $data['get_user'] = $this->ion_auth->users()->result();
            $data['get_grup'] = $this->ion_auth->groups()->result_array();
            $data['get_user_grup'] = $this->db->get('users_groups')->result();
            $data['get_all_grup'] = $this->db->get('groups')->result();

            $this->db->order_by('id', 'desc');
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            foreach ($data['get_user'] as $k => $user) {
                $data['get_user'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('index', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function create_user()
    {
        $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('phone', 'phone', 'trim');
        $this->form_validation->set_rules('company', 'company', 'trim');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[8]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'password confirm', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Data gagal disimpan!"
                    })
                })'
            );

            redirect('user', 'refresh');
        } else {

            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email'),
                'active' => $this->input->post('active'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Data berhasil disimpan!"
                    })
                })'
            );
            redirect('user', 'refresh');
        }
    }

    public function edit_user()
    {
        $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim');
        $this->form_validation->set_rules('company', 'company', 'trim');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[8]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'password confirm', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Data gagal disimpan!"
                    })
                })'
            );

            redirect('user', 'refresh');
        } else {
            $id = $this->input->post('id');

            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email'),
                'active' => $this->input->post('active'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            ];

            // Only allow updating groups if user is admin
            if ($this->ion_auth->is_admin()) {
                // Update the groups user belongs to
                $this->ion_auth->remove_from_group('', $id);

                $groupData = $this->input->post('groups');
                if (isset($groupData) && !empty($groupData)) {
                    foreach ($groupData as $grp) {
                        $this->ion_auth->add_to_group($grp, $id);
                    }
                }
            }

            $this->db->where('id', $id);
            $this->db->update('users', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Data berhasil diubah!"
                    })
                })'
            );
            redirect('user', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('users', ['id' => $id]);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Data berhasil dihapus!"
                })
            })'
        );
        redirect('user', 'refresh');
    }

    public function hapus_all()
    {
        $id = $_POST['id'];
        if (!empty($id)) {
            $this->m_user->delete($id);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Semua data berhasil dihapus!"
                })
            })'
            );
            redirect('user');
        } else {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Data gagal dihapus!"
                    })
                })'
            );
            redirect('user');
        }
    }

    public function tampil_groupkan($id)
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) {
            redirect('auth/block');
        } else {
            $data['title'] = 'Gropkan user';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            //list the users
            $data['users'] = $this->ion_auth->users()->row();
            $data['get_user'] = $this->db->get_where('users', ['id' => $id])->row();
            $data['get_user_grup'] = $this->db->get_where('users_groups', ['user_id' => $id])->row();
            $data['get_all_grup'] = $this->db->get('groups')->result();
            $this->db->limit(3);
            $data['get_register_limit'] = $this->db->get('tb_register')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('groupkan', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function groupkan()
    {
        $this->form_validation->set_rules('id_group', 'group', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Data gagal disimpan!"
                    })
                })'
            );
            redirect('user');
        } else {
            $data = [
                'user_id' => $this->input->post('id'),
                'group_id' => $this->input->post('group_id')

            ];

            $this->db->insert('users_groups', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Semua data berhasil diubah!"
                    })
                })'
            );
            redirect('user');
        }
    }
}

/* End of file User.php */
