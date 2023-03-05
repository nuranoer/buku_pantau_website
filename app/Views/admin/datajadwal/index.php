<?= $this->extend('template/app'); ?>

<?= $this->section('content'); ?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Jadwal Kegiatan </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Jadwal Kegiatan</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="col mb-4">
                      <div class="float-right">
                      <a href="<?= base_url('/jadwal/new'); ?>" class="btn btn-outline-primary btn-icon-text btn-md">
                              <i class="mdi mdi-pencil btn-icon-append"></i> Add</a>
                      </div>
                    </div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Hari</center></th>
                          <th><center>Kegiatan</center></th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            if($jadwal) :
                                $no = 1;
                                foreach($jadwal as $j): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $j->hari ?></td>
                                        <td><?= $j->jenis_kegiatan ?></td>
                                        <td class = "d-flex justify-content-space-around ">
                                              <div class="col-3">
                                                <a href="#"
                                                    class="btn btn-outline-secondary btn-icon-text btn-sm">Detail<i class="mdi mdi-file-check btn-icon-append"></i></a>
                                                <a href="<?= base_url('/jadwal/edit/'.$j->id_jadwal) ?>"
                                                    class="btn btn-outline-warning btn-icon-text btn-sm">Edit<i class="mdi mdi-file-check btn-icon-append"></i></a>
                                                <a href="#"
                                                    data-href="<?= base_url('/jadwal/delete/'.$j->id_jadwal) ?>"
                                                    onclick="confirmToDelete(this)"
                                                    class="btn btn-outline-danger btn-icon-text btn-sm">Delete<i class="mdi mdi-delete btn-icon-append"></i></a>
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