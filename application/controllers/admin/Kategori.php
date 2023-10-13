<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
    }

    public function index()
    {
        if($this->input->post('search')){
            $keyword = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $keyword);
        } else {
            $keyword = $this->session->userdata('keyword');
        }

        $this->db->like('nm_kat', $keyword);
        $this->db->from('tb_kategori');

        $config['base_url'] = 'http://localhost:80/jejaka-app/admin/Kategori/index/';
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data = [
            'start' => $this->uri->segment(4),
            'title' => 'List Kategori',
            'kategori' => $this->Item_model->getAllkatpage($config['per_page'], $start, $keyword)
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/mproducts/t_kategori', $data);
        $this->load->view('admin/partial/afooter');
    }

    public function editKategori($id)
    {
        if($this->input->post('submit'))
        {
            $this->Item_model->edit_kat($id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<div style="color: green;">Berhasil Simpan Kategori!</div>');
            } else {
                $this->session->set_flashdata('msg', '<div style="color: red;">Gagal Simpan Kategori!</div>');
            }
            redirect('admin/kategori');
        }

        $data = [
            'title' => 'Edit Kategori',
            'kategori' => $this->Item_model->getKatby($id)
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/mproducts/form_kategori', $data);
        $this->load->view('admin/partial/afooter');
    }

    public function addKat()
    {
        if($this->input->post('submit'))
        {
            $this->Item_model->add_kat();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<div style="color: green;">Berhasil Simpan Kategori!</div>');
            } else {
                $this->session->set_flashdata('msg', '<div style="color: red;">Gagal Simpan Kategori!</div>');
            }
            redirect('admin/kategori');
        }

        $data = [
            'title' => 'Tambah Kategori',
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/mproducts/form_kategori');
        $this->load->view('admin/partial/afooter');
    }
}