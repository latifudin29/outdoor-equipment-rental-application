<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Data User</h5>
        <form action="<?= site_url('admin/muser/index'); ?>" method="post">
            <div class="input-group mb-3 ms-3 w-25">
                <input type="text" class="form-control" placeholder="Search ..." aria-label="" aria-describedby="button-addon2" name="keyword" autocomplete="off" autofocus>
                <input class="btn btn-primary" type="submit" id="button-addon2" name="search" value="Search">
            </div>
        </form>

        <div class="table-responsive text-nowrap">
            <?php if ($users != null) { ?>
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Validation</th>
                            <th colspan="6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                foreach ($users as $usr) { ?>
                    <tr>
                        <td><?= ++$start ?></td>
                        <td><?= $usr->usrnm_user ?></td>
                        <td><?= $usr->email_user ?></td>
                        <td><?= $usr->status == 1 ? 'Active' : 'Blocked'; ?></td>
                        <td><?= $usr->valid_user == 1 ? 'Valid' : 'Not Verified' ?></td>
                        
                        <td>
                            <?php if ($usr->status == '1') { ?>
                                <a href="<?= site_url('admin/muser/block/' . $usr->id_user); ?>">Block</a>
                                <?php } else { ?>
                                    <a href="<?= site_url('admin/muser/unblock/' . $usr->id_user); ?>">Unblock</a>
                                    <?php } ?>
                        </td>
                        <td>
                                    <?php if ($usr->valid_user == '1') { ?>
                                        <a href="<?= site_url('admin/muser/unvalidation/' . $usr->id_user); ?>">Unvalidation</a>
                                        <?php } else { ?>
                                            <a href="<?= site_url('admin/muser/validation/' . $usr->id_user); ?>"> Validation</a>
                                            <?php } ?>
                        </td>
                        <td><a href="<?= site_url('admin/muser/custSendmail/' . $usr->id_user) ?>"><i class="bx bx-mail-send me-1"></i></a></td>
                        <td><a href="<?= site_url('admin/muser/viewUser/' . $usr->id_user) ?>"><i class="bx bx-show-alt me-1"></i></a></td>
                        <td><a href="<?= site_url('admin/muser/delUser/' . $usr->id_user) ?>" onclick="return confirm('Are You Sure?')"><i class="bx bx-trash me-1"></i></a></td>
                    </tr>
                <?php } ?>
                    </tbody>
            </table>
    <?php } else { ?>
        <div class=" alert alert-danger m-3" role="alert">
            No Data Entry
        </div>
    <?php } ?>
        <div class="mt-3">
            <?= $this->pagination->create_links(); ?>
        </div>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>






