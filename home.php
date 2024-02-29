<h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                    <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategori"));
                                    ?>
                                    Total Kategori</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=kategori">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                    <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));
                                    ?>    
                                    Total Buku</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=buku">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                    <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasan"));
                                    ?>   
                                    Total Ulasan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=ulasan">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                
                            </div>
                        </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">

                                <tr>
                                    <td widht="100">Nama</td>
                                    <td widht="1">:</td>
                                    <td><?php echo $_SESSION['user']['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td widht="100">Level user</td>
                                    <td widht="level">:</td>
                                    <td><?php echo $_SESSION['user']['level']; ?></td>
                                </tr>
                                <tr>
                                    <td widht="100">Tanggal Login</td>
                                    <td widht="1">:</td>
                                    <td><?php echo date('d-m-Y'); ?></td>
                                </tr>


                                </table>
                            </div>
                        </div>
                        <h1 class="mt-4">Laporan Peminjaman Buku </h1>
<div class="card">
    <div class="card-body">
<div class="row">
    <div class="col-md-12">
        <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>Cetak Data</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status Peminjaman</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM  peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user
             LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
          
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['tanggal_peminjaman']; ?></td>
                        <td><?php echo $data['tanggal_pengembalian']; ?></td>
                        <td><?php echo $data['status_pengembalian']; ?></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</div>
    </div>
</div>