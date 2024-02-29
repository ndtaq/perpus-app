<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <a href="?page=buku_tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Buku</a>
            <table class="table table-bordered mt-2" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategori on buku.kategori_id = kategori.kategori_id");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['penulis']; ?></td>
                            <td><?php echo $data['penerbit']; ?></td>
                            <td><?php echo $data['tahun_terbit']; ?></td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td><?php echo $data['deskripsi']; ?></td>
                            <td>
                                <a href="?page=buku_ubah&&id=<?php echo $data['buku_id']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')" href="?page=buku_hapus&&id=<?php echo $data['buku_id']; ?>" class="btn btn-danger">Hapus</a>
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