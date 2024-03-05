<?php
$user_id = $_SESSION['user']['user_id'];
$query = "SELECT * FROM koleksi_pribadi WHERE user_id = '$user_id'";
$result = mysqli_query($koneksi, $query);

?>
<h1 class="mt-4">Koleksi Saya</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>keterangan</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query_buku = "SELECT buku.*, koleksi_pribadi.koleksi_id
                FROM buku
                JOIN koleksi_pribadi ON buku.buku_id = koleksi_pribadi.buku_id
                WHERE koleksi_pribadi.user_id = '$user_id';";
                    $result_buku = mysqli_query($koneksi, $query_buku);

                    if (mysqli_num_rows($result_buku) > 0) {
                        while ($data_buku = mysqli_fetch_assoc($result_buku)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $data_buku['judul']; ?>
                                </td>
                                <td>
                                    <?php echo $data_buku['penulis']; ?>
                                </td>
                                <td>
                                    <?php echo $data_buku['penerbit']; ?>
                                </td>
                                <td>
                                    <a href="?page=koleksi_hapus&&id=<?php echo $data_buku['koleksi_id']; ?>"
                                        class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>