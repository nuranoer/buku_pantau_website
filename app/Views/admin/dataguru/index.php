<?= $this->extend('template/app'); ?>

<?= $this->section('content'); ?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Data Guru </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                
                <div class="card">
                  <div class="card-body">
                    <div class="col mb-4">
                      <div class="float-right">
                              <a href="<?= base_url('/guru/new'); ?>" class="btn btn-outline-primary btn-icon-text btn-md">
                              <i class="mdi mdi-pencil btn-icon-append"></i> Add</a>
                      </div>
                    </div>
                    <!-- <p class="card-description"> Add class <code>.table-bordered</code>
                    </p> -->
                    

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th><center> No.</center></th>
                          <th><center>NIP</center></th>
                          <th><center>Nama</center></th>
                          <th><center>Alamat</center></th>
                          <th><center>No.Hp</center></th>
                          <th><center>Jadwal Mengajar</center></th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            if($guru) :
                                $no = 1;
                                foreach($guru as $g): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $g->nip ?></td>
                                        <td><?= $g->nama_guru ?></td>
                                        <td><?= $g->alamat_guru ?></td>
                                        <td><?= $g->no_hp ?></td>
                                        <td><?= $g->hari ?></td>
                                        <td class = "d-flex justify-content  ">
                                              <div class="col-3 float-center">
                                                <a href="<?= base_url('/guru/lihat/'.$g->id_guru) ?>"
                                                    class="btn btn-outline-secondary btn-icon-text btn-sm">Detail<i class="mdi mdi-file-check btn-icon-append"></i></a>
                                                <a href="<?= base_url('/guru/edit/'.$g->id_guru) ?>"
                                                    class="btn btn-outline-warning btn-icon-text btn-sm">Edit<i class="mdi mdi-file-check btn-icon-append"></i></a>
                                                <a href="#"
                                                    data-href="<?= base_url('/guru/delete/'.$g->id_guru) ?>"
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