<section class="about">
<h2>Daftar Hitam</h2>
<br>
<div class="container-sm">
<table class="table">
  <thead style="text-align: center;">
    <tr>
      <th scope="col">Identitas</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($passdata as $d){ ?>
    <tr style="vertical-align: middle; text-align: start;">
        <td>
            <div style="width: 600px;">
                <img src="<?= base_url(); ?>assets/upload/ktp/<?= $d->img_ktp; ?>" alt="" style="width: 400px">
            </div>
        </td>
        <td>
            <div style="width: 700px;">
                <h2 style="text-align: start;"><?= $d->fname_user == null ? 'Tidak Diketahui' : $d->fname_user; ?></h2>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>&nbsp : <?= $d->fname_user == null ? 'Tidak Ada Keterangan' : $d->fname_user; ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>&nbsp : <?= $d->usrnm_user == null ? 'Tidak Ada Keterangan' : $d->usrnm_user; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>&nbsp : <?= $d->email_user == null ? 'Tidak Ada Keterangan' : $d->email_user; ?></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>&nbsp : <?= $d->nik_user == null ? 'Tidak Ada Keterangan' : $d->nik_user; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>&nbsp : <?= $d->addr_user == null ? 'Tidak Ada Keterangan' : $d->addr_user; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>&nbsp : <?= $d->gnd_user == null ? 'Tidak Ada Keterangan' : $d->gnd_user; ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Tanggal Lahir</td>
                        <td>&nbsp : <?= $d->tmplh_user == null && $d->tgl_user == null ? 'Tidak Ada Keterangan' : $d->tmplh_user .", ". $d->tgl_user; ?></td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
</div>
</section>
    

