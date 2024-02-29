<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <a href="?page=ulasan_tambah" class="btn btn-primary"><i class="fa fa-plus"></i>Ulasan</a>
            <table class="table table-bordered mt-2" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Ulasan</th>
                    <th>Rating</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM ulasan LEFT JOIN user on user.user_id = ulasan.user_id LEFT JOIN buku on buku.buku_id = ulasan.buku_id");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $data['nama_lengkap']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['ulasan']; ?></td>
                            <td><?php echo $data['rating']; ?></td>
                            <td>
                                <a href="?page=ulasan_ubah&&id=<?php echo $data['ulasan_id']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')" href="?page=ulasan_hapus&&id=<?php echo $data['ulasan_id']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
    </div>
</div>