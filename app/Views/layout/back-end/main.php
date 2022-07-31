<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <?php 
    $db = db_connect();
    $query = $db->table('store')->getWhere([])->getRow(); 
  ?>
  <title><?= $title; ?> | <?= $query->name; ?></title>

  <!-- Favicons -->
  <link href="<?= '/img/logo/' . $query->image; ?>" rel="icon">
  <link href="<?= '/img/logo/' . $query->image; ?>" rel="apple-touch-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/fontawesome/css/all.min.css'); ?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/datatables/datatables.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/prism/prism.css'); ?>">

  <?= $this->renderSection('css') ?>

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
<!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep">
              <i class="far fa-envelope"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="<?= base_url('back-end/dist/assets/img/avatar/avatar-1.png'); ?>" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="<?= base_url('back-end/dist/assets/img/avatar/avatar-2.png'); ?>" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="<?= base_url('back-end/dist/assets/img/avatar/avatar-3.png'); ?>" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="<?= base_url('back-end/dist/assets/img/avatar/avatar-4.png'); ?>" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="<?= base_url('back-end/dist/assets/img/avatar/avatar-5.png'); ?>" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <?php
              $id = session('id');
              $db = db_connect();
              $user = $db->table('user')->getWhere(['id' => $id])->getRow();
            ?>
            <img alt="image" src="/img/avatar/<?= $user->image; ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $user->username; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="profil" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
              </a>
              <a href="ubah-kata-sandi" class="dropdown-item has-icon">
                <i class="fas fa-key"></i> Ubah Kata Sandi
              </a>
              <a href="pengaturan" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Pengaturan
              </a>
              <div class="dropdown-divider"></div>
              <a href="keluar" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <!-- Sidebar -->
      <?= $this->include('layout/back-end/sidebar') ?>

      <?= $this->renderSection('content') ?>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="/"><?= $query->name; ?></a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('back-end/dist/assets/modules/jquery.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/popper.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/tooltip.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/nicescroll/jquery.nicescroll.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/moment.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('back-end/dist/assets/js/stisla.js'); ?>" type="text/javascript"></script>
  
  <!-- JS Libraies -->
  <script src="<?= base_url('back-end/dist/assets/modules/datatables/datatables.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/jquery-ui/jquery-ui.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/prism/prism.js'); ?>"></script>


  <!-- Page Specific JS File -->
  <script src="<?= base_url('back-end/dist/assets/js/page/modules-datatables.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/js/page/bootstrap-modal.js'); ?>"></script>
  
  <!-- Template JS File -->
  <script src="<?= base_url('back-end/dist/assets/js/scripts.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('back-end/dist/assets/js/custom.js'); ?>" type="text/javascript"></script>

  <?= $this->renderSection('javascript') ?>
</body>
</html>