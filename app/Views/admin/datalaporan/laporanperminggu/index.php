<?= $this->extend('template/app'); ?>

<?= $this->section('content'); ?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Data Laporan Per Minggu </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Per Minggu</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="col mb-4">
                  <form action="<?= base_url('kegiatan/filterDatabyTanggal') ?>" method="get">
                    <div class="form-group">
                        <label for="tanggal_awal">Tanggal Awal:</label>
                        <input type="date" class="form-control" name="tanggal_awal" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Akhir:</label>
                        <input type="date" class="form-control" name="tanggal_akhir" required>
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari:</label>
                        <input type="text" class="form-control" name="hari">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Hari</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kegiatans as $index => $data) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $data['nama_kegiatan'] ?></td>
                                <td><?= $data['tanggal'] ?></td>
                                <td><?= $data['hari'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-body">
                          <h2 class="h2">Are you sure?</h2>
                          <p>The data will be deleted and lost forever</p>
                      </div>
                      <div class="modal-footer">
                          <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      </div>
                  </div>
              </div>
          </div>


<?= $this->endSection(); ?>

<?= $this->section('js') ?>
<script>
    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog").modal('show');
    }

    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection() ?>