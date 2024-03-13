<main>
    <div class="header">
        <div class="left">
            <h1><?= $judul ?></h1>
            <ul class="breadcrumb">
                <li><a href="#">Admin</a></li>/
                <li><a href="#" class="active"><?= $judul ?></a></li>
            </ul>
        </div>
    </div>

    <div class="bottom-data">
        <div class="orders">
            <div class="header">
                <i class="bx bx-home-alt-2"></i>
                <h3><?= $judul ?></h3>
                <i class='bx bx-filter'></i>
                <i class='bx bx-search'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                        <!-- Detail -> Fasilitas Kos -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="images/profile-1.jpg">
                            <p>John Doe</p>
                        </td>
                        <td>14-08-2023</td>
                        <td><span class="status completed">Completed</span></td>
                        <td>Edit || Hapus</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="images/profile-1.jpg">
                            <p>John Doe</p>
                        </td>
                        <td>14-08-2023</td>
                        <td><span class="status completed">Completed</span></td>
                        <td>Edit || Hapus</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="images/profile-1.jpg">
                            <p>John Doe</p>
                        </td>
                        <td>14-08-2023</td>
                        <td><span class="status completed">Completed</span></td>
                        <td>Edit || Hapus</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>      
</main>