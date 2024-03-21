<div class="card-row">
    <div class="card-col">
        <div id="map" style="width: 100%; height: 50vh;"></div>
    </div>
</div>

<div class="card-row">
    <div class="card-col">
        <div class="header">
            <i class='bx bx-list-plus'></i>
            <h3>Ubah Informasi Website</h3>
        </div>

        <?php 
            function displayMessage($type, $message) {
                echo '
                <div class="row">
                    <div class="col">
                        <ul class="task-list">
                            <li class="'.$type.'">
                                <div class="task-title">
                ';
                echo session() -> getFlashdata($message);
                echo '
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                ';
            }

            if (session() -> getFlashdata('pesan')) {
                displayMessage('completed', 'pesan');
            }

            if (session() -> getFlashdata('error')) {
                displayMessage('not-completed', 'error');
            }
        ?>

        <?php echo form_open('admin/update-setting'); ?>
        <div class="row">
            <div class="col flex-2">
                <label for="nama">Nama Website</label>
                <div class="form-input">
                    <input type="text" name="setting_nama_web_depan" placeholder="Soedir" autocomplete="off" value="<?= $setting['setting_nama_web_depan'] ?>">
                </div>
            </div>
            <div class="col flex-2">
                <label for="nama">Nama Belakang</label>
                <div class="form-input">
                    <input type="text" name="setting_nama_web_belakang" placeholder="Kost" autocomplete="off" value="<?= $setting['setting_nama_web_belakang'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col flex-2">
                <label for="setting_coordinat">Koordinat</label>
                <div class="form-input">
                    <input type="text" name="setting_coordinat" placeholder="-7.403900991147349, 109.24633745767005" autocomplete="off" value="<?= $setting['setting_coordinat'] ?>">
                </div>
            </div>
            <div class="col flex-2">
                <label for="setting_zoom_view">Zoom View</label>
                <div class="form-input">
                    <input type="number" name="setting_zoom_view" placeholder="12" min="0" autocomplete="off" value="<?= $setting['setting_zoom_view'] ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col col-btn">
                <button class="btn btn-secondary">Simpan</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script>
    var coordinates = "<?php echo $setting['setting_coordinat']; ?>".split(',').map(Number);
    var map = L.map('map', {
        center: coordinates,
        zoom: <?php echo $setting['setting_zoom_view']; ?>
    });

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
</script>
