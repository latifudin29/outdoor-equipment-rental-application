<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Kirim Pesan Lewat Email</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">To</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="address" value="<?= $user->email_user; ?>" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Subject Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="subject" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Message</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="content"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" name="submit" value="Send">
                                <a href="<?= site_url('admin/muser') ?>"><input type="button" class="btn btn-danger" value="Back"></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>