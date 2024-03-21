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

        <?php echo form_open('admin/edit-fakultas/' . $fakultas['fakultas_id']); ?>
            <div class="row">
                <div class="col flex-2">
                    <label for="fakultas_nama">Nama Fakultas</label>
                    <div class="form-input">
                        <input type="text" value="<?= $fakultas ? $fakultas['fakultas_nama'] : '' ?>" name="fakultas_nama" placeholder="Fakultas Teknik" autocomplete="off">
                    </div>
                </div>
                <div class="col flex-2">
                    <label for="fakultas_warna">Warna</label>
                    <div class="form-input">
                        <input type="text" value="<?= $fakultas ? $fakultas['fakultas_warna'] : '' ?>" name="fakultas_warna" placeholder="#fecdd3" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col flex-1">
                    <label for="fakultas_geojson">Geojson</label>
                    <div class="form-input">
                        <textarea name="fakultas_geojson" autocomplete="off"><?= $fakultas ? $fakultas['fakultas_geojson'] : '' ?></textarea>
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