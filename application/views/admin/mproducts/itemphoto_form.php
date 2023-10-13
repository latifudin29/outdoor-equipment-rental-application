<?php
if (isset($item)) {
    $id = $item->id_item;
    $nm_item = $item->nm_item;
    $brand_item = $item->brand_item;
    $cat_item = $item->cat_item;
    $desc_item = $item->desc_item;
    $prc_item = $item->prc_item;
    $stk_item = $item->stk_item;
    $photo_item = $item->img_item;
}
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Input Produk</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row-lg mb-3 align-middle">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"></label>
                            <img src="<?= base_url(); ?>/assets/upload/<?= $photo_item; ?>" alt="" width="300px">
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="img_item"/>
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" />
                            </div>
                        </div> -->
                        <div class="row justify-content-end">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary" name="submit" value="Upload">
                                <a href="<?= site_url('admin/mitem'); ?>"><input type="button" class="btn btn-danger" value="Back"></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>