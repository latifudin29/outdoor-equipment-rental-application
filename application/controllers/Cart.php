<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Cart_model');
      $this->load->model('Item_model');
    }
    public function add_to_cart(){
        // echo 'test';

    $data = array(
			'id' => $this->input->post('produk_id'), 
			'name' => $this->input->post('produk_nama'), 
			'price' => $this->input->post('produk_harga'), 
			'qty' => $this->input->post('quantity'), 
		);
    
		$this->cart->insert($data);
		echo $this->show_cart(); //tampilkan cart setelah added
    }

    public function show_cart()
    {
    
    $output = '';
    if($this->cart->total() == 0){
      $output .= '
          <div class="total"> total : '.'Rp '.number_format($this->cart->total()).' </div>
          <a href="" class="btn" data-bs-toggle="modal" data-bs-target="#modal2">Book Now</a>
		';
    }else{
      foreach ($this->cart->contents() as $items) {
        $output .='
                  <div class="box">
                  <i class="hapus_cart fas fa-trash" id="'.$items['rowid'].'"></i>
                  <div class="content">
                      <h3>'.$items['name'].'</h3>
                      <span class="price">Rp. '.number_format($items['price']).' /hari</span>
                      <span class="quantity">jml : '.$items['qty'].'</span>
                  </div>
                  </div>
                  <div>
                  <p>Sub Total : '.number_format($items['subtotal']).'</h4>
                  <div>
        ';
      }
      $output .= '
            <div class="total"> total : '.'Rp '.number_format($this->cart->total()).' </div>
            <a href="" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Book Now</a>
      ';
    }

		echo $output;
    }

  public function load_cart(){ //load data cart
		return $this->show_cart();
	}

  public function hapus_cart(){ //fungsi untuk menghapus item cart
   
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0, 
		);
		$this->cart->update($data);
		echo $this->show_cart();
	}

  public function checkout(){
    $id_sewa = random_string('numeric', 8);
    $data = [
      'id_sewa' => $id_sewa,
      'id_user' => $this->input->post('id_user'),
      'jumlah_hari' => $this->input->post('jumlah_hari'),
    ];
    $this->Cart_model->insData($data); // insert to tabel sewa
    foreach($this->cart->contents() as $items){
      $data = [
        'id_sewa' => $id_sewa,
        'nm_item' => $items['name'],
        'jumlah' => $items['qty'],
        'tot_harga' => $items['subtotal']
      ];
      $this->Cart_model->insdetailSewa($data);
      $getItem = $this->Item_model->getItemby($items['name']);
      $oldstock = $getItem->stk_item;
      $newstock = $oldstock - $items['qty'];
      $this->Cart_model->updt_stock($items['name'],$newstock);
    }
    redirect('page/transaksi/'.$id_sewa);
  }

  public function transaksi(){
    $data = [
      'id_transaksi' => random_string('numeric', 5),
      'id_sewa' => $this->input->post('id_sewa'),
      'id_user' => $this->input->post('id_user'),
      'total_pembayaran' => $this->input->post('total_pembayaran')
    ];
    $this->load->model('Cart_model');
    $this->Cart_model->insTrans($data);
    $this->cart->destroy(); 
    redirect('page/usrHistorytrans');
  }

  public function bayar()
    {
        $id = $this->input->post('id_transaksi');
        $config['upload_path']      = FCPATH.'/assets/upload/bukti_pembayaran/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']        = 1000;
        $config['max_width']      = 5000;
        $config['max_height']      = 5000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_bayar'))
        {
          $this->session->set_flashdata('msg', $this->upload->display_errors());
          redirect($this->agent->referrer());
        }
          else
        {
          $this->upload->do_upload('img_item');
          $filename = $this->upload->data('file_name');
          $this->Cart_model->upload_bukti($id, $filename);
          $this->session->set_flashdata('msg', 'Berhasil Upload Bukti Pembayaran');
          redirect($this->agent->referrer());
        }
    }

    	
}