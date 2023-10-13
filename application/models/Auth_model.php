<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    // user registration
    public function regist()
    {
        $data = array(
            'usrnm_user' => $this->input->post('username'),
            'pw_user' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'email_user' => $this->input->post('email'),
            'type_user' => 'enduser'
        );

        return $this->db->insert('tb_users', $data);
    }

    public function editData($data, $id)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('tb_users', $data);
    }

    // function untuk mendapatkan data user
    public function getuser($username)
    {
        $this->db->where('usrnm_user', $username);
        return $this->db->get('tb_users')->row();
    }

    // function untuk mendapatkan data user by ID
    public function getuserby($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('tb_users')->row();
    }


    // function untuk mendapatkan data admin
    public function getadmin($username)
    {
        $this->db->where('usrnm_admin', $username);
        return $this->db->get('tb-admin')->row();
    }

    public function newpass($pass, $email)
    {
        $newpass = password_hash($pass, PASSWORD_DEFAULT);
        $this->db->set('pw_user', $newpass);
        $this->db->where('email_user', $email);
        return $this->db->update('tb_users');
    }
}
