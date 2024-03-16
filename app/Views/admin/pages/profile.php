<div class="bottom-data">
    <div class="user-profile">
        <div class="logo">
            <img src="<?= base_url() ?>/img/profile.jpg">
            <h2><?= session() -> get('nama') ?></h2>
            <p><?= session() -> get('email') ?></p>
        </div>
    </div>

    <div class="user-data">
        <?php echo form_open('admin/edit-data'); ?>
        <div class="image-container">
            <img id="chosen-image">
            <p id="file-name"></p>
            <input id="upload-button" type="file" name="foto" autocomplete="off" accept="image/*">
            <label id="foto" for="upload-button">Pilih foto</label>
        </div>
        <label for="nama">Nama:</label>
        <div class="custome-input">
            <input type="text" name="nama" placeholder="Nama belum diisi" autocomplete="off" value="<?= session() -> get('nama') ?>">
        </div>
        <label for="email">Email:</label>
        <div class="custome-input">
            <input type="email" name="email" autocomplete="off" value="<?= session() -> get('email') ?>">
        </div>
        <label for="nohp">No Hp:</label>
        <div class="custome-input">
            <input type="text" name="nohp" placeholder="No Hp belum diisi" autocomplete="off" value="<?= session() -> get('no_hp') ?>">
        </div>
        <label for="password">Kata Sandi:</label>
        <div class="custome-input">
            <input type="password" name="password" placeholder="Ubah Kata Sandi" autocomplete="off">
        </div>

        <button class="login">Ubah data</button>
        <?php echo form_close(); ?>
    </div>
</div>