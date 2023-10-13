<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtransaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model');
        $this->load->model('Sewa_model');
        $this->load->model('Item_model');
    }
    public function index(){
        if($this->input->post('search')){
            $keyword = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $keyword);
        } else {
            $keyword = $this->session->userdata('keyword');
        }

        $this->db->select('*');
        $this->db->like('id_transaksi', $keyword);
        $this->db->or_like('usrnm_user', $keyword);
        $this->db->or_like('tgl_transaksi', $keyword);
        $this->db->or_like('status_sewa', $keyword);
        $this->db->from('tb_transaksi');
        $this->db->join('tb_users', 'tb_transaksi.id_user = tb_users.id_user');
        $this->db->join('tb-sewa', 'tb_transaksi.id_sewa = tb-sewa.id_sewa');

        $config['base_url'] = 'http://localhost:80/jejaka-app/admin/Mtransaction/index/';
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data = [
            'start' => $this->uri->segment(4),
            'title' => 'Daftar Transaksi',
            'transaksi' => $this->Cart_model->getHistorytrans($config['per_page'], $start, $keyword)
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/mtransaction/list_transaction', $data);
        $this->load->view('admin/partial/afooter');
    }
    public function sewa(){
        if($this->input->post('search')){
            $keyword = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $keyword);
        } else {
            $keyword = $this->session->userdata('keyword');
        }

        $this->db->select('*');
        $this->db->like('id_sewa', $keyword);
        $this->db->or_like('usrnm_user', $keyword);
        $this->db->or_like('status_sewa', $keyword);
        $this->db->from('tb-sewa');
        $this->db->join('tb_users', 'tb-sewa.id_user = tb_users.id_user');

        $config['base_url'] = 'http://localhost:80/jejaka-app/admin/Mtransaction/sewa/';
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data = [
            'start' => $this->uri->segment(4),
            'title' => 'Daftar Sewa',
            'transaksi' => $this->Sewa_model->getSewalist($config['per_page'], $start, $keyword)
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/mtransaction/list_sewa', $data);
        $this->load->view('admin/partial/afooter');
    }

    public function confirm_byr()
    {
        $output = "";
        $id = $this->input->post('id_transaksi');
        $status = $this->input->post('statbyr');
        $output .='
        <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Status Pembayaran:</label>
        <input type="hidden" name="id_transaksi" value="'.$id.'">
        <select class="form-select" aria-label="Default select example" name="status">
            <option value="">Pilih Status</option>
            <option value="0" '.  set_select('status', '0', $status == 0 ? TRUE : FALSE).'>Belum Bayar</option>
            <option value="1" '.  set_select('status', '1', $status == 1 ? TRUE : FALSE).'>Lunas</option>
            <option value="2" '.  set_select('status', '2', $status == 2 ? TRUE : FALSE).'>Baru DP</option>
            <option value="3" '.  set_select('status', '3', $status == 3 ? TRUE : FALSE).'>Sedang Proses</option>
            <option value="4" '.  set_select('status', '4', $status == 4 ? TRUE : FALSE).'><p class="text text-danger">Cancel</p></option>
        </select>
        </div>
        <input type="submit" name="submit" value="Ubah" class="btn btn-primary">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            ';
        
        echo $output;
    }
    public function conf_bayar()
    {
        if($this->input->post('submit')){
            $id = $this->input->post('id_transaksi');
            $status = $this->input->post('status');
            if($status != null) {
                $this->Cart_model->statByr($id, $status);
                $this->session->set_flashdata('msg', '<p style="color: green;">Status Pembayaran Telah Diubah!</p>');
            } else {
                $this->session->set_flashdata('msg', '<p style="color: red;">Ubah Status Pembayaran Gagal!</p>');
            }
            redirect('admin/mtransaction');
        }
    }

    public function cek_detail($id_sewa)
    {
        $data = [
            'title' => 'Cek Item',
            'getDetail' => $this->Sewa_model->getDetail($id_sewa),
            'get_hari'  => $this->Sewa_model->getSewa($id_sewa)
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/mtransaction/list_item_sewa', $data);
        $this->load->view('admin/partial/afooter');
    }
    public function detail_sewa($id_sewa)
    {
        $data = [
            'title' => 'Detail Sewa',
            'getDetail' => $this->Sewa_model->getDetail($id_sewa),
            'get_hari'  => $this->Sewa_model->getSewa($id_sewa),
            'get_trans'  => $this->Sewa_model->getTrans($id_sewa),
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/mtransaction/detail_sewa', $data);
        $this->load->view('admin/partial/afooter');
    }
    public function detail_transaksi($id_sewa)
    {
        $data = [
            'title' => 'Cek Item',
            'getDetail' => $this->Sewa_model->getDetail($id_sewa),
            'get_hari'  => $this->Sewa_model->getSewa($id_sewa),
            'get_trans'  => $this->Sewa_model->getTrans($id_sewa),
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/mtransaction/detail_transaksi', $data);
        $this->load->view('admin/partial/afooter');
    }

    public function set_bagus($id)
    {
        $this->Sewa_model->updt_bagus($id);
        redirect($this->agent->referrer());
    }

    public function set_rusak($id)
    {
        $this->Sewa_model->updt_rusak($id);
        redirect($this->agent->referrer());
    }

    public function pendapatan()
    {
        if($this->input->post('search')){
            $keyword = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $keyword);
        } else {
            $keyword = $this->session->userdata('keyword');
        }

        $this->db->select('*');
        $this->db->like('tgl_transaksi', $keyword);
        $this->db->from('tb_transaksi');
        $this->db->join('tb_users', 'tb_transaksi.id_user = tb_users.id_user');
        $this->db->join('tb-sewa', 'tb_transaksi.id_sewa = tb-sewa.id_sewa');

        $config['base_url'] = 'http://localhost:80/jejaka-app/admin/Mtransaction/pendapatan/';
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data = [
            'start' => $this->uri->segment(4),
            'title' => 'Pendapatan',
            'transaksi' => $this->Cart_model->getHistorytranstot($config['per_page'], $start, $keyword)
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/mtransaction/list_pendapatan', $data);
        $this->load->view('admin/partial/afooter');
    }

    public function set_kembali($id)
    {
        $a = $this->Sewa_model->getDetailby($id);
        $b = $this->Item_model->getItemby($a->nm_item);
        $this->Sewa_model->updt_kembali($id);
        $newstock = $a->jumlah + $b->stk_item;
        $this->Item_model->update_stock($a->nm_item, $newstock);
        redirect($this->agent->referrer());
    }
}