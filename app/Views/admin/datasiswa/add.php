<?= $this->extend('template/app'); ?>

<?= $this->section('content'); ?>

<!-- partial -->
<div class="main-panel">
          <!-- flash data -->
          <?php if(session()->getFlashdata('success')) : ?>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> 
                    <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php elseif(session()->getFlashdata('error')): ?>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-file-excel"></i>
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- end flash data -->

          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Tambah Data Siswa </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Siswa</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Data</li>
                </ol>
              </nav>
            </div>
            <div class="row">                  
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form action="<?= base_url('siswa/save') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                      <div class="form-group">
                        <label for="nomor_induk">NIS</label>
                        <input type="text" class="form-control" name="nomor_induk" value="<?= old('nomor_induk') ?>" placeholder="NIS">
                      </div>
                      <div class="form-group">
                        <label for="nama_siswa">Nama</label>
                        <input type="text" class="form-control" name="nama_siswa" value="<?= old('nama_siswa') ?>" placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label for="alamat_siswa">Alamat</label>
                        <input type="text" class="form-control" name="alamat_siswa" value="<?= old('alamat_siswa') ?>" placeholder="Alamat">
                      </div>
                      <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?= old('tempat_lahir') ?>" placeholder="Tempat Lahir">
                      </div>
                      <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= old('tanggal_lahir') ?>" placeholder="Tanggal">
                      </div>
                      <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                          <option value = "" disabled selected >Silahkan pilih</option>
                          <option value = "Laki-Laki" <?= old('jenis_kelamin') == 'Laki-Laki'? 'selected':'' ?>>Laki-Laki</option>
                          <option value = "Perempuan" <?= old('jenis_kelamin') == 'Perempuan'? 'selected':'' ?>>Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="id_wali">Wali</label>
                        <select class="form-control" name="id_wali">
                          <option value = "" disabled selected >Silahkan pilih</option>
                          <?php foreach($wali as $w): ?>
                            <option value="<?= $w['id_wali'] ?>"><?= $w['nama_wali'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

<?= $this->endSection(); ?>