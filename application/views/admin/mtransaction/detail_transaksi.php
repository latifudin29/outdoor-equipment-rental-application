<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Data Transaksi</h5>
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
                    <th><?= $get_hari->jumlah_hari; ?> hari</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Total Pembayaran : </th>
                    <th>Rp. <?= number_format($total * $get_hari->jumlah_hari); ?></th>
                </tr>
                <tr>
                    <th colspan="4" style="text-align: center;">
                        <img src="<?= base_url(); ?>/assets/upload/bukti_pembayaran/<?= $get_trans->bukti_pembayaran; ?>" alt="Belum Ada Bukti Transfer" width="600px">
                    </th>
                </tr>
            </tbody>
        </table>
        <button onclick="history.back()">Back</button>
    </div>
    <!--/ Responsive Table -->
</div>





