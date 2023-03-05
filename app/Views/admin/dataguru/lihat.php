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
                                        <th>NIP</th>
                                        <td><?= $detail[0]['nip'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $detail[0]['nama_guru'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?= $detail[0]['alamat_guru'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td><?= $detail[0]['jenis_kelamin'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Agama</th>
                                        <td><?= $detail[0]['agama'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>No HP</th>
                                        <td><?= $detail[0]['no_hp'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><?= $detail[0]['status_perkawinan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jadwal Mengajar</th>
                                        <td><?= $detail[0]['hari'] ?></td>
                                    </tr>


                                    
                                </table>
                                


                            </div>

                        </div>
                        <a href="<?= base_url('/guru') ?>"
                                class="btn mb-2 btn-outline-warning mr-1">Kembali</a>

                    </div>
                </div>
            </div>

          </div>

<?= $this->endSection(); ?>