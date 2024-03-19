<div class="card-row">
    <div class="card-col">
        <div class="header">
            <i class='bx bx-list-plus'></i>
            <h3>Tambah Data</h3>
        </div>

        <?php 
        $errors = session() -> getFlashdata('errors');
        if (!empty($errors)) { ?>
        <div class="row">
            <div class="col">
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
            </div>
        </div>

        <?php } ?>

        <?php echo form_open('admin/edit-fakultas/' . $fakultas['id_fakultas']); ?>
            <div class="row">
                <div class="col">
                    <label for="nama_fakultas">Nama Fakultas</label>
                    <div class="custome-input">
                        <input type="text" value="<?= $fakultas ? $fakultas['nama_fakultas'] : '' ?>" name="nama_fakultas" placeholder="Fakultas Teknik" autocomplete="off">
                    </div>
                </div>
                <div class="col">
                    <label for="warna">Warna</label>
                    <div class="custome-input">
                        <input type="text" value="<?= $fakultas ? $fakultas['warna'] : '' ?>" name="warna" placeholder="#fecdd3" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="geojson">Geojson</label>
                    <div class="custome-input">
                        <textarea name="geojson" autocomplete="off"><?= $fakultas ? $fakultas['geojson'] : '' ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col col-btn">
                    <a href="<?= base_url('admin/fakultas') ?>">
                        <button type="button" class="btn btn-border-success">Kembali</button>
                    </a>
                    <button class="btn btn-secondary" type="submit">Simpan</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>