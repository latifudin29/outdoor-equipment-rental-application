<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Msewa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sewa_model');
    }

    public function cancel($id)
    {
        $this->Sewa_model->cancel($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('msg', '<p style="color: red">Pesanan Berhasil Dibatalkan!</p>');
            redirect($this->agent->referrer());
        }
    }
}