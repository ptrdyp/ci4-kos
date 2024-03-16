<div class="bottom-data">
    <div class="orders">
        <div class="header">
            <i class='bx bx-receipt'></i>
            <h3>Fakultas</h3>
            <i class='bx bx-filter'></i>
            <i class='bx bx-search'></i>
        </div>
        <table>
            <thead>
                <tr>
                <th>No</th>
                <th>Nama Fakultas</th>
                <th>Gambar</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; 
                foreach($fakultas as $key) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $key['nama_fakultas']; ?></td>
                        <td>
                        <img src="images/profile-1.jpg">
                        </td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>