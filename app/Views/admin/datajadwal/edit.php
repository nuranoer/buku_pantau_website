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
              <h3 class="page-title">Edit Data Jadwal </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Jadwal</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Data</li>
                </ol>
              </nav>
            </div>
            <div class="row">                  
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form action="<?= base_url('jadwal/save') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                        <label for="hari">Hari</label>
                        <select class="form-control" name="hari">
                          <option value = "" disabled selected >Silahkan pilih</option>
                          <option value = "Senin" <?= $jadwal->hari == 'Senin'? 'selected':''?>>Senin</option>
                          <option value = "Selasa" <?= $jadwal->hari == 'Selasa'? 'selected':''?>>Selasa</option>
                          <option value = "Rabu" <?= $jadwal->hari == 'Rabu'? 'selected':''?>>Rabu</option>
                          <option value = "Kamis" <?= $jadwal->hari == 'Kamis'? 'selected':''?>>Kamis</option>
                          <option value = "Jumat" <?= $jadwal->hari == 'Jumat'? 'selected':''?>>Jum'at</option>
                          <option value = "Sabtu" <?= $jadwal->hari == 'Sabtu'? 'selected':''?>>Sabtu</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="id_kegiatan">Kegiatan</label>
                        <select class="form-control" name="id_kegiatan">
                          <option value = "" disabled selected >Silahkan pilih</option>
                          <option value = "Akademik" <?= $jadwal->jenis_kegiatan == 'Akademik'? 'selected':''?>>Akademik</option>
                          <option value = "Non-Akademik" <?= $jadwal->jenis_kegiatan == 'Non-Akademik'? 'selected':''?>>Non-Akademik</option>
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