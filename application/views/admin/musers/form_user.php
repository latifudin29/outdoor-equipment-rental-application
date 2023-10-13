<?php
$fullname = '';
$username = '';
$password = '';
$nik = '';
$gender = '';
$address = '';
$pob = '';
$dob = '';
$nohp1 = '';
$nohp2 = '';
$email = '';
if (isset($user)) {
    $fullname = $user->fname_user;
    $username = $user->usrnm_user;
    $password = $user->pw_user;
    $nik = $user->nik_user;
    $gender = $user->gnd_user;
    $address = $user->addr_user;
    $pob = $user->tmplh_user;
    $dob = $user->tgl_user;
    $nohp1 = $user->nohp1_user;
    $nohp2 = $user->nohp2_user;
    $email = $user->email_user;
}

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Input User</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Fullname</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="fname_user" value="<?= set_value('fname_user', $fullname) ?>" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="usrnm_user" value="<?= set_value('usrnm_user', $username) ?>" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="basic-default-name" name="pw_user" value="<?= set_value('pw_user', $password) ?>" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">NIK KTP/Student Card</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="nik_user" value="<?= set_value('nik_user', $nik) ?>" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Gender</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="gnd_user" value="Laki-Laki" <?= set_radio('gnd_user', 'Laki-Laki', $gender == 'Laki-Laki' ? TRUE : FALSE) ?> id="inlineRadio1" value="option1" />
                                    <label class="form-check-label" for="inlineRadio1">Man</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gnd_user" value="Perempuan" <?= set_radio('gnd_user', 'Perempuan', $gender == 'Perempuan' ? TRUE : FALSE) ?>id="inlineRadio2" value="option2" />
                                    <label class="form-check-label" for="inlineRadio2">Woman</label>
                                </div>
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="addr_user" value="<?= set_value('addr_user', $address) ?>" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Place Of Birthday</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="tmplh_user" value="<?= set_value('tmplh_user', $pob) ?>" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Date Of Birthday</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="basic-default-name" name="tgl_user" value="<?= set_value('tgl_user', $dob) ?>" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">No. HP 1</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-name" name="nohp1_user" value="<?= set_value('nohp1_user', $nohp1) ?>" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">No. HP 2</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-name" name="nohp2_user" value="<?= set_value('nohp2_user', $nohp2) ?>" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="email_user" value="<?= set_value('email_user', $email) ?>" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" name="submit" value="Save">
                                <a href="<?= site_url('admin/muser') ?>"><input type="button" class="btn btn-danger" value="Back"></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>