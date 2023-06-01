<?= $this->extend('template/app'); ?>

<?= $this->section('content'); ?>

<!-- partial -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Detail Data Guru </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Guru</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
              </nav>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Hari</th>
                                        <td><?= $detail[0]['hari'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Kegiatan</th>
                                        <td><?= $detail[0]['nama_kegiatan'] ?></td>
                                    </tr>

                                    <tr>
                                        <th>Tanggal</th>
                                        <td><?= $detail[0]['tanggal'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu</th>
                                        <td><?= $detail[0]['waktu'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Guru</th>
                                        <td><?= $detail[0]['nama_guru'] ?></td>
                                    </tr>                                    
                                </table>
                                


                            </div>
                        </div>
                        <a href="<?= base_url('/kegiatan') ?>"
                                class="btn mb-2 btn-outline-warning mr-1">Kembali</a>

                    </div>
                </div>
            </div>

          </div>

<?= $this->endSection(); ?>