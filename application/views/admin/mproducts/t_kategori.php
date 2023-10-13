<div class="container-xxl flex-grow-1 container-p-y">
    <div style="margin-top: none; margin-bottom: 10px;">
        <a href="<?= site_url('admin/kategori/addKat'); ?>"><button type="button" class="btn btn-success">Tambah Data </button> </a>
    </div>
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Data Kategori</h5>
        <form action="<?= site_url('admin/kategori/index'); ?>" method="post">
            <div class="input-group mb-3 ms-3 w-25">
                <input type="text" class="form-control" placeholder="Search ..." aria-label="" aria-describedby="button-addon2" name="keyword" autocomplete="off" autofocus>
                <input class="btn btn-primary" type="submit" id="button-addon2" name="search" value="Search">
            </div>
        </form>
        <h5><?= $this->session->flashdata('msg'); ?></h5>
        <div class="table-responsive text-nowrap">
            <?php if ($kategori != null) { ?>
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>No.</th>
                            <th>Nama Kategori</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kategori as $kat) : ?>

                            <tr>
                                <td><?= ++$start; ?></td>
                                <td><?= $kat->nm_kat; ?></td>
                                <td>
                                    <a href="<?= site_url('admin/kategori/editKategori/' . $kat->id_kat) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                                </td>
                                <td>
                                    <a href="<?= site_url('admin/mitem/delKategori/' . $kat->id_kat); ?>"><i class="bx bx-trash me-1"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
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