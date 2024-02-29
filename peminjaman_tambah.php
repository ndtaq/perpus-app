<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                        if (isset($_POST['submit'])) {
                            $buku_id = $_POST['buku_id'];
                            $user_id = $_SESSION['user']['user_id'];
                            $tanggal_peminjaman = $_POST["tanggal_peminjaman"];
                            $tanggal_Pengembalian = $_POST["tanggal_pengembalian"];
                            $status_peminjaman = $_POST["status_peminjaman"];
                            $query = mysqli_query($koneksi, "INSERT INTO peminjaman(buku_id, user_id, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman) VALUES('$buku_id', '$user_id', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')");

                            if ($query) {
                                echo '<script>alert("Buku Berhasil Di Pinjam"); </script>';
                            }else {
                                echo '<script>alert("Buku Gagal Di Pinjam"); </script>';
                            }
                        }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                            <select name="buku_id" class="form-control">
                                <?php
                                    $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                                    while ($buku = mysqli_fetch_array($buk)) {
                                        ?>
                                        <option value="<?php echo $buku['buku_id']; ?>"><?php echo $buku['judul']; ?></option>;
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Peminjaman</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="tanggal_peminjaman">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="tanggal_pengembalian">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Status peminjaman</div>
                        <div class="col-md-8">
                        <select name="status_peminjaman" class="form-control" id="">
                            <option value="dipinjam">Dipinjam</option>
                            <option value="dikembalikan">Dikembalikan</option>
                        </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit" href="?page=peminjaman">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>