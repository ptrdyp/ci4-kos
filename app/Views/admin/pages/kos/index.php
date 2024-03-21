<div class="card-row">
    <div class="card-col">
        <div id="map" style="width: 100%; height: 50vh;"></div>
    </div>
</div>

<div class="card-row">
    <div class="card-col">
        <div class="header">
            <i class='bx bx-receipt'></i>
            <h3>Kos</h3>
            <a href="<?= base_url('admin/add-kos') ?>">
                <button class="btn btn-border-success">Tambah Data</button>
            </a>
            <i class='bx bx-filter'></i>
            <i class='bx bx-search'></i>
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
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama kos</th>
                    <th>Jenis kos</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; 
                foreach($kos as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['kos_nama']; ?></td>
                        <td><?= $value['kos_jenis']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/edit-kos/' . $value['kos_id']) ?>">
                                <button type="button" class="btn btn-border-warning">Ubah</button>
                            </a>
                            <a href="<?= base_url('admin/delete-kos/' . $value['kos_id']) ?>">
                                <button type="button" class="btn btn-border-danger">Hapus</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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