<section class="about">
<div class="container-sm">
  <form method="POST" action="<?= site_url('cart/transaksi'); ?>">
      <legend>Transaksi</legend>
      <div class="mb-3 col-2">
        <label for="exampleFormControlInput1" class="form-label">No.Sewa</label>
        <input type="hidden" name="id_user" value="<?= $id_user; ?>">
        <input type="text" class="form-control" name="id_sewa" id="exampleFormControlInput1" placeholder="No.sewa" value="<?= $id_sewa ?>">
      </div>
      <div class="mb-3 col-2">
        <label for="exampleFormControlInput1" class="form-label">Jumlah Hari</label>
        <input type="text" class="form-control" name="" id="exampleFormControlInput1" placeholder="Jumlah Hari" value="<?= $hari ?>">
      </div>
      <div class="mb-3 col-2">
        <label for="exampleFormControlInput1" class="form-label">Total Pembayaran</label>
        <input type="text" class="form-control" name="total_pembayaran" id="exampleFormControlInput1" placeholder="Total Pembayaran" value="<?php $value1 = $this->cart->total(); $value2 = $hari; echo $total = $value1 * $value2 ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>
</section>