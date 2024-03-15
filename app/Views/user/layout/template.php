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
        <!-- Super Admin -->
        
      </ul>

      <?php if (session() -> get('level') <= 2) { ?>
      <ul class="side-menu">
        <h5>Akun</h5>
        
        
        
      </ul>
      <?php } ?>

      <ul class="side-menu last">
        
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
