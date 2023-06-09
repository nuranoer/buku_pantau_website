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
              <h3 class="page-title">Edit Data Guru </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Guru</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Data</li>
                </ol>
              </nav>
            </div>
            <div class="row">                  
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form action="<?= base_url('guru/update/'.$guru->id_guru. '') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                        <input type="hidden" name="id_guru" value="<?= $guru->id_guru ?>" />
                      <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" name="nip" value="<?= $guru->nip ?>" placeholder="NIP">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" value="<?= $guru->password ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="nama_guru">Nama</label>
                        <input type="text" class="form-control" name="nama_guru" value="<?= $guru->nama_guru ?>" placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label for="alamat_guru">Alamat</label>
                        <input type="text" class="form-control" name="alamat_guru" value="<?= $guru->alamat_guru ?>" placeholder="Alamat">
                      </div>
                      <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                          <option value = "" disabled selected >Silahkan pilih</option>
                          <option value = "Laki-Laki" <?= $guru->jenis_kelamin == 'Laki-Laki'? 'selected':'' ?>>Laki-Laki</option>
                          <option value = "Perempuan" <?= $guru->jenis_kelamin == 'Perempuan'? 'selected':'' ?>>Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" name="agama">
                          <option value = "" disabled selected >Silahkan pilih</option>
                          <option value = "Islam" <?= $guru->agama == 'Islam'? 'selected':''?>>Islam</option>
                          <option value = "Kristen" <?= $guru->agama == 'Kristen'? 'selected':'' ?>>Kristen</option>
                          <option value = "Katolik" <?= $guru->agama == 'Katolik'? 'selected':'' ?>>Katolik</option>
                          <option value = "Hindu" <?= $guru->agama == 'Hindu'? 'selected':'' ?>>Hindu</option>
                          <option value = "Budha" <?= $guru->agama == 'Budha'? 'selected':'' ?>>Budha</option>
                          <option value = "Konghucu" <?= $guru->agama == 'Konghucu'? 'selected':'' ?>>Konghucu</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" class="form-control" name="no_hp" value="<?= $guru->no_hp ?>" placeholder="No HP">
                      </div>
                      <div class="form-group">
                        <label for="status_perkawinan">Status</label>
                        <select class="form-control" name="status_perkawinan">
                          <option value = "" disabled selected >Silahkan pilih</option>
                          <option value = "Menikah" <?= $guru->status_perkawinan == 'Menikah'? 'selected':'' ?>>Menikah</option>
                          <option value = "Belum Menikah" <?= $guru->status_perkawinan == 'Belum Menikah'? 'selected':'' ?>>Belum Menikah</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="id_jadwal">Jadwal</label>
                        <select class="form-control" id="id_jadwal" name="id_jadwal">
                          <option value = "" disabled selected >Silahkan pilih</option>
                          <?php foreach($jadwal as $j): ?>
                            <option value="<?= $j['id_jadwal'] ?>"><?= $j['hari'] ?> </option>
                            <option value="<?= $j['id_jadwal'] ?>" <?= $guru->id_jadwal == $j['id_jadwal'] ? 'selected' : '' ?>><?= $j['hari'] ?></option>
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