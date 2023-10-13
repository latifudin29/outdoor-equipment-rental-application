<?php
$nm_item = '';
$brand_item = '';
$cat_item = '';
$desc_item = '';
$prc_item = '';
$stk_item = '';
if (isset($item)) {
    $nm_item = $item->nm_item;
    $brand_item = $item->brand_item;
    $cat_item = $item->cat_item;
    $desc_item = $item->desc_item;
    $prc_item = $item->prc_item;
    $stk_item = $item->stk_item;
}
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Input Produk</h4>
    <h4><?= $this->session->flashdata('msg'); ?></h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="nm_item" value="<?= set_value('nm_item', $nm_item); ?>" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Brand</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="brand_item" value="<?= set_value('brand_item', $brand_item); ?>" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="cat_item">
                                    <option value="">Select Kategori</option>
                                    <?php foreach($kategori as $kat) : ?>
                                        <option value="<?= $kat->nm_kat ?>" <?= set_select('cat_item', $kat->nm_kat, $cat_item == $kat->nm_kat ? TRUE : FALSE) ?>><?= $kat->nm_kat ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="desc_item"><?= set_value('desc_item', $desc_item); ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Stok Tersedia</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-company" name="stk_item" value="<?= set_value('stk_item', $stk_item); ?>" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Harga</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" class="form-control" name="prc_item" value="<?= set_value('prc_item', $prc_item); ?>" />
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" />
                            </div>
                        </div> -->
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" name="submit" value="Save">
                                <a href="<?= site_url('admin/mitem'); ?>"><input type="button" class="btn btn-danger" value="Back"></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>