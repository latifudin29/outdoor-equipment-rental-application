<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart_model extends CI_Model
{
    public function insData($data)
    {
        $this->db->insert('tb-sewa', $data);
    }

    public function insdetailSewa($data)
    {
        $this->db->insert('tb_detail_sewa', $data);
    }

    public function updt_stock($nm_item, $stock)
    {
        $this->db->set('stk_item', $stock);
        $this->db->where('nm_item', $nm_item);
        return $this->db->update('tb_items');
    }
    
    public function insTrans($data)
    {
        $this->db->insert('tb_transaksi', $data);
    }

    public function getSewaby($id)
    {
        $this->db->where('id_sewa', $id);
        return $this->db->get('tb-sewa')->row();
    }

    public function getHistorytrans($limit, $start, $keyword = null)
    {
        $this->db->select('*');
        $this->db->like('id_transaksi', $keyword);
        $this->db->or_like('usrnm_user', $keyword);
        $this->db->or_like('tgl_transaksi', $keyword);
        $this->db->or_like('status_sewa', $keyword);
        $this->db->from('tb_transaksi');
        $this->db->join('tb_users', 'tb_transaksi.id_user = tb_users.id_user');
        $this->db->join('tb-sewa', 'tb_transaksi.id_sewa = tb-sewa.id_sewa');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function getHistorytranstot($limit, $start, $keyword = null)
    {
        $this->db->select('*');
        $this->db->like('tgl_transaksi', $keyword);
        $this->db->from('tb_transaksi');
        $this->db->join('tb_users', 'tb_transaksi.id_user = tb_users.id_user');
        $this->db->join('tb-sewa', 'tb_transaksi.id_sewa = tb-sewa.id_sewa');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function usrHistorytrans()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_users', 'tb_transaksi.id_user = tb_users.id_user');
        $this->db->join('tb-sewa', 'tb_transaksi.id_sewa = tb-sewa.id_sewa');
        $query = $this->db->get();
        return $query->result();
    }

    public function statByr($id, $status)
    {
        $this->db->set('status_bayar', $status);
        $this->db->where('id_transaksi', $id);
        return $this->db->update('tb_transaksi');
    }

    public function get_detail($id)
    {
        $this->db->where('id_sewa', $id);
        return $this->db->get('tb_detail_sewa')->row();
    }

    public function upload_bukti($id, $bukti)
    {
        $format = "%Y-%m-%d";
        $date = mdate($format);
        $data = [
            'bukti_pembayaran' => $bukti,
            'status_bayar' => 3,
            'tgl_transaksi' => $date
        ];
        $this->db->where('id_transaksi', $id);
        return $this->db->update('tb_transaksi', $data);
    }
}