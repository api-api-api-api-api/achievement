<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow">
  
      <!-- Topbar Navbar -->
      <div class="topbar-brand d-lg-none d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url(); ?>/assets/img/logo.png" width="40">
          </div>
          <div class="topbar-brand-text text-dark mx-3">ACHIEVEMENT & KEGIATAN HARIAN</div>
        </div>
      <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item d-none d-lg-inline dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 text-gray-600 small"><?= $user['nama']; ?></span>
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/default.svg'); ?>">
          </a>

          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <div class="dropdown-item" href="#">
                <strong><?= $user['nama']; ?></strong>
            </div>
        
            <a class="dropdown-item" href="<?= base_url('ubah-password'); ?>">
                <i class="fas fa-fw fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                Ubah Password
              </a>  
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->