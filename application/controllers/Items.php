<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
    }
    public function index()
    {
        $data = [
            'title' => 'Items',
            'items' => $this->Item_model->getAll()
        ];
        $this->load->view('admin/');
    }
}
