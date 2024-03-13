<div class="container">
    <h1>Masuk ke Akun Anda 👏</h1>
    <div class="social-login">
        <button class="google">
            <i class='bx bxl-google'></i>
            Gunakan Akun Google
        </button>
    </div>

    <div class="divider">
        <div class="line"></div>
        <p>Atau</p>
        <div class="line"></div>
    </div>

    <?php 
    function displayMessage($type, $message) {
        echo '
            <ul class="task-list">
                <li class="'.$type.'">
                    <div class="task-title">
        ';
        echo session() -> getFlashdata($message);
        echo '
                    </div>
                </li>
            </ul>
        ';
    }

    if (session() -> getFlashdata('pesan')) {
        displayMessage('completed', 'pesan');
    }

    if (session() -> getFlashdata('error')) {
        displayMessage('not-completed', 'error');
    }
    ?>

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


    <?php echo form_open('auth/cek_login'); ?>
        <label for="email">Email:</label>
        <div class="custome-input">
            <input type="email" name="email" placeholder="Masukkan email Anda" autocomplete="off">
            <i class='bx bx-at'></i>
        </div>
        <label for="password">Password:</label>
        <div class="custome-input">
            <input type="password" name="password" placeholder="Masukkan Kata Sandi" autocomplete="off">
            <i class='bx bx-lock-alt'></i>
        </div>

        <button class="login">Login</button>
        
        <div class="links">
            <a href="#"></a>
            <p>Tidak memiliki akun? <a href="<?= base_url("auth/register"); ?>">Daftar sekarang!</a></p>
        </div>
    <?php echo form_close(); ?>

</div>
