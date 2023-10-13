<section class="about">
<h2>Daftar Booking / Sewa</h2>
<br>
<div class="container-sm">
<table class="table">
  <thead style="text-align: center;">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Tanggal</th>
      <th scope="col">ID Transaksi</th>
      <th scope="col">ID Booking</th>
      <th scope="col">Nama</th>
      <th scope="col">Total Pembayaran</th>
      <th scope="col">Transaksi</th>
      <th scope="col">Cek Detail</th>
      <th scope="col">Tgl. Pengambilan</th>
      <th scope="col">Kembali</th>
      <th scope="col">Pembatalan</th>
    </tr>
  </thead>
  <tbody>
    <?php $filter = $this->session->userdata('userid'); ?>
    <?php $i = 1; ?>
    <?php foreach($data as $d) : ?>
        <?php if ($d->id_user != $filter) { ?>
            <?php continue; ?>
        <?php } ?>
            <tr style="vertical-align: middle; text-align: center;">
              <th scope="row"><?= $i++; ?></th>
              <td><?= $d->tanggal_sewa; ?></td>
              <td><?= $d->id_transaksi; ?></td>
              <td><?= $d->id_sewa; ?></td>
              <td><?= $d->fname_user == "" ? $d->usrnm_user : $d->fname_user; ?></td>
              <td><?= $d->total_pembayaran; ?></td>
              <td><?php if ($d->status_bayar == 0) {echo 'Belum Bayar';} else if($d->status_bayar == 1) {echo 'Lunas';} else if($d->status_bayar == 2){echo 'Baru DP';} else if($d->status_bayar == 3){echo 'Sedang Diproses';} ?></td>
              <td><a href="<?= site_url('page/detail_sewa/'. $d->id_sewa); ?>" class="btn-default" style="text-decoration: none;">View</a></td>
              <td>
                <?php if($d->tanggal_pengambilan != null) { ?>
                  <?= $d->tanggal_pengambilan; ?>
                <?php } else { ?>
                  <button type="button" class="btn-default ambil" data-id="<?= $d->id_sewa; ?>" data-jumlah="<?= $d->jumlah_hari; ?>">Set</button>
                <?php } ?>
              </td>
              <td><?= $d->pengembalian != null ? $d->pengembalian : '-'; ?></td>
              <td>
                <?php if($d->status_sewa == 'cancel') {?>
                  <?= '<span style="color: red;">Dibatalkan</span>'; ?>
                <?php } else { ?>
                  <a href="<?= site_url('sewa/cancel/'. $d->id_sewa); ?>" class="btn-default" style="text-decoration: none;" onclick="return confirm('Apakah Yakin Ingin Membatalkan Sewa ?');">Cancel</a>
                <?php } ?>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- Kumpulan Modal -->
      <!-- -------------------------------------------------- -->
      <!-- Modal setambil -->
      <div class="modal fade" id="setambil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1>Tanggal Pengambilan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="<?= site_url('sewa/updateTanggal'); ?>" method="post">
              <div id="pass_data"></div>
            </form>
            <div class="modal-footer">
              <p>&copy; Mahasiswa Unla | Jejaka Outdoor</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Cancel -->
      <div class="modal fade" id="cancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1>Cancel</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="<?= site_url('sewa/updateTanggal'); ?>" method="post">
              <div id="cancel"></div>
            </form>
            <div class="modal-footer">
              <p>&copy; Mahasiswa Unla | Jejaka Outdoor</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Confirm -->
      <!-- Modal -->
      <div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h2>Apakah Anda Yakin Ingin Membatalkan Sewa?</h2>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
              <button type="button" class="btn btn-primary">Ya</button>
            </div>
          </div>
        </div>
      </div>
      <!-- -------------------------------------------------- -->
    </section>
    

