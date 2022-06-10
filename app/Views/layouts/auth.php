<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KKIH | <?= $pages ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/vendors/feather/feather.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/ti-icons/css/themify-icons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/vertical-layout-light/style.css') ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/images/favicon-bh.png') ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-center py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="logo" width="50px">
              </div>
              <?php if($Login === TRUE): ?>
              <h4>Halo! mari kita mulai</h4>
              <h6 class="font-weight-light">Masuk untuk melanjutkan.</h6>
              <?php elseif($Login === FALSE): ?>
              <h4>Baru disini?</h4>
              <h6 class="font-weight-light">Mendaftar itu mudah. Hanya butuh beberapa langkah</h6>
              <?php endif ?>
                  <?php if (!empty(session()->getFlashdata('error'))) : ?>
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <?php echo session()->getFlashdata('error'); ?>
                      </div>
                  <?php endif; ?>
                  <?php if (!empty(session()->getFlashdata('success'))) : ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?php echo session()->getFlashdata('success'); ?>
                      </div>
                  <?php endif; ?>
              <?= $this->renderSection('content') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('assets/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('assets/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('assets/js/template.js') ?>"></script>
  <script src="<?= base_url('assets/js/settings.js') ?>"></script>
  <script src="<?= base_url('assets/js/todolist.js') ?>"></script>
</body>

</html>
