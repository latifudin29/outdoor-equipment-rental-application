<section class="about">
<h1>Detail Sewa</h1>
<?= $this->session->flashdata('msg'); ?>
<br>
<div class="container-sm">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama Item</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Total Harga</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i = 1;
    $total = 0;
    foreach($getDetail as $d) : ?>
    <?php $total = $total + $d->tot_harga; ?>
    <tr style="vertical-align: middle;">
        <th scope="row"><?= $i++; ?></th>
        <td><?= $d->nm_item; ?></td>
        <td><?= $d->jumlah; ?></td>
        <td>Rp. <?= number_format($d->tot_harga); ?></td>
    </tr>
    <?php endforeach ?>
    <tr>
        <th></th>
        <th></th>
        <th>Jumlah Hari : </th>
        <th><?= $getDatasewa->jumlah_hari; ?> hari</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th>Total Pembayaran : </th>
        <th>Rp. <?= number_format($total * $getDatasewa->jumlah_hari); ?></th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th>Status Pembayaran : </th>
      <th><?php if ($transaksi->status_bayar == 0) {echo 'Belum Bayar';} else if($transaksi->status_bayar == 1) {echo 'Lunas';} else if($transaksi->status_bayar == 2){echo 'Baru DP';} else if($transaksi->status_bayar == 3){echo 'Sedang Diproses';} ?></th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th>
        <?php if($transaksi->status_bayar == 1 && $getDatasewa->status_sewa == 'active'){
          echo 'Pembayaran Anda Sudah Lunas';
        }  else if($transaksi->status_bayar != null && $getDatasewa->status_sewa == 'cancel'){
          echo '<span style="color: red;">Booking/Sewa Telah Dibatalkan</span>';
        } else {
          echo '<a href="" class="btn-default" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#bayar">Bayar</a>';
        } ?>
      </th>
    </tr>
  </tbody>
</table>
<a href="<?= site_url('page/usrHistorytrans'); ?>" class="btn">Back</a>



<!-- Modal by Boostrap -->
<div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pembayaran</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('cart/bayar'); ?>" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="hidden" name="id_transaksi" value="<?= $transaksi->id_transaksi; ?>">
            <input type="text" class="form-control" id="recipient-name" value="<?= $this->session->userdata('username'); ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">ID Transaksi:</label>
            <input type="text" class="form-control" name="" id="" value="<?= $transaksi->id_transaksi; ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Total Pembayaran:</label>
            <input type="number" class="form-control" name="" id="" value="<?= $total * $getDatasewa->jumlah_hari; ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Bukti Pembayaran:</label>
            <input type="file" class="form-control" name="bukti_bayar" id="" required>
          </div>
          <div class="mb-3">
            <label for="" class="col-form-label" style="color: red">
              * Transfer BCA <br> A/N Agung Widi Yulianto <br> 13122321321
            </label>
            <table>
              <tr>
                <td style="vertical-align: middle;"><img src="<?= base_url(); ?>/assets/image/iconbca.png" alt="" style="width: 45px; height: 25px; "></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Bayar</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>