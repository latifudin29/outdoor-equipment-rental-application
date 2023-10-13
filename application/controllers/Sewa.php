<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sewa_model');
    }
    
    public function set_tgl()
    {
        $output = "";
        $id = $this->input->post('id_sewa');
        $jumlah = $this->input->post('jumlah');
        // $data = $this->Sewa_model->getSewa($id);
        $output .='
                <div class="mb-3">
                    <input type="date" class="form-control form-control-lg" name="tanggal_pengambilan">
                    <input type="hidden" name="pengembalian" value="'.$jumlah.'">
                    <input type="hidden" name="id_sewa" value="'.$id.'">
                </div>
                <input type="submit" class="btn-default btn-primary mb-3" name="submit" value="submit">
            ';
        
        echo $output;
    }

    public function updateTanggal()
    {
        if($this->input->post('submit'))
        {
            $id = $this->input->post('id_sewa');
            $data = [
                'tanggal_pengambilan' => $this->input->post('tanggal_pengambilan'),
                'pengembalian' => date('Y-m-d', strtotime('+'.$this->input->post('pengembalian').' days', strtotime($this->input->post('tanggal_pengambilan'))))
            ];
            $this->Sewa_model->setTanggal($id, $data);
            redirect('page/usrHistorytrans');
        }
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