<?= $this->extend('template/app'); ?>

<?= $this->section('content'); ?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Laporan Kegiatan </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Export</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Kegiatan</li>
                </ol>
              </nav>
            </div>
            <div class="row">                  
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form method="post" action="<?= site_url('/laporan/export') ?>">
                        <div class="form-group">
                            <label for="dari">Dari Tanggal</label>
                            <input type="date" class="form-control" id="dari" name="dari" required>
                        </div>
                        <div class="form-group">
                            <label for="sampai">Sampai Tanggal</label>
                            <input type="date" class="form-control" id="sampai" name="sampai" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Export Laporan</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>


<?= $this->endSection(); ?>
<?= $this->section('js') ?>


<?= $this->endSection() ?>