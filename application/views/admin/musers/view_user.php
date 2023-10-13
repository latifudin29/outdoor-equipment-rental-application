<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <table>
                                    <!-- <tr>
                                        <td>Name </td>
                                        <td>: <?= $user->fname_user; ?></td>
                                    </tr> -->
                                    <tr>
                                        <td>Username </td>
                                        <td>: <?= $user->usrnm_user; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email </td>
                                        <td>: <?= $user->email_user; ?></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Gender </td>
                                        <td>: <?= $user->gnd_user; ?></td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Place of Birth </td>
                                        <td>: <?= $user->tmplh_user; ?></td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Date of Birth </td>
                                        <td>: <?= $user->tgl_user; ?></td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Address </td>
                                        <td>: <?= $user->addr_user; ?></td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>No. Phone 1 </td>
                                        <td>: <?= $user->nohp1_user; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Phone 2 </td>
                                        <td>: <?= $user->nohp2_user; ?></td>
                                    </tr> -->
                                    <tr>
                                        <td>Status </td>
                                        <td>: <?= $user->status == 1 ? 'Activated' : 'Blocked'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Validation </td>
                                        <td>: <?= $user->valid_user == 1 ? 'Verified' : 'Not Verified'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="<?= site_url('admin/muser') ?>">Back</a>
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>