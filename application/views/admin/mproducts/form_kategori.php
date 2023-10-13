<?php
$nm_kat = '';
if (isset($kategori)) {
    $nm_kat = $kategori->nm_kat;
}
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Input Kategori</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="nm_kat" value="<?= set_value('nm_kat', $nm_kat); ?>" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" name="submit" value="Save">
                                <a href="<?= site_url('admin/kategori'); ?>"><input type="button" class="btn btn-danger" value="Back"></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>