<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    // ================================= For Admin ========================================
    // get all data
    public function getAll()
    {
        return $this->db->get('tb_users')->result();
    }

    public function getAllpage($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('usrnm_user', $keyword  );
            $this->db->or_like('email_user', $keyword  );
        }
        return $this->db->get('tb_users', $limit, $start)->result();
    }

    // Get Data Item by Id
    public function getUser($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('tb_users')->row();
    }

    public function block_users()
    {
        $this->db->where('status', 0);
        return $this->db->get('tb_users')->result();
    }

    public function user_valid()
    {
        $this->db->where('valid_user', 1);
        $query = $this->db->get('tb_users');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
            else
        {
            return 0;
        }
    }

    public function user_total()
    {
        $query = $this->db->get('tb_users');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
            else
        {
            return 0;
        }
    }

    public function getUserby($email)
    {
        $this->db->where('email_user', $email);
        return $this->db->get('tb_users')->row();
    }

    

    // Insert Data
    public function insData()
    {
        $data = [
            'fname_user' => $this->input->post('fname_user'),
            'usrnm_user' => $this->input->post('usrnm_user'),
            'pw_user' => $this->input->post('pw_user'),
            'nik_user' => $this->input->post('nik_user'),
            'gnd_user' => $this->input->post('gnd_user'),
            'addr_user' => $this->input->post('addr_user'),
            'tmplh_user' => $this->input->post('tmplh_user'),
            'tgl_user' => $this->input->post('tgl_user'),
            'nohp1_user' => $this->input->post('nohp1_user'),
            'nohp2_user' => $this->input->post('nohp2_user'),
            'email_user' => $this->input->post('email_user'),
            'type_user' => 'enduser'
        ];
        return $this->db->insert('tb_users', $data);
    }

    // Update Data
    public function uptData($id)
    {
        $data = [
            'fname_user' => $this->input->post('fname_user'),
            'usrnm_user' => $this->input->post('usrnm_user'),
            'pw_user' => $this->input->post('pw_user'),
            'nik_user' => $this->input->post('nik_user'),
            'gnd_user' => $this->input->post('gnd_user'),
            'addr_user' => $this->input->post('addr_user'),
            'tmplh_user' => $this->input->post('tmplh_user'),
            'tgl_user' => $this->input->post('tgl_user'),
            'nohp1_user' => $this->input->post('nohp1_user'),
            'nohp2_user' => $this->input->post('nohp2_user'),
            'email_user' => $this->input->post('email_user'),
        ];
        $this->db->where('id_user', $id);
        return $this->db->update('tb_users', $data);
    }

    // Delete Data
    public function delData($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('tb_users');
    }

    public function updateval($id)
    {
        $this->db->set('valid_user', '1');
        $this->db->where('id_user', $id);
        $this->db->update('tb_users');
    }
    public function updateunval($id)
    {
        $this->db->set('valid_user', '0');
        $this->db->where('id_user', $id);
        $this->db->update('tb_users');
    }
    public function updatblock($id)
    {
        $this->db->set('status', '0');
        $this->db->where('id_user', $id);
        $this->db->update('tb_users');
    }
    public function updatunblock($id)
    {
        $this->db->set('status', '1');
        $this->db->where('id_user', $id);
        $this->db->update('tb_users');
    }

    // ================================= End For Admin ========================================

    // ================================= For Users ========================================

    public function register()
    {
        $data = [
            'fname_user' => $this->input->post('fname_user'),
            'usrnm_user' => $this->input->post('usrnm_user'),
            'pw_user' => $this->input->post('pw_user'),
            'nik_user' => $this->input->post('nik_user'),
            'gnd_user' => $this->input->post('gnd_user'),
            'addr_user' => $this->input->post('addr_user'),
            'tmplh_user' => $this->input->post('tmplh_user'),
            'tgl_user' => $this->input->post('tgl_user'),
            'nohp1_user' => $this->input->post('nohp1_user'),
            'nohp2_user' => $this->input->post('nohp2_user'),
            'email_user' => $this->input->post('email_user'),
            'type_user' => 'enduser'
        ];
        return $this->db->insert('tb-users', $data);
    }

    public function uploadav($id, $filename)
    {
        $this->db->set('img_user', $filename);
        $this->db->where('id_user', $id);
        return $this->db->update('tb_users');
    }
}
