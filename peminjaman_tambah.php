<h1 class="mt-4">Peminjaman Buku </h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
               if(isset($_POST['submit'])) {
                   $id_buku = $_POST['id_buku'];
                   $id_user = $_SESSION['user']['id_user'];
                   $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                   $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                   $status_pengembalian = $_POST['status_pengembalian'];
                   $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,
                   status_pengembalian)
                    values('$id_buku','$id_user','$tanggal_peminjaman','$tanggal_pengembalian','$status_pengembalian')");

                   if($query) {
                       echo '<script>alert("tambah data berhasil.");</script>';
                   }else{
                       echo '<script>alert("tambah data gagal.");</script>';
                   }
               }
           ?>
                    <div class="row mb-3">
                        <div class="col-md-5">Buku</div>
                        <div class="col-md-8">
                            <select name="id_buku" class="form-control">
                                <?php
                            $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                            while($buku = mysqli_fetch_array($buk)) {
                                ?>
                                <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                                <?php
                            }
                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-5">Tanggal Peminjaman</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="tanggal_peminjaman">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-5">Tanggal Pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="tanggal_pengembalian">
                        </div>
                    </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-5">Status pengembalian</div>
                <div class="col-md-8">
                    <select name="status_pengembalian" class="form-control">
                        <option value="dipinjam">Dipinjam</option>
                        <option value="dikembalikan">dikembalikan</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>