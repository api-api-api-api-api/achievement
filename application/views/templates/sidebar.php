<!-- Sidebar -->
<ul class="navbar-nav d-none d-md-inline bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('DaftarAchievement'); ?>">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url(); ?>/assets/img/logoputih.png" width="50">
    </div>
    <div class="sidebar-brand-text mx-3">Achievement & Kegiatan Harian</div>
  </a>
  <br>
  <!-- Heading -->
  <div class="sidebar-heading">
    Menu
  </div>
  <br>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <?php if ($user['role_id'] == 1 || $user['role_id'] == 2 || $user['role_id'] == 3) : ?>
    <?php if($judul == 'Achievement'): ?>
      <li class="nav-item active">
          <?php else: ?>
      <li class="nav-item">
          <?php endif; ?>
      <a class="nav-link" href="<?= base_url('DaftarAchievement'); ?>">
        <i class="fas fa-fw fa-star"></i>
        <span>Achievement</span></a>
    </li>

  <?php if($judul == 'Kegiatan Divisi'): ?>
    <li class="nav-item active">
        <?php else: ?>
    <li class="nav-item">
        <?php endif; ?>
      <a class="nav-link" href="<?= base_url('KegiatanDivisi'); ?>">
        <i class="fas fa-fw fa-briefcase"></i>
        <span>Kegiatan Harian Divisi</span></a>
    </li>

    <?php endif; ?>
    <?php if ($user['role_id'] == 1 || $user['role_id'] == 2): ?>
    <?php if($judul == 'Kegiatan Tim'): ?>
    <li class="nav-item active">
        <?php else: ?>
    <li class="nav-item">
        <?php endif; ?>
      <a class="nav-link" href="<?= base_url('Kegiatan'); ?>">
        <i class="fas fa-fw fa-tasks"></i>
        <span>Kegiatan Harian Tim</span></a>
    </li>

    <?php endif; ?>
    <?php if ($user['role_id'] == 1): ?>
    <?php if($judul == 'Laporan Kadiv'): ?>
    <li class="nav-item active">
        <?php else: ?>
    <li class="nav-item">
        <?php endif; ?>
      <a class="nav-link" href="<?= base_url('laporan-achievement-kadiv'); ?>">
        <i class="fas fa-fw fa-print"></i>
        <span>Laporan</span></a>
    </li>

    <?php endif; ?>
    <?php if ($user['role_id'] == 3): ?>
    <?php if($judul == 'Laporan'): ?>
    <li class="nav-item active">
        <?php else: ?>
    <li class="nav-item">
        <?php endif; ?>
      <a class="nav-link" href="<?= base_url('laporan-achievement'); ?>">
        <i class="fas fa-fw fa-print"></i>
        <span>Laporan</span></a>
    </li>

    <?php if($judul == 'Divisi'): ?>
    <li class="nav-item active">
        <?php else: ?>
    <li class="nav-item">
        <?php endif; ?>
      <a class="nav-link" href="<?= base_url('data-divisi'); ?>">
        <i class="fas fa-fw fa-city"></i>
        <span>Kelola Divisi</span></a>
    </li>

    <?php if($judul == 'Pengguna'): ?>
    <li class="nav-item active">
        <?php else: ?>
    <li class="nav-item">
        <?php endif; ?>
      <a class="nav-link" href="<?= base_url('data-pengguna'); ?>">
        <i class="fas fa-fw fa-users"></i>
        <span>Kelola Pengguna</span></a>
    </li>
  <?php endif; ?>

</ul>
<!-- End of Sidebar -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-gradient-warning">
        <h5 class="modal-title" id="logoutModalLabel">Yakin ingin keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Klik "logout" jika ingin mengakhiri sesi ini.</div>
      <div class="modal-footer">
        <button class="btn text-white bg-gradient-danger" type="button" data-dismiss="modal">Batal</button>
        <a class="btn text-white bg-gradient-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
      </div>
    </div>
  </div>
</div>