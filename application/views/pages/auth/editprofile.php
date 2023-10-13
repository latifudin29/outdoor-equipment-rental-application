<section class="about">
    <?php if(isset($passdata)){
        $nama = $passdata->fname_user;
        $nik = $passdata->nik_user;
        $alamat = $passdata->addr_user;
        $jeniskelamin = $passdata->gnd_user;
        $tempatlahir = $passdata->tmplh_user;
        $tanggallahir = $passdata->tgl_user;
        $nohp1 = $passdata->nohp1_user;
        $nohp2 = $passdata->nohp2_user;
        $ktp = $passdata->img_ktp;
        $kk = $passdata->img_user;
    } ?>
    <div class="text-center mb-5">
        <h1>Edit Profil</h1>
    </div>
        <form class="row g-3" action="<?= site_url('auth/editProfil'); ?>" method="POST">
            <div class="col-md-3">
                <label for="" class="form-label">Nama</label>
                <input type="hidden" name="id_user" value="<?= $this->session->userdata('userid'); ?>">
                <input type="text" name="fname_user" class="form-control form-control-lg" id="" value="<?= set_value('fname_user', $nama); ?>">
            </div>
            <div class="col-md-3">
                <label for="" class="form-label">NIK</label>
                <input type="text" name="nik_user" class="form-control form-control-lg" id="" value="<?= set_value('nik_user', $nik); ?>">
            </div>
            <div class="col-6">
                <label for="" class="form-label">Alamat</label>
                <input type="text" class="form-control form-control-lg" name="addr_user" id="" value="<?= set_value('addr_user', $alamat); ?>">
            </div>
            <div class="col-md-3">
                <label for="inputState" class="form-label">Jenis Kelamin</label>
                <select id="inputState" class="form-select form-select-lg" name="gnd_user">
                <option>Choose...</option>
                <option value="Laki-laki" <?= $jeniskelamin == 'Laki-laki' ? 'selected = "selected"' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?= $jeniskelamin == 'Perempuan' ? 'selected = "selected"' : ''; ?>>Perempuan</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="inputCity" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control form-control-lg" id="inputCity" name="tmplh_user" value="<?= set_value('tmplh_user', $tempatlahir); ?>">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control form-control-lg" id="" name="tgl_user" value="<?= set_value('tgl_user', $tanggallahir); ?>">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">No.HP/WA 1</label>
                <input type="text" class="form-control form-control-lg" id="" name="nohp1_user" placeholder="08xxxxxxxxx" value="<?= set_value('nohp1_user', $nohp1); ?>">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">No.HP/WA 2</label>
                <input type="text" class="form-control form-control-lg" id="" placeholder="08xxxxxxxxx" name="nohp2_user" value="<?= set_value('nohp2_user', $nohp2); ?>">
            </div>
            <div class="col-12 text-start">
                <a href="<?= site_url('page'); ?>" class="btn-default" style="text-decoration: none;">Back</a>
                <button type="submit" class="btn-default">Edit Profil</button>
            </div>
        </form>
 
</section>