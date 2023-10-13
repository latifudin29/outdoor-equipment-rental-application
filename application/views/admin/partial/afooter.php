<!-- Footer -->

<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      ©
      <script>
        document.write(new Date().getFullYear());
      </script>
      , made with by
      <a href="#" target="_blank" class="footer-link fw-bolder">Mahasiswa UNLA</a>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>


<!-- Core JS -->
<script src="<?= base_url('/assets/admin/assets/vendor/libs/jquery/jquery.js') ?>"></script>
<script src="<?= base_url('/assets/admin/assets/vendor/libs/popper/popper.js') ?>"></script>
<script src="<?= base_url('/assets/admin/assets/vendor/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('/assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>

<script src="<?= base_url('/assets/admin/assets/vendor/js/menu.js') ?>"></script>
<script>
      $(document).ready(function(){
        $('.konfirmasi').click(function(){
          var id_transaksi = $(this).data("id");
          var statbyr = $(this).data("status");
          $.ajax({
            url : "<?php echo base_url();?>admin/mtransaction/confirm_byr/",
            method : "POST",
            data : {id_transaksi: id_transaksi, statbyr: statbyr},
            success : function(data){
              $('#passdataconf').html(data);
              $('#konfirmasi').modal('show');
            }
          });
        });
      });
</script>


<!-- Vendors JS -->
<script src="<?= base_url('/assets/admin/assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>

<!-- Main JS -->
<script src="<?= base_url('/assets/admin/assets/js/main.js') ?>"></script>

<!-- Page JS -->
<script src="<?= base_url('/assets/admin/assets/js/dashboards-analytics.js') ?>"></script>


<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>