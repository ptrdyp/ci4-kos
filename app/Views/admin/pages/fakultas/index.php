<div class="card-row">
    <div class="card-col">
        <div id="map" style="width: 100%; height: 50vh;"></div>
    </div>
</div>

<div class="card-row">
    <div class="card-col">
        <div class="header">
            <i class='bx bx-receipt'></i>
            <h3>Fakultas</h3>
            <a href="<?= base_url('admin/add-fakultas') ?>">
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
                    <th>Nama Fakultas</th>
                    <th>Warna</th>
                    <th class="text-center">gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; 
                foreach($fakultas as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['fakultas_nama']; ?></td>
                        <td style="background-color: <?= $value['fakultas_warna']; ?>;"></td>
                        <td class="text-center">
                            <img src="<?= !empty($value['fakultas_gambar']) ? $value['fakultas_gambar'] : base_url().'img/default-view.jpeg'; ?>">
                        </td>
                        <td>
                            <a href="<?= base_url('admin/edit-fakultas/' . $value['fakultas_id']) ?>">
                                <button type="button" class="btn btn-border-warning">Ubah</button>
                            </a>
                            <a href="<?= base_url('admin/delete-fakultas/' . $value['fakultas_id']) ?>">
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
    var coordinates = "<?php echo $setting['coordinat']; ?>".split(',').map(Number);
    var map = L.map('map', {
        center: coordinates,
        zoom: <?php echo $setting['zoom_view']; ?>
    });

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    <?php foreach ($fakultas as $key => $value) { ?>
        L.geoJSON(<?= $value['fakultas_geojson']; ?>, {
            fillColor: '<?= $value['fakultas_warna']; ?>',
            color: '<?= $value['fakultas_warna']; ?>',
            fillOpacity: 0.2,
            weight: 2,
        })
        .bindPopup("<?= $value['fakultas_nama']; ?>")
        .addTo(map);
    <?php } ?>

</script>