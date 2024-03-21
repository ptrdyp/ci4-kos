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

        <?php echo form_open('admin/save-kos'); ?>
            <div class="row">
                <div class="col flex-3">
                    <label for="kos_nama">Nama Kos</label>
                    <div class="custome-input">
                        <input type="text" value="<?= old('kos_nama') ?>" name="kos_nama" placeholder="Kos Alden" autocomplete="off">
                    </div>
                </div>
                <div class="col flex-1">
                    <label for="kos_jenis">Jenis Kos</label>
                    <div class="custome-input">
                        <select id="kos_jenis" name="kos_jenis">
                            <option value="Putra">Putra</option>
                            <option value="Putri">Putri</option>
                            <option value="Campuran">Campuran</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col flex-2">
                    <label for="kos_deposit">Deposit</label>
                    <div class="custome-input">
                        <input type="text" id="kos_deposit" value="<?= old('kos_deposit') ?>" name="kos_deposit" placeholder="500,000" autocomplete="off">
                    </div>
                </div>
                <div class="col flex-1">
                    <label for="kos_waktu_sewa_terdekat">Waktu masuk</label>
                    <div class="custome-input">
                        <select id="kos_waktu_sewa_terdekat" name="kos_waktu_sewa_terdekat">
                            <option disabled selected>Tedekat</option>
                            <option value="Bisa di hari H setelah pengajuan sewa">Bisa di hari H setelah pengajuan sewa</option>
                            <option value="Satu hari setelah pengajuan sewa">Satu hari setelah pengajuan sewa</option>
                            <option value="Dua hari setelah pengajuan sewa">Dua hari setelah pengajuan sewa</option>
                            <option value="Bisa didiskusikan dahulu dengan pemilik kos">Bisa didiskusikan dahulu dengan pemilik kos</option>
                        </select>
                    </div>
                </div>
                <div class="col flex-1">
                    <label for="kos_waktu_sewa_terjauh">Waktu masuk</label>
                    <div class="custome-input">
                        <select id="kos_waktu_sewa_terjauh" name="kos_waktu_sewa_terjauh">
                            <option disabled selected>Terjauh</option>
                            <option value="1 bulan setelah pengajuan sewa">1 bulan setelah pengajuan sewa</option>
                            <option value="2 bulan setelah pengajuan sewa">2 bulan setelah pengajuan sewa</option>
                            <option value="3 bulan setelah pengajuan sewa">3 bulan setelah pengajuan sewa</option>
                            <option value="Bisa didiskusikan dahulu dengan pemilik kos">Bisa didiskusikan dahulu dengan pemilik kos</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col flex-2">
                    <label for="kos_alamat">Alamat Kos</label>
                    <div class="custome-input">
                        <textarea value="<?= old('kos_alamat') ?>" name="kos_alamat" autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="col flex-1">
                    <label for="kos_tentang">Tentang</label>
                    <div class="custome-input">
                        <textarea value="<?= old('kos_alamat') ?>" name="kos_alamat" autocomplete="off"></textarea>
                    </div>
                </div>
            </div>

            <div class="row mt-12">
                <div class="col flex-1">
                    <div id="map" style="width: 100%; height: 50vh;"></div>
                </div>
            </div>

            <div class="row">
                <div class="col flex-1">
                    <label for="kos_coordinat">Koordinat</label>
                    <div class="custome-input">
                        <input type="text" id="Coordinat" value="<?= old('kos_coordinat') ?>" name="kos_coordinat" placeholder="" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row mt-12">
                <div class="col col-btn">
                    <a href="<?= base_url('admin/kos') ?>">
                        <button type="button" class="btn btn-border-success">Kembali</button>
                    </a>
                    <button class="btn btn-secondary" type="submit">Simpan</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script>

    $(document).ready(function(){
        $('#kos_deposit').mask('000,000,000', {reverse: true});

        $('form').on('submit', function(e) {
            e.preventDefault();

            var deposit = $('#kos_deposit').val();
            var numericDeposit = Number(deposit.replace(/,/g, ''));

            $('#kos_deposit').val(numericDeposit);

            this.submit();
        });
    });


    var coordinates = "<?php echo $setting['setting_coordinat']; ?>".split(',').map(Number);
    var map = L.map('map', {
        center: coordinates,
        zoom: <?php echo $setting['setting_zoom_view']; ?>
    });

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var coordinatInput = document.querySelector("[name='kos_coordinat']");
    var curLocation = coordinates;
    console.log(curLocation);
    map.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true',
    });

    //get coordinat on marker
    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {curLocation}).bindPopup(position).update();
        $("#Coordinat").val(position.lat + ", " + position.lng);
    })

    //get coordinat on click
    map.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        coordinatInput.value = lat + ", " + lng;
    });
    
    map.addLayer(marker);
</script>