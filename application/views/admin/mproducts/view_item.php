<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="<?= base_url(); ?>/assets/upload/<?= $item->img_item; ?>" alt="Card image cap" />
                    <div class="card-body">
                        <h5 class="card-title fs-3 fw-bold"><?= $item->nm_item; ?></h5>
                        <hr>
                        <p class="card-text">
                        <form>
                            <div class="mb-3">
                                <label class="form-label fs-5" for="basic-default-fullname">Brand</label>
                                <br>
                                <label class="form-label" for="basic-default-fullname"><?= $item->brand_item; ?></label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fs-5" for="basic-default-fullname">Category</label>
                                <br>
                                <label class="form-label" for="basic-default-fullname"><?= $item->cat_item; ?></label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fs-5" for="basic-default-fullname">Description</label>
                                <br>
                                <label class="form-label" for="basic-default-fullname"><?= $item->desc_item; ?></label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fs-5" for="basic-default-fullname">Price</label>
                                <br>
                                <label class="form-label" for="basic-default-fullname">Rp. <?= number_format($item->prc_item); ?>,-</label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fs-5" for="basic-default-fullname">Stock</label>
                                <br>
                                <label class="form-label" for="basic-default-fullname"><?= $item->stk_item; ?></label>
                            </div>
                        </form>
                        </p>
                        <hr>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a href="<?= site_url('admin/mitem') ?>" class="btn btn-outline-primary btn-center">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
