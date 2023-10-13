<!-- Content wrapper -->
<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang <?= $this->session->userdata('username'); ?></h5>
                                <p class="mb-4">
                                    Kamu berhasil login sebagai admin dari website JajakaOutdoor Rent
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?= base_url(); ?>assets/admin/assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
              <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="<?= base_url(); ?>/assets/upload/avatar/defaultav.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                        </div>
                      <span class="fw-semibold d-block mb-2">User Tervalidasi</span>
                      <h3 class="card-title mb-2 text-primary"><?= $user_valid; ?> Orang</h3>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img
                            src="<?= base_url(); ?>/assets/upload/avatar/defaultav.png"
                            alt="Credit Card"
                            class="rounded"
                          />
                        </div>
                      </div>
                      <span class="fw-semibold d-block mb-2">User Terdaftar</span>
                      <h3 class="card-title text-nowrap mb-1 text-primary"><?= $user_total; ?> Orang</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        
    </div>
    <!-- / Content -->
</div>