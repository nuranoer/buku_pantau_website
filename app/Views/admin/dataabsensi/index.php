<?= $this->extend('template/app'); ?>

<?= $this->section('content'); ?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Data Absensi Siswa </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Absensi</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                
                <div class="card">
                  <div class="card-body">
                    <!-- <p class="card-description"> Add class <code>.table-bordered</code>
                    </p> -->
                    

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th><center> No.</center></th>
                          <th><center>Nama Siswa</center></th>
                          <th><center>Rekapitulasi Absen</center></th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            if($rekapitulasi) :
                                $no = 1;
                                foreach($rekapitulasi as $r): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $r['nama_siswa'] ?></td>
                                        <td><?= $r['jumlah_kehadiran'] ?></td>
                                        <td class = "d-flex justify-content  ">
                                              <div class="col-3 float-center">
                                              <a href="<?= base_url('/absensi/lihat/'. $r['id_siswa']) ?>"
                                                    class="btn btn-outline-secondary btn-icon-text btn-sm">Detail<i class="mdi mdi-file-check btn-icon-append"></i></a>
                                              </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                      </tbody>
                        <?php else : ?>
                        <?php endif; ?>
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
                          <a href="/guru" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
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