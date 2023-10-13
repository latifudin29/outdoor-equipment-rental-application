<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Cek Item Kembali</h5>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Item</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Kondisi Item</th>
                <th scope="col">Set Kondisi</th>
                <th scope="col">Set Kembali</th>
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
                    <td><?= $d->status_item; ?></td>
                    <td><a href="<?= site_url('admin/mtransaction/set_bagus/'. $d->id_detail_sewa); ?>" class="btn btn-primary">Bagus</a> | <a href="<?= site_url('admin/mtransaction/set_rusak/'. $d->id_detail_sewa); ?>" class="btn btn-danger">Rusak</a></td>
                    <td><a href="<?= site_url('admin/mtransation/set_kembali/'. $d->id_detail_sewa); ?>"></a></td>
                    <td>
                        <?= $d->kembali == 1 ? 'Sudah Kembali' : '<a href="'.site_url('admin/mtransaction/set_kembali/'. $d->id_detail_sewa).'">Dikembalikan</a>' ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <button onclick="history.back()">Back</button>
    </div>

    <!--/ Responsive Table -->
</div>





