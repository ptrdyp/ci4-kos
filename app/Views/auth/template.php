<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url(); ?>/css/auth.css" />
    <title>Login</title>
  </head>
  <body>
    <a href="#" class="logo-login">
      <i class="bx bx-home-smile"></i>
      <!-- <div class="logo-name"><span>Soedir</span>Kost</div> -->
    </a>

    <?php if($page) {
        echo view($page);
    } ?>
    
    <script src="<?= base_url(); ?>/js/auth.js"></script>
  </body>
</html>
