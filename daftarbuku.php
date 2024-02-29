<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Buku ID</th>
                    <th>Kategori ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Deskripsi</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM buku");
                while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $data['buku_id']; ?></td>
                        <td><?php echo $data['kategori_id']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['penulis']; ?></td>
                        <td><?php echo $data['penerbit']; ?></td>
                        <td><?php echo $data['tahun_terbit']; ?></td>
                        <td><?php echo $data['deskripsi']; ?></td>
                        <td>
                            <a href="?page=detail&&id=<?php echo $data['buku_id']; ?>" class="btn btn-info">Detail</a>
                            <a href="pinjam.php?id=<?php echo $data['buku_id']; ?>" class="btn btn-success">Pinjam</a>
                            <a href="?page=buku_ubah&&id=<?php echo $data['buku_id']; ?>" class="btn btn-warning">Simpan</a>
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