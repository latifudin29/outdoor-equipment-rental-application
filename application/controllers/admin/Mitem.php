<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
    }

    // Get All Data Kontrol
    public function index()
    {
        if($this->input->post('search')){
            $keyword = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $keyword);
        } else {
            $keyword = $this->session->userdata('keyword');
        }

        $this->db->like('nm_item', $keyword);
        $this->db->or_like('brand_item', $keyword);
        $this->db->or_like('cat_item', $keyword);
        $this->db->from('tb_items');

        $config['base_url'] = 'http://localhost:80/jejaka-app/admin/Mitem/index/';
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data = [
            'start' => $this->uri->segment(4),
            'title' => 'Items',
            'items' => $this->Item_model->getAllpage($config['per_page'], $start, $keyword)
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/mproducts/list_product', $data);
        $this->load->view('admin/partial/afooter');
    }

    // Add Data Item
    public function addItem()
    {
        if ($this->input->post('submit')) {
            if($this->input->post('cat_item') != "")
            {
                $this->Item_model->insData();
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('msg', '<div style="color: green;">Berhasil Menambahkan Item!</div>');
                } else {
                    $this->session->set_flashdata('msg', '<div style="color: red;">Gagal Menambahkan Item!</div>');
                }
            } else {
                $this->session->set_flashdata('msg', '<div style="color: red;">Pilih Kategori Item!</div>');
                redirect('admin/mitem/addItem');
            }
            redirect('admin/mitem');
        }
        $data = [
            'title' => 'Add Item',
            'kategori' => $this->Item_model->getAllkat()
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/mproducts/form_item', $data);
        $this->load->view('admin/partial/afooter');
    }

    // Edit Data Item
    public function editItem($id)
    {
        if ($this->input->post('submit')) {
            $this->Item_model->uptData($id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<p style="background-color:green; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">Item Berhasil di Edit! </p>');
            } else {
                $this->session->set_flashdata('msg', '<p style="background-color:red; letter-spacing: 3px; color:white; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto"> Item Gagal di Edit ! </p>');
            }

            redirect('admin/mitem');
        }
        $data = [
            'title' => 'Edit Item',
            'item' => $this->Item_model->getItem($id),
            'kategori' => $this->Item_model->getAllkat()
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        return $this->load->view('admin/mproducts/form_item', $data);
        $this->load->view('admin/partial/afooter');
    }

    // Delete Data Item
    public function delItem($id)
    {
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->Item_model->delData($id);
        return redirect('admin/mitem');
    }

    // View Detail Item
    public function viewItem($id)
    {
        $data = [
            'item' => $this->Item_model->getItem($id),
            'title' => 'View Item Detail'
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        return $this->load->view('admin/mproducts/view_item', $data);
        $this->load->view('admin/partial/afooter');
    }

    public function addphoto($id)
    {
        $tag = $this->Item_model->getItem($id);
        if($this->input->post('submit')){
            if($this->upload()){
                if($tag->img_item !== "default.png")
                    unlink(FCPATH.'/assets/upload/' . $tag->img_item);
                $filename = $this->upload->data('file_name');
                $this->db->set('img_item', $filename);
                $this->db->where('id_item', $id);
                $this->db->update('tb_items');
            }
        }

        $data = [
            'item' => $this->Item_model->getItem($id),
            'title' => 'Add Photo'
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        return $this->load->view('admin/mproducts/itemphoto_form', $data);
        $this->load->view('admin/partial/afooter');
    }

    public function upload()
    {
        $config['upload_path']      = FCPATH.'/assets/upload/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']        = 1000;
        $config['max_width']      = 5000;
        $config['max_height']      = 5000;

        $this->load->library('upload', $config);
        return $this->upload->do_upload('img_item');
    }
}
