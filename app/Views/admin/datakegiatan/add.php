<?= $this->extend('template/app'); ?>

<?= $this->section('content'); ?>

<!-- partial -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Tambah Data Kegiatan </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Data</li>
                </ol>
              </nav>
            </div>
            <div class="row">                  
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form action="<?= base_url('kegiatan/save') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                      <div class="form-group">
                      <label for="id_jadwal">Hari</label>
                        <select class="form-control" name="id_jadwal">
                          <option value = "" disabled selected >Silahkan pilih</option>
                          <?php foreach($jadwal as $j): ?>
                            <option value="<?= $j['id_jadwal'] ?>"><?= $j['hari'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nama_kegiatan">Nama</label>
                        <input type="text" class="form-control" name="nama_kegiatan" value="<?= old('nama_kegiatan') ?>" placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="<?= old('tanggal') ?>" placeholder="Tanggal">
                      </div>
                      <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="time" class="form-control" name="waktu" value="<?= old('waktu') ?>" placeholder="Waktu">
                      </div>

                      <div class="form-group">
                        <label for="id_guru">Guru</label>
                        <select class="form-control" name="id_guru">
                          <option value = "" disabled selected >Silahkan pilih</option>
                          <?php foreach($guru as $g): ?>
                            <option value="<?= $g['id_guru'] ?>"><?= $g['nama_guru'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="foto" class="form-label">Foto Kegiatan</label>
                          <input class="form-control" name="foto" //accept=".jpg,.png,.jpeg" value="<?= old('foto') ?>" type="file" id="foto">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
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