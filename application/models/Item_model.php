<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_model extends CI_Model
{
    // get all data
    public function getAll()
    {
        return $this->db->get('tb_items')->result();
    }

    public function getAllpage($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('nm_item', $keyword);
            $this->db->or_like('brand_item', $keyword);
            $this->db->or_like('cat_item', $keyword);
        }
        return $this->db->get('tb_items', $limit, $start)->result();
    }

    
    // Get Data Item by Id
    public function getItem($id)
    {
        $this->db->where('id_item', $id);
        return $this->db->get('tb_items')->row();
    }

    public function getItemby($name)
    {
        $this->db->where('nm_item', $name);
        return $this->db->get('tb_items')->row();
    }

    public function item_total()
    {
        $query = $this->db->get('tb_items');
        return $query->num_rows();
    }
    
    // Insert Data
    public function insData()
    {
        $uniq = random_string('numeric',2);
        $data = [
            'nm_item' => $uniq. '-' . $this->input->post('nm_item'),
            'brand_item' => $this->input->post('brand_item'),
            'cat_item' => $this->input->post('cat_item'),
            'desc_item' => $this->input->post('desc_item'),
            'prc_item' => $this->input->post('prc_item'),
            'stk_item' => $this->input->post('stk_item')
        ];
        return $this->db->insert('tb_items', $data);
    }
    
    // Update Data
    public function uptData($id)
    {
        $data = [
            'nm_item' => $this->input->post('nm_item'),
            'brand_item' => $this->input->post('brand_item'),
            'cat_item' => $this->input->post('cat_item'),
            'desc_item' => $this->input->post('desc_item'),
            'prc_item' => $this->input->post('prc_item'),
            'stk_item' => $this->input->post('stk_item')
        ];
        $this->db->where('id_item', $id);
        return $this->db->update('tb_items', $data);
    }
    
    // Delete Data
    public function delData($id)
    {
        $this->db->where('id_item', $id);
        return $this->db->delete('tb_items');
    }
    
    // Filter Data by Categories
    public function getBy($cat)
    {
        $this->db->where('cat_item', $cat);
        return $this->db->get('tb_items')->result();
    }

    // get all data kategori
    public function getAllkat()
    {
        return $this->db->get('tb_kategori')->result();
    }

    public function total_kat()
    {
        return $this->db->get('tb_kategori')->num_rows();
    }

    public function getAllkatpage($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('nm_kat', $keyword);
        }
        return $this->db->get('tb_kategori', $limit, $start)->result();
    }

    // get all data kategori by ID
    public function getKatby($id)
    {
        $this->db->where('id_kat', $id);
        return $this->db->get('tb_kategori')->row();
    }

    // Add Data Kategori
    public function add_kat()
    {
        $data = [
            'nm_kat' => $this->input->post('nm_kat'),
        ];
        return $this->db->insert('tb_kategori', $data);
    }

    // Edit Data Kategori
    public function edit_kat($id)
    {
        $data = [
            'nm_kat' => $this->input->post('nm_kat'),
        ];
        $this->db->where('id_kat', $id);
        return $this->db->update('tb_kategori', $data);
    }

    public function update_stock($name, $newstock)
    {
        $this->db->set('stk_item', $newstock);
        $this->db->where('nm_item', $name);
        return $this->db->update('tb_items');
    }
}
