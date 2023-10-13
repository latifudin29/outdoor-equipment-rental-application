<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Detail Sewa</h5>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Item</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Kondisi Item</th>
                <th scope="col">Status Kembali</th>
                <th scope="col">Action</th>
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
                    <td><?= $d->status_item; ?></td>
                    <td><?= $d->kembali == 1 ? 'Sudah Kembali' : 'Belum Kembali'; ?></td>
                    <td><?= $d->kembali == 1 ? 'Item Sudah Dikembalikan' : '<a href="'.site_url('admin/mtransaction/set_kembali/'. $d->id_detail_sewa).'"><i class="bx bx-undo me-1"></i></a>'; ?></td>
                </tr>
                <?php endforeach ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Jumlah Hari : </th>
                    <th><?= $get_hari->jumlah_hari; ?> hari</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total Pembayaran : </th>
                    <th>Rp. <?= number_format($total * $get_hari->jumlah_hari); ?></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Status Sewa : </th>
                    <th><?= $get_hari->status_sewa == 'cancel' ? '<p class="text text-danger">'. $get_hari->status_sewa.'</p>': '<p class="text text-success">'.$get_hari->status_sewa.'</p>' ?></th>
                </tr>
            </tbody>
        </table>
        <button onclick="history.back()">Back</button>
    </div>
    <!--/ Responsive Table -->
</div>





