<div class="add">
    <div class="card-row">
        <div class="card-col">
            <div class="header">
                <i class='bx bx-list-plus'></i>
                <h3>Tambah Data</h3>
                <i class='bx bx-x add-close'></i>
            </div>

            <?php echo form_open('admin/insert-fakultas'); ?>
                <div class="row">
                    <div class="col">
                        <label for="nama">Nama Fakultas</label>
                        <div class="custome-input">
                            <input type="text" name="nama" placeholder="Fakultas Teknik" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="map" style="width: 100%; height: 50vh;"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="geojson">Geojson</label>
                        <div class="custome-input">
                            <textarea name="geojson" autocomplete="off"></textarea>
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
</div>

<div class="card-row">
    <div class="card-col">
        <div class="header">
            <i class='bx bx-receipt'></i>
            <h3>Fakultas</h3>
            <button id="toggleAddButton" class="btn btn-border-success">Tambah Data</button>
            <i class='bx bx-filter'></i>
            <i class='bx bx-search'></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Fakultas</th>
                    <th>Warna</th>
                    <th class="img">Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; 
                foreach($fakultas as $key) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $key['nama_fakultas']; ?></td>
                        <td style="background-color: <?= $key['warna']; ?>;"><?= $key['warna']; ?></td>
                        <td class="img">
                            <img src="<?= !empty($key['gambar']) ? $key['gambar'] : base_url().'img/default-view.jpeg'; ?>">
                        </td>
                        <td>
                            <button class="btn btn-border-warning">Ubah</button>
                            <button class="btn btn-border-danger">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>