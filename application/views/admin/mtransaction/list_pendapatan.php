<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Pendapatan</h5>
        <!-- Filter -->
        <form action="<?= site_url('admin/mtransaction/pendapatan'); ?>" method="post">
            <label for="exampleFormControlSelect1" class="form-label ms-4">Filter Pertahun</label>
            <div class="input-group mb-3 ms-3 w-25">
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="keyword">
                            <option value="" selected>Tahun</option>
                            <?php 
                                for($i=date('Y'); $i>=date('Y')-3; $i-=1){
                                    echo"<option value='$i'> $i </option>";
                                    }
                            ?>
                        </select>
                <input class="btn btn-primary" type="submit" id="button-addon2" name="search" value="Filter">
            </div>
        </form>
        <!-- End Filter -->
        <div class="table-responsive text-nowrap">
            <?php if ($transaksi != null) { ?>
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Tgl Transaksi</th>
                            <th>ID Booking</th>
                            <th>Tanggal Sewa</th>
                            <th>Status Pembayaran</th>
                            <th>Total Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    $total = 0;
                    foreach ($transaksi as $tr) { ?>
                    <?php if ($tr->status_bayar != 1) { ?>
                        <?php continue; ?>
                    <?php } ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $tr->id_transaksi ?></td>
                        <td><?= $tr->tgl_transaksi ?></td>
                        <td><?= $tr->id_sewa ?></td>
                        <td><?= $tr->tanggal_sewa ?></td>
                        <td><?= $tr->status_bayar == 1 ? 'Lunas' : 'Belum Bayar'; ?></td>
                        <td><?= $tr->total_pembayaran ?></td>
                        <?php $total = $total + $tr->total_pembayaran ?>
                    </tr>
                <?php } ?>
                    <tr>
                        <th colspan="6"><h2><strong>Total Pendapatan</strong></h2></th>
                        <th><h2><strong>Rp. <?= number_format($total); ?>,-</strong></h2></th>
                    </tr>
                    </tbody>
            </table>
    <?php } else { ?>
        <div align="center">
            <h1>No Data Entry</h1>
        </div>
    <?php } ?>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>





