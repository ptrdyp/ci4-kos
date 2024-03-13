<div class="container">
    <h1>Daftar Akun Pemilik Kos 👏</h1>
    <div class="social-login">
        <button class="google">
            <i class='bx bxl-google'></i>
            Daftar dengan Akun Google
        </button>
    </div>

    <div class="divider">
        <div class="line"></div>
        <p>Atau</p>
        <div class="line"></div>
    </div>

    <?php 
        $errors = session() -> getFlashdata('errors');
        if (!empty($errors)) { ?>
            <ul class="task-list">
                <li class="not-completed">
                    <?php foreach ($errors as $error) : ?>
                        <div class="task-title">
                            <i class='bx bx-x-circle'></i>
                            <p><?= esc($error) ?></p>
                        </div>
                    <?php endforeach ?>
                </li>
            </ul>

    <?php } ?>

    <?php echo form_open('auth/save_register'); ?>
    
        <label for="email">Email:</label>
        <div class="custome-input">
            <input type="email" name="email" placeholder="Masukkan email Anda" autocomplete="off">
            <i class='bx bx-at'></i>
        </div>
        <label for="password">Password:</label>
        <div class="custome-input">
            <input type="password" name="password" autocomplete="off" placeholder="Masukkan kata sandi">
            <i class='bx bx-lock-alt'></i>
        </div>
        <label for="password">Konfirmasi Password:</label>
        <div class="custome-input">
            <input type="password" name="pass_confirm" autocomplete="off" placeholder="Masukkan kembali kata sandi">
            <i class='bx bx-lock-alt'></i>
        </div>
        <button type="submit" class="login">Daftar Akun</button>

        <div class="links">
            <p>Sudah memiliki akun? <a href="<?= base_url("auth/login"); ?>">Masuk</a></p>
        </div>

    <?php echo form_close(); ?>

</div>
