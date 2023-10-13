<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Item_model');
		$this->load->model('Sewa_model');
		$this->load->model('Auth_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		$data['title'] = 'Home';
		$data['navbar'] = $this->load->view('partial/navbar.php');
		$data['content'] = $this->load->view('pages/home.php');
		$data['footer'] = $this->load->view('partial/footer.php');
		
		$this->load->view('partial/head.php', $data);
	}
	
	public function tentang()
	{
		$data['title'] = 'Tentang';
		$data['navbar'] = $this->load->view('partial/navbar.php');
		$data['content'] = $this->load->view('pages/tentang.php');
		$data['footer'] = $this->load->view('partial/footer.php');

		$this->load->view('partial/head.php', $data);
	}
	
	public function tor()
	{
		$data['title'] = 'Term of Condition';
		$data['navbar'] = $this->load->view('partial/navbar.php');
		$data['content'] = $this->load->view('pages/tor.php');
		$data['footer'] = $this->load->view('partial/footer.php');

		$this->load->view('partial/head.php', $data);
	}

	public function categories($isi)
	{
		if($isi == 'Peralatan%20Masak'){
			$isi = "Peralatan Masak";
		} else if($isi == 'Peralatan%20Tidur'){
			$isi = "Peralatan Tidur";
		} else if($isi == 'Alat%20Penerangan'){
			$isi = "Alat Penerangan";
	    }else if($isi == 'Alat%20Tracking'){
			$isi = "Alat Tracking";
	    }else if($isi == 'Survival%20Tools'){
			$isi = "Survival Tools";
	    }else if($isi == 'Lihat%20Lainnya'){
			$isi = "Alat Tambahan";
	    }else {
			$isi;
		}

		$itm = [
			'title' => $isi,
			'item'  => $this->Item_model->getBy($isi)
		];
		// $data['item'] = $this->Item_model->getBy($isi='Tenda');
		$data['title'] = 'Kategori Alat';
		$data['navbar'] = $this->load->view('partial/navbar.php');
		$data['content'] = $this->load->view('pages/categories.php', $itm);
		$data['footer'] = $this->load->view('partial/footer.php');
		$this->load->view('partial/head.php', $data);
	}
	public function transaksi($id_sewa){
		$this->load->model('Cart_model');
		$tag = $this->Cart_model->getSewaby($id_sewa);
		$isi = [
			'id_sewa' => $id_sewa,
			'id_user' => $tag->id_user,
			'tgl' => $tag->tanggal_sewa,
			'hari' => $tag->jumlah_hari
		];

		$data['title'] = 'Transaksi';
		$data['navbar'] = $this->load->view('partial/navbar.php');
		$data['content'] = $this->load->view('pages/transaksi.php',$isi);
		$data['footer'] = $this->load->view('partial/footer.php');
		if (! $this->session->userdata('username')) redirect('auth');
		$this->load->view('partial/head.php', $data);
	}

	public function historyTrans(){
		$this->load->model('Cart_model');
		$temp = $this->Cart_model->getHistorytrans();

		$isi = [
			'data' => $temp,
		];

		$data['title'] = 'Riwayat Transaksi';
		$data['navbar'] = $this->load->view('partial/navbar.php');
		$data['content'] = $this->load->view('pages/history.php',$isi);
		$data['footer'] = $this->load->view('partial/footer.php');
		if (! $this->session->userdata('username')) redirect('auth');
		$this->load->view('partial/head.php', $data);
	}

	public function usrHistorytrans(){
		$this->load->model('Cart_model');

		$isi['data'] = $this->Cart_model->usrHistorytrans();

		$data['title'] = 'Riwayat Transaksi';
		$data['navbar'] = $this->load->view('partial/navbar.php');
		$data['content'] = $this->load->view('pages/history.php',$isi);
		$data['footer'] = $this->load->view('partial/footer.php');
		if (! $this->session->userdata('username')) redirect('auth');
		$this->load->view('partial/head.php', $data);
	}

	public function detail_sewa($id_sewa)
	{
		$isi = [
            'getDetail' => $this->Sewa_model->getDetail($id_sewa),
			'getDatasewa'  => $this->Sewa_model->getSewa($id_sewa),
			'transaksi'	=> $this->Sewa_model->getTrans($id_sewa)
        ];

		$data['title'] = 'Detail Sewa';
		$data['navbar'] = $this->load->view('partial/navbar.php');
		$data['content'] = $this->load->view('pages/detail_sewa.php',$isi);
		$data['footer'] = $this->load->view('partial/footer.php');
		if (! $this->session->userdata('username')) redirect('auth');
		$this->load->view('partial/head.php', $data);
	}

	public function editProfil($id)
	{
		$isi = [
            'passdata' => $this->Auth_model->getuserby($id),
        ];

		$data['title'] = 'Detail Sewa';
		$data['navbar'] = $this->load->view('partial/navbar.php');
		$data['content'] = $this->load->view('pages/auth/editProfile.php',$isi);
		$data['footer'] = $this->load->view('partial/footer.php');
		if (! $this->session->userdata('username')) redirect('auth');
		$this->load->view('partial/head.php', $data);
	}

	public function changePass()
	{
		$id = $this->input->post('userid');
		$isi = [
            'passdata' => $this->Auth_model->getuserby($id),
        ];

		$data['title'] = 'Change Password';
		$data['navbar'] = $this->load->view('partial/navbar.php');
		$data['content'] = $this->load->view('pages/auth/changePass.php',$isi);
		$data['footer'] = $this->load->view('partial/footer.php');
		if (! $this->session->userdata('username')) redirect('auth');
		$this->load->view('partial/head.php', $data);
	}

	public function blacklist()
	{
		$isi['passdata'] = $this->User_model->block_users();
		$data['title'] = 'Daftar Hitam';
		$data['navbar'] = $this->load->view('partial/navbar.php');
		$data['content'] = $this->load->view('pages/blacklist.php',$isi);
		$data['footer'] = $this->load->view('partial/footer.php');
		$this->load->view('partial/head.php', $data);
	}

}
