<?= $this->extend('template/app'); ?>

<?= $this->section('content'); ?>

<!-- partial -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Detail Absensi </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Absensi</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
              </nav>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th><center> No.</center></th>
                          <th><center>Nama Siswa</center></th>
                          <th><center>Tanggal</center></th>
                          <th><center>Keterangan</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            if($detail) :
                                $no = 1;
                                foreach($detail as $d): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $d['nama_siswa'] ?></td>
                                        <td><?= $d['tanggal'] ?></td>
                                        <td>
                                            <?php if ($d['kehadiran'] == 1): ?>
                                                Hadir
                                            <?php else: ?>
                                                Tidak Hadir
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                      </tbody>
                        <?php else : ?>
                        <?php endif; ?>
                    </table>

                        </div>
                        <a href="<?= base_url('/absensi') ?>"
                                class="btn mb-2 btn-outline-warning mr-1">Kembali</a>

                    </div>
                </div>
            </div>

          </div>

<?= $this->endSection(); ?>