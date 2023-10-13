<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Data Sewa</h5>
        <form action="<?= site_url('admin/mtransaction/sewa'); ?>" method="post">
            <div class="input-group mb-3 ms-3 w-25">
                <input type="text" class="form-control" placeholder="Search ..." aria-label="" aria-describedby="button-addon2" name="keyword" autocomplete="off" autofocus>
                <input class="btn btn-primary" type="submit" id="button-addon2" name="search" value="Search">
            </div>
        </form>
        <div class="card-header"><?= $this->session->flashdata('msg'); ?></div>
        <div class="table-responsive text-nowrap p-3">
            <?php if ($transaksi != null) { ?>
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>No</th>
                            <th>Name</th>
                            <th>ID Booking</th>
                            <th>Tanggal Sewa</th>
                            <th>Jumlah Hari</th>

                            <th>Tgl. Pengambilan</th>
                            <th>Pengembalian</th>
                            <th>Status Sewa</th>
                            <th>Cek Item</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                foreach ($transaksi as $tr) { ?>
                    <tr>
                        <td><?= ++$start ?></td>
                        <td><?= $tr->usrnm_user ?></td>
                        <td><?= $tr->id_sewa ?></td>
                        <td><?= $tr->tanggal_sewa ?></td>
                        <td><?= $tr->jumlah_hari ?></td>

                        <td><?= $tr->tanggal_pengambilan == null ? '-' : $tr->tanggal_pengambilan ?></td>
                        <td><?= $tr->pengembalian == null ? '-' : $tr->pengembalian ?></td>
                        <td><?= $tr->status_sewa; ?></td>
                        <td>
                            <?php if($tr->status_sewa == 'cancel') {?>
                                <a href="<?=site_url('admin/mtransaction/cek_detail/' . $tr->id_sewa)?>">Kembalikan Item</a>
                            <?php } else if($tr->status_sewa == 'active') {?>
                                <?= $tr->pengembalian == null ? 'Tanggal Belum Diatur' : '<a href="'.site_url('admin/mtransaction/cek_detail/' . $tr->id_sewa).'">Cek Item</a>'; ?>
                            <?php } ?>
                        </td>
                        <td><a href="<?= site_url('admin/mtransaction/detail_sewa/' . $tr->id_sewa) ?>"><i class="bx bx-show-alt me-1"></i></a> <?= $tr->status_sewa == 'active' ? '| <a href="'.site_url('admin/msewa/cancel/'. $tr->id_sewa).'" class="btn btn-danger">Cancel</a>' : ''; ?>
                        </td>
                    </tr>
                <?php } ?>
                    </tbody>
            </table>
    <?php } else { ?>
        <div align="center">
            <h1>No Data Entry</h1>
        </div>
    <?php } ?>
        <div class="mt-3">
          <?= $this->pagination->create_links(); ?>
        </div>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>




