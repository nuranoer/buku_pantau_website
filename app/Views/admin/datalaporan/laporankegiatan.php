<?= $this->extend('template/app'); ?>

<?= $this->section('content'); ?>

<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="col mb-4">
                    <table id="example1" class="table table-bordered">
                      <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Hari</center></th>
                          <th><center>Tanggal</center></th>
                          <th><center>Waktu</center></th>
                          <th><center>Nama</center></th>
                          <th><center>Guru</center></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            if($laporan) :
                                $no = 1;
                                foreach($laporan as $l): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $l['hari'] ?></td>
                                        <td><?= $l['tanggal']?></td>
                                        <td><?= $l['waktu']?></td>
                                        <td><?= $l['nama_kegiatan'] ?></td>
                                        <td><?= $l['nama_guru'] ?></td>
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


<?= $this->endSection() ?>