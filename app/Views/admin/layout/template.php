<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url(); ?>/css/dashboard.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title><?= $judul ?></title>
  </head>
  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <a href="#" class="logo">
        <i class="bx bx-home-smile"></i>
        <div class="logo-name"><span>Soedir</span>Kost</div>
      </a>
      <ul class="side-menu">
        <h5>Data</h5>
        <li class="<?= ($active == '') ? 'active' : ''; ?>">
          <a href="<?= base_url('admin') ?>"><i class="bx bxs-dashboard"></i>Dashboard</a>
        </li>
        <li class="<?= ($active == 'kos') ? 'active' : ''; ?>">
          <a href="<?= base_url('admin/kos') ?>"><i class="bx bx-home-alt-2"></i>Kos</a>
        </li>
        <li class="<?= ($active == 'fasilitas') ? 'active' : ''; ?>">
          <a href="<?= base_url('admin/fasilitas') ?>"><i class="bx bx-list-ul"></i>Fasilitas</a>
        </li>
        <li class="<?= ($active == 'penyewaan') ? 'active' : ''; ?>">
          <a href="<?= base_url('admin/penyewaan') ?>"><i class="bx bx-spreadsheet"></i>Penyewaan</a>
        </li>
      </ul>

      <ul class="side-menu">
        <h5>Akun</h5>
        <li class="<?= ($active == 'akun-admin') ? 'active' : ''; ?>">
          <a href="<?= base_url('admin/akun-admin') ?>"><i class='bx bxs-user'></i>Admin</a>
        </li>
        <li class="<?= ($active == 'pemilik-kos') ? 'active' : ''; ?>">
          <a href="<?= base_url('admin/pemilik-kos') ?>"><i class='bx bxs-user-rectangle'></i>Pemilik Kos</a>
        </li>
        <li class="<?= ($active == 'mahasiswa') ? 'active' : ''; ?>">
          <a href="<?= base_url('admin/mahasiswa') ?>"><i class='bx bxs-user-account' ></i>Mahasiswa</a>
        </li>
      </ul>

      <ul class="side-menu last">
        <li class="<?= ($active == 'profile') ? 'active' : ''; ?>">
          <a href="<?= base_url('admin/profile') ?>"><i class='bx bx-user-circle'></i>Profil Saya</a>
        </li>
        <li>
          <a href="<?= base_url('/logout') ?>" class="logout"><i class="bx bx-log-out-circle"></i>Logout</a>
        </li>
      </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
      <!-- Navbar -->
      <nav>
        <i class="bx bx-menu"></i>
        <form action="#">
          <div class="form-input">
            <input type="search" placeholder="Search..." />
            <button class="search-btn" type="submit"><i class="bx bx-search"></i></button>
          </div>
        </form>
        <input type="checkbox" id="theme-toggle" hidden />
        <label for="theme-toggle" class="theme-toggle"></label>
        <a href="#" class="notif">
          <i class="bx bx-bell"></i>
          <span class="count">12</span>
        </a>
        <div class="profile">
          <div class="left">
            <img src="<?= base_url() ?>/img/profile.jpg">
            <div class="user">
                <h5><?= session() -> get('nama') ?></h5>
                <a href="<?= base_url('admin/profile') ?>"><?= session() -> get('level_name') ?></a>
            </div>
          </div>
          <a href="<?= base_url('admin/profile') ?>"><i class='bx bxs-chevron-right'></i></a>
        </div>
      </nav>
      <!-- End of Navbar -->

      <?php if($page) {
        echo view($page);
      } ?>
      
    </div>

    <script src="<?= base_url(); ?>/js/dashboard.js"></script>
  </body>
</html>
