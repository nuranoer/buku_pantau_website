
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
                <h4>Sign Up For Admin</h4>
                <h6 class="font-weight-light"><?=lang('Auth.register')?></h6>

                <?= view('Myth\Auth\Views\_message_block') ?>

                <form action="<?= url_to('register') ?>" method="post" class="pt-3">
                    <?= csrf_field() ?>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" 
                        placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg <?php if (session('errors.username')) : ?>is-invalname<?php endif ?>" name="username" 
                        placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg <?php if (session('errors.password')) : ?>is-invalname<?php endif ?>" name="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg <?php if (session('errors.pass_confirm')) : ?>is-invalname<?php endif ?>" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" ><?=lang('Auth.register')?></button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="/login" class="text-primary">Login</a>
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
