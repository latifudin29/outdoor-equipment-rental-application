
<head>
    <link rel="shortcut icon" href="http://localhost/jejaka-app/assets/upload/default.png">
</head>
  <header class="header">

<a href="<?= site_url('page'); ?>" class="logo" style="text-decoration: none;"> <i class="fa-solid"><img src="<?= base_url(); ?>/assets/upload/default.png" alt="" height="40px"></i> JejakaOutdoor</a>

<?php $id = $this->session->userdata('userid'); ?>
<nav class="navbar">
    <a href="<?= site_url('page'); ?>" style="text-decoration: none;">Beranda</a>
    <!-- <a href="" style="text-decoration: none;">Artikel</a> -->
    <a href="<?= site_url('page/tentang'); ?>" style="text-decoration: none;">Tentang</a>
    <a href="<?= base_url(); ?>page#categories" style="text-decoration: none;">Produk</a>
    <?php if($this->session->userdata('status') == 1) { ?>
    <a href="<?= site_url('page/usrHistorytrans'); ?>" style="text-decoration: none;">Booking</a>
    <?php } ?>
    <a href="" data-bs-toggle="modal" data-bs-target="#sk" style="text-decoration: none;">S&K</a>
    <a href="<?= site_url('page/blacklist'); ?>" style="text-decoration: none;">Daftar Hitam</a>
</nav>
<?php  
$this->load->model('User_model');
$id = $this->session->userdata('userid');
$data = $this->User_model->getUser($id);
?>
<div class="navbar2">
    <div class="src fas fa-search" id="search-btn"></div>
    <div class="cart fas fa-shopping-cart" id="cart-btn"></div>
        <!-- <a href="#">Logout</a> -->
        <?php if($this->session->userdata('status') == 1) { ?>
            <a href="" data-bs-toggle="modal" data-bs-target="#viewProfile" style="text-decoration: none;"><?= $this->session->userdata('username'); ?>&nbsp;<img src="<?= base_url(); ?>/assets/upload/avatar/<?= $data->img_user; ?>" alt="" width="30px" style="border-radius: 50%;"></a>
            <span> | </span>
            <a href="<?= site_url('auth/logout'); ?>" style="text-decoration: none;">Logout</a>
        <?php } else { ?>
            <a href="<?= site_url('auth/register'); ?>" style="text-decoration: none;">Daftar</a>
            <span> | </span>
            <a href="<?= site_url('auth/'); ?>" style="text-decoration: none;">Login</a>
        <?php } ?>

</div>

<!-- <form action="" class="search-form">
    <input type="search" id="search-box" placeholder="cari disini..">
    <label for="search-box" class="fas fa-search"></label>
</form> -->
<div class="shopping-cart" id="detail_cart"></div>

</header>