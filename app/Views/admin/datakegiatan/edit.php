<?= $this->extend('template/app'); ?>

<?= $this->section('content'); ?>

<!-- partial -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Edit Data Kegiatan </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Data</li>
                </ol>
              </nav>
            </div>
            <div class="row">                  
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form action="<?= base_url('kegiatan/update/'.$kegiatan->id_kegiatan. '') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_kegiatan" value="<?= $kegiatan->id_kegiatan ?>" />

                      <div class="form-group">
                        <label for="jenis_kegiatan">Jenis Kegiatan</label>
                        <select class="form-control" name="jenis_kegiatan">
                          <option value = "" disabled selected >Silahkan pilih</option>
                          <option value = "Akademik" <?= $kegiatan->jenis_kegiatan == 'Akademik'? 'selected':'' ?>>Akademik</option>
                          <option value = "Non-Akademik" <?= $kegiatan->jenis_kegiatan == 'Non-Akademik'? 'selected':'' ?>>Non-Akademik</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nama_kegiatan">Nama</label>
                        <input type="text" class="form-control" name="nama_kegiatan" value="<?= $kegiatan->nama_kegiatan ?>" placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="<?= $kegiatan->tanggal ?>" placeholder="Tanggal">
                      </div>
                      <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="time" class="form-control" name="waktu" value="<?= $kegiatan->waktu ?>" placeholder="Waktu">
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
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

<?= $this->endSection(); ?>