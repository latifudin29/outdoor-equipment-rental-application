<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://localhost/jejaka-app/assets/upload/default.png">
    
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="<?= base_url(); ?>/assets/fontawesome/css/all.css" rel="stylesheet">
   
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">

    <title><?= $title; ?></title>

</head>

<body>

      <?php $navbar; ?>
      <?php $content; ?>
      <?php $footer; ?>
    
    
    <!-- Modal by Boostrap -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Booking</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('cart/checkout'); ?>" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="hidden" name="id_user" value="<?= $this->session->userdata('userid'); ?>">
            <input type="text" class="form-control" id="recipient-name" value="<?= $this->session->userdata('username'); ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Jumlah Hari:</label>
            <input type="number" class="form-control" name="jumlah_hari" id="jumlah_hari" value="1">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Book Now</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Boostrap alert -->
<div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Mohon Maaf!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2>Keranjang Masih Kosong</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Boostrap alert -->
<div class="modal fade" id="alertjumlah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Mohon Maaf!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2>Masukkan Jumlah Hari!</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Boostrap S&K -->
<div class="modal fade" id="sk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <section>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-size: medium;">Syarat & Ketentuan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2 style="font-size: 16px;">
          <ol>
            <li>
              Diharuskan membawa KTP ketika akan mengambil barang yang telah di booking melalui aplikasi web. Hal ini digunakan sebagai jaminan ketika meminjam barang.
            </li>
            <li>Ketika pengembalian barang, diharapkan keadaan barang dalam keadaan baik dan tidak ada kerusakan. Jika terdapat kerusakan maka akan dikenakan biaya tambahan.</li>
            <li>Penyewa berhak mendapatkan kembali dokumen yang dijadikan sebagai jaminan, ketika pemeriksaan barang sudah aman.</li>
          </ol>
        </h2>
      </div>
      <div class="modal-footer">
        <button type="button-sm" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </section>
</div>

<!-- Modal Untuk Profile -->
<?php 
  $this->load->model('Auth_model');
  $data = $this->Auth_model->getUserby($this->session->userdata('userid'));
?>
<div class="modal fade" id="viewProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <section>
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-size: medium;">Profil</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="text-center">
                <a href="" data-bs-target="#changephoto" data-bs-toggle="modal">
                  <img src="<?= base_url(); ?>assets/upload/avatar/<?= $data->img_user; ?>" class="rounded mb-5" height="200px" alt="No Image">
                </a>
              </div>
              <table>
                  <tr>
                      <th>Username &nbsp;</th>
                      <td>&nbsp; : <?= $data->usrnm_user; ?></td>
                  </tr>
                  <tr>
                      <th>Fullname &nbsp;</th>
                      <td>&nbsp; : <?= $data->fname_user == null ? '-' : $data->fname_user; ?></td>
                  </tr>
                  <tr>
                      <th>NIK &nbsp;</th>
                      <td>&nbsp; : <?= $data->nik_user == null ? '-' : $data->nik_user; ?></td>
                  </tr>
                  <tr>
                      <th>Email &nbsp;</th>
                      <td>&nbsp; : <?= $data->email_user == null ? '-' : $data->email_user; ?></td>
                  </tr>
                  <tr>
                      <th>Alamat &nbsp;</th>
                      <td>&nbsp; : <?= $data->addr_user == null ? '-' : $data->addr_user; ?></td>
                  </tr>
                  <tr>
                      <th>Jenis Kelamin &nbsp;</th>
                      <td>&nbsp; : <?= $data->gnd_user == null ? '-' : $data->gnd_user; ?></td>
                  </tr>
                  <tr>
                      <th>Tempat Lahir &nbsp;</th>
                      <td>&nbsp; : <?= $data->tmplh_user == null ? '-' : $data->tmplh_user; ?></td>
                  </tr>
                  <tr>
                      <th>Tanggal Lahir &nbsp;</th>
                      <td>&nbsp; : <?= $data->tgl_user == null ? '-' : $data->tgl_user; ?></td>
                  </tr>
                  <tr>
                      <th>No. HP/ WA &nbsp;</th>
                      <td>&nbsp; : <?= $data->nohp1_user == null ? '-' : $data->nohp1_user; ?> / <?= $data->nohp2_user == null ? '-' : $data->nohp2_user; ?> </td>
                  </tr>
                  <tr>
                      <th>KTP &nbsp;</th>
                      <td>&nbsp; : <a href="" data-bs-target="#uploadktp" data-bs-toggle="modal">
                        <img src="<?= base_url(); ?>assets/upload/ktp/<?= $data->img_ktp; ?>" alt="" width="150px">
                      </a>
                      </td>
                  </tr>
                  <tr>
                      <th>KK &nbsp;</th>
                      <td>&nbsp; : 
                        <a href="" data-bs-target="#uploadkk" data-bs-toggle="modal">
                          <img src="<?= base_url(); ?>assets/upload/kk/<?= $data->img_kk; ?>" alt="" width="150px">
                        </a>
                      </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>&nbsp;
                      <a href="<?= site_url('page/editProfil/'.$data->id_user); ?>" class="btn-default mb-3" style="text-decoration: none;">Edit Profile</a>
                      <form action="<?= site_url('page/changePass'); ?>">
                        <input type="hidden" name="userid" value="<?= $data->id_user; ?>">
                        &nbsp; <input type="submit" class="btn-default" value="Change Password" name="submit">
                      </form>
                      <!-- <a href="" class="btn-default" style="text-decoration: none;">Change Password</a> -->
                    </td>
                  </tr>
              </table>
              <!-- <div class="text-center">
              </div> -->
              <p class="text-danger mb-3 mt-4"><i>*Harap Lengkapi Data Pribadi Anda dengan Sebenar-benarnya!</i></p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button-sm" class="btn-default" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      </section>
    </div>
    <!-- End Modal -->

    <!-- Modal Change Password -->
    <div class="modal fade" id="changepass" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Change Password</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <?= $this->session->flashdata('msg'); ?>
          <div class="modal-body">
          <form action="<?= site_url('auth/changepass'); ?>" method="POST">
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Current Password</label>
                <input type="hidden" name="email" value="<?= $data->email_user; ?>">
                <input type="password" name="curpassword" class="form-control" id="" placeholder="******">

              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">New Password</label>
                <input type="password" name="newpassword" class="form-control" id="" placeholder="******">
   
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Re-type Password</label>
                <input type="password" name="repassword" class="form-control" id="" placeholder="******">
               
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
          <div class="modal-footer">
            <button class="btn-default" data-bs-target="#viewProfile" data-bs-toggle="modal">Back</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Ubah Foto -->
    <div class="modal fade" id="changephoto" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Ubah Avatar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <img src="<?= base_url(); ?>assets/upload/avatar/<?= $data->img_user; ?>" class="rounded mx-auto d-block" alt="..." height="200px">
          <div id="status"></div>
          <form id="uploadfotoform" action="<?= site_url(); ?>auth/uploadfotoAv" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="" class="form-label">Upload Foto</label>
                <input type="hidden" name="id_user" value="<?= $data->id_user; ?>" id="iduser">
                <input type="file" class="form-control" id="uploadfoto" name="img_user">
              </div>
              <input type="submit" id="submit" name="submit" value="Save" class="btn btn-primary submit">
          </form>
          </div>
          <div class="modal-footer">
            <button class="btn-default" data-bs-target="#viewProfile" data-bs-toggle="modal">Back</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Upload KTP -->
    <div class="modal fade" id="uploadktp" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Upload KTP</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="******">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="******">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Re-type Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="******">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
          <div class="modal-footer">
            <button class="btn-default" data-bs-target="#viewProfile" data-bs-toggle="modal">Back</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal Upload KK -->
    <div class="modal fade" id="uploadkk" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Kartu Keluarga</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="******">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="******">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Re-type Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="******">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
          <div class="modal-footer">
            <button class="btn-default" data-bs-target="#viewProfile" data-bs-toggle="modal">Back</button>
          </div>
        </div>
      </div>
    </div>

    
<!-- custom js -->
    <script src="<?= base_url(); ?>/assets/js/script.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery-2.2.3.min.js"></script>
    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        $('.add_cart').click(function(){
            var produk_id    = $(this).data("produkid");
            var produk_nama  = $(this).data("produknama");
            var produk_harga = $(this).data("produkharga");
            var quantity     = $('#' + produk_id).val();
            // document.write(produk_id + produk_nama + produk_harga + quantity);
            $.ajax({
                url : "<?php echo base_url();?>cart/add_to_cart",
                method : "POST",
                data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, quantity: quantity},
                success: function(data){
                    // console.log(data);
                    $('#detail_cart').html(data);
                }
            });
        });
 
        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url();?>cart/load_cart");
 
        //Hapus Item Cart
        $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url : "<?php echo base_url();?>cart/hapus_cart",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                    
                }
            });
        });
      });
    </script>
    <script>
      $(document).ready(function(){
        $('.ambil').click(function(){
          var id_sewa = $(this).data("id");
          var jumlah_hari = $(this).data("jumlah");
          $.ajax({
            url : "<?php echo base_url();?>sewa/set_tgl",
            method : "POST",
            data : {id_sewa: id_sewa, jumlah: jumlah_hari},
            success : function(data){
              $('#pass_data').html(data);
              $('#setambil').modal('show');
            }
          });
        });
      });
    </script>
    <script>
            // membuat fungsi change
            function change() {
    
                // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
                var x = document.getElementById('curpass').type;
    
                //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
                if (x == 'password') {
    
                    //ubah form input password menjadi text
                    document.getElementById('curpass').type = 'text';
                    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = `<svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="Crimson" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
                }
                else {
    
                    //ubah form input password menjadi text
                    document.getElementById('curpass').type = 'password';
    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = `<svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
                }
            }
            // membuat fungsi change
            function change2() {
    
                // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
                var x = document.getElementById('newpass').type;
    
                //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
                if (x == 'password') {
    
                    //ubah form input password menjadi text
                    document.getElementById('newpass').type = 'text';
                    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton2').innerHTML = `<svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="Crimson" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
                }
                else {
    
                    //ubah form input password menjadi text
                    document.getElementById('newpass').type = 'password';
    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton2').innerHTML = `<svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
                }
            }
            // membuat fungsi change
            function change3() {
    
                // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
                var x = document.getElementById('repass').type;
    
                //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
                if (x == 'password') {
    
                    //ubah form input password menjadi text
                    document.getElementById('repass').type = 'text';
                    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton3').innerHTML = `<svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="Crimson" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
                }
                else {
    
                    //ubah form input password menjadi text
                    document.getElementById('repass').type = 'password';
    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton3').innerHTML = `<svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
                }
            }
            function val_jumlah() {
              var jumlah = document.getElementById('jumlah_hari').value;
              if(jumlah == null){
                document.getElementById('alertjumlah');
              }
            }
        </script>
</body>

</html>