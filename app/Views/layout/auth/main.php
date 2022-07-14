<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?> | LEON.ID</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/fontawesome/css/all.min.css'); ?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/bootstrap-social/bootstrap-social.css'); ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/css/components.css'); ?>">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url('back-end/dist/assets/img/stisla-fill.svg'); ?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <?= $this->renderSection('content') ?>
            
            <div class="simple-footer">
              Copyright &copy; LEON.ID 2022
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('back-end/dist/assets/modules/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/popper.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/tooltip.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/nicescroll/jquery.nicescroll.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/moment.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/js/stisla.js'); ?>"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?= base_url('back-end/dist/assets/js/scripts.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/js/custom.js'); ?>"></script>
</body>
</html>