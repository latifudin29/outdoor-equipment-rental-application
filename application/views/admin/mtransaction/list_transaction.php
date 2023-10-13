<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Table -->
    
    <div class="card">
        <h5 class="card-header">Data Transaksi</h5>
        <form action="<?= site_url('admin/mtransaction/index'); ?>" method="post">
            <div class="input-group mb-3 ms-3 w-25">
                <input type="text" class="form-control" placeholder="Search ..." aria-label="" aria-describedby="button-addon2" name="keyword" autocomplete="off" autofocus>
                <input class="btn btn-primary" type="submit" id="button-addon2" name="search" value="Search">
            </div>
        </form>
        <div class="card-header"><?= $this->session->flashdata('msg'); ?></div>
            <div class="table-responsive text-nowrap">
                <?php if ($transaksi != null) { ?>
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>No</th>
                                <th>Name</th>
                                <th>ID Booking</th>
                                <th>ID Transaksi</th>
                                <th>Tgl. Transaksi</th>
                                <th>Total Pembayaran</th>
                                <th>Status Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                    foreach ($transaksi as $tr) { ?>
                        <tr>
                            <td><?= ++$start ?></td>
                            <td><?= $tr->fname_user == "" ? $tr->usrnm_user : $tr->fname_user?></td>
                            <td><?= $tr->id_sewa ?></td>
                            <td><?= $tr->id_transaksi ?></td>
                            <td><?= $tr->tgl_transaksi ?></td>
                            <td><?= $tr->total_pembayaran ?></td>
                            <td><?php if ($tr->status_bayar == 0) {echo 'Belum Bayar';} else if($tr->status_bayar == 1) {echo 'Lunas';} else if($tr->status_bayar == 2){echo 'Baru DP';} else if($tr->status_bayar == 3){echo 'Sedang Diproses';} else if($tr->status_bayar == 4){echo 'Cancel';} ?></td>
                            <td>
                                <?php if ($tr->bukti_pembayaran == null) { ?>
                                    Belum ada pembayaran
                                <?php } else { ?>
                                    <img src="<?= base_url(); ?>/assets/upload/bukti_pembayaran/<?= $tr->bukti_pembayaran; ?>" alt="" width="45px">
                                <?php } ?>
                            </td>
                            
                            <td><button type="button" class="btn btn-primary konfirmasi" data-id="<?= $tr->id_transaksi; ?>" data-status="<?= $tr->status_bayar; ?>">Set</button> | <a href="<?= site_url('admin/mtransaction/detail_transaksi/' . $tr->id_sewa) ?>"><i class="bx bx-show-alt me-1"></i></a>
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
            <!-- Modal by Boostrap -->
            <div class="modal fade" id="konfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Konfirmasi Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('admin/mtransaction/conf_bayar') ?>" method="post">
                        <div id="passdataconf"></div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>









