<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
        $this->load->model('User_model');
    }

    public function index()
    {

        $data = [
            'title' => 'Dashboard',
            'user_valid' => $this->User_model->user_valid(),
            'user_total' => $this->User_model->user_total(),
        ];
        if (!$this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/partial/afooter');
    }
    
    public function item()
    {
        $data = [
            'title' => 'Items',
            'items' => $this->Item_model->getAll()
        ];
        $this->load->view('admin/mproducts/list_product', $data);
    }
}
