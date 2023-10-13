<div class="container-xxl flex-grow-1 container-p-y">
    <div style="margin-top: none; margin-bottom: 10px;">
        <a href="<?= site_url('admin/mitem/addItem'); ?>"><button type="button" class="btn btn-success">Tambah Data Produk</button> </a>
    </div>
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Data Produk</h5>
        <form action="<?= site_url('admin/mitem/index'); ?>" method="post">
            <div class="input-group mb-3 ms-3 w-25">
                <input type="text" class="form-control" placeholder="Search ..." aria-label="" aria-describedby="button-addon2" name="keyword" autocomplete="off" autofocus>
                <input class="btn btn-primary" type="submit" id="button-addon2" name="search" value="Search">
            </div>
        </form>
        <h5 class="card-header"><?= $this->session->flashdata('msg'); ?></h5>

        <div class="table-responsive text-nowrap">
            <?php if ($items != null) { ?>
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>No.</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th colspan="4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $it) : ?>

                            <tr>
                                <td><?= ++$start; ?></td>
                                <td><?= $it->nm_item; ?></td>
                                <td><?= $it->brand_item; ?></td>
                                <td><?= $it->cat_item; ?></td>
                                <td><?= $it->prc_item; ?></td>
                                <td><?= $it->stk_item; ?></td>
                                <td>
                                    <a href="<?= site_url('admin/mitem/viewItem/' . $it->id_item) ?>"><i class="bx bx-show-alt me-1"></i></a>
                                </td>
                                <td>
                                    <a href="<?= site_url('admin/mitem/editItem/' . $it->id_item) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                                </td>
                                <td>
                                    <a href="<?= site_url('admin/mitem/addphoto/' . $it->id_item); ?>"><i class="bx bx-image-add me-1"></i></a>
                                </td>
                                <td>
                                    <a href="<?= site_url('admin/mitem/delItem/' . $it->id_item); ?>"><i class="bx bx-trash me-1"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="addphoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Photo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form -->
<form method="POST" enctype="multipart/form-data" action="">
  <div class="mb-3">
    <label for="gambar" class="form-label">Upload Gambar</label>
    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div class="form-text">Upload file .jpg/.png</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        <!-- Form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>