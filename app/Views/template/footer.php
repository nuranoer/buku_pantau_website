          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Fitri Zuyina Nur Azizah 2023</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('assets') ?>/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url('assets') ?>/vendors/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('assets') ?>/js/off-canvas.js"></script>
    <script src="<?= base_url('assets') ?>/js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets') ?>/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url('assets') ?>/js/dashboard.js"></script>
    <script src="<?= base_url('assets') ?>/js/todolist.js"></script>
    <script src="<?= base_url('assets') ?>/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/pages/sweetalert2.js"></script>


    <!-- End custom js for this page -->
    <?= $this->renderSection('js') ?>
  </body>
</html>