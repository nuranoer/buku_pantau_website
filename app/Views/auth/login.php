
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url('assets') ?>/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?= base_url('assets') ?>/images/logo.svg">
                </div>
                <h6 class="font-weight-light"><?=lang('Auth.loginTitle')?></h6>

                <?= view('Myth\Auth\Views\_message_block') ?>

                <form class="pt-3" action="<?= url_to('login') ?>" method="post">
                  <?= csrf_field() ?>
                  <?php if ($config->validFields === ['email']): ?>

                    <div class="form-group">
                      <input type="email" class="form-control form-control-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.email')?>">
                        <div class="invalid-feedback">
                          <?= session('errors.login') ?>
                        </div>

                    </div>
                  <?php else: ?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                        <div class="invalid-feedback">
                          <?= session('errors.login') ?>
                        </div>

                    </div>

                  <?php endif; ?>

                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?=lang('Auth.password')?>">
                      <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                      </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                  </div>


                  <?php if ($config->allowRemembering): ?>

                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>> Keep me signed in </label>
                    </div>
                    <?php endif; ?>
                    <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="/register" class="text-primary">Create</a>

                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('assets') ?>/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('assets') ?>/js/off-canvas.js"></script>
    <script src="<?= base_url('assets') ?>/js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets') ?>/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>
