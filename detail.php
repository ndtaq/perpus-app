<?php
// include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE buku_id='$id'");
$buku = mysqli_fetch_array($query);

// Ambil data ulasan dari database
$queryUlasan = mysqli_query($koneksi, "SELECT ulasan.*, user.username
FROM ulasan
JOIN user ON ulasan.user_id = user.user_id WHERE buku_id='$id'");
$ulasan = [];
while ($row = mysqli_fetch_assoc($queryUlasan)) {
    $ulasan[] = $row;
}
?>

<h1 class="mt-4">Tentang Buku</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">
                        <?= $buku['judul']; ?>
                    </h3>
                    <!-- Tambahkan cover buku di sini -->
                    <img src=assets/upload/<?= base64_encode($buku['cover_buku']); ?>" alt="Cover Buku" class="img-fluid">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Penulis</b>
                            <label style="color:black" class="badge badge-dark">
                                <?= $buku['penulis']; ?>
                            </label>
                        </li>
                        <li class="list-group-item">
                            <b>Penerbit</b>
                            <label style="color:black" class="badge badge-info float-right">
                                <?= $buku['penerbit']; ?>
                            </label>
                        </li>
                        <li class="list-group-item">
                            <b>Tahun Terbit</b>
                            <label style="color:black" class="badge badge-info float-right">
                                <?= $buku['tahun_terbit']; ?>
                            </label>
                        </li>
                        <a href="ulasan_tambah.php?id=<?= $id; ?>" class="btn btn-success btn-block mt-2">
                            <b>Berikan Ulasan</b>
                        </a>
                        <a href="?page=daftarbuku" class="btn btn-danger btn-block mt-2">
                            <b>Kembali</b>
                        </a>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4>Deskripsi Buku</h4>
                </div>

                <div class="card-body">
                    <!-- Tambahkan deskripsi buku di sini -->
                    <p>
                        <?= $buku['deskripsi']; ?>
                    </p>
                </div>
            </div>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4>Ulasan</h4>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Ulasan</th>
                                <th>Rating</th>
                                <th>Pemberi Ulasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ulasan as $row): ?>
                                <tr>
                                    <td>
                                        <?= $row['ulasan']; ?>
                                    </td>
                                    <td>
                                        <?= $row['rating']; ?>
                                    </td>
                                    <td>
                                        <?= $row['username']; ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
