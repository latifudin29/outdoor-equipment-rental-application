<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa_model extends CI_Model
{
    public function getDetail($id_sewa)
    {
        $this->db->where('id_sewa', $id_sewa);
        return $this->db->get('tb_detail_sewa')->result();
    }

    public function getSewa($id_sewa)
    {
        $this->db->where('id_sewa', $id_sewa);
        return $this->db->get('tb-sewa')->row();
    }

    public function getTrans($id_sewa)
    {
        $this->db->where('id_sewa', $id_sewa);
        return $this->db->get('tb_transaksi')->row();
    }

    public function transaksi_total()
    {
        return $this->db->get('tb_transaksi')->num_rows();
    }

    public function getDetailby($id)
    {
        $this->db->where('id_detail_sewa', $id);
        return $this->db->get('tb_detail_sewa')->row();
    }

    public function setTanggal($id, $data)
    {
        $this->db->where('id_sewa', $id);
        return $this->db->update('tb-sewa', $data);
    }

    public function updt_bagus($id)
    {
        $this->db->set('status_item', 'Bagus');
        $this->db->where('id_detail_sewa', $id);
        return $this->db->update('tb_detail_sewa');
    }
    
    public function updt_rusak($id)
    {
        $this->db->set('status_item', 'Rusak');
        $this->db->where('id_detail_sewa', $id);
        return $this->db->update('tb_detail_sewa');
    }

    public function updt_kembali($id)
    {
        $this->db->set('kembali', 1);
        $this->db->where('id_detail_sewa', $id);
        return $this->db->update('tb_detail_sewa');
    }

    public function cancel($id)
    {
        $this->db->set('status_sewa', 'cancel');
        $this->db->where('id_sewa', $id);
        return $this->db->update('tb-sewa');
    }

    public function getSewalist($limit, $start, $keyword = null)
    {
        $this->db->select('*');
        $this->db->like('id_sewa', $keyword);
        $this->db->or_like('usrnm_user', $keyword);
        $this->db->or_like('status_sewa', $keyword);
        $this->db->from('tb-sewa');
        $this->db->join('tb_users', 'tb-sewa.id_user = tb_users.id_user');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
}