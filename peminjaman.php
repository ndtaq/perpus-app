<?php
// require("koneksi.php");

$id = $_SESSION['user']['user_id'];
$query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE status_peminjaman = 'Dipinjam' AND user_id='$id'");

?>

<h1 class="mt-4">Daftar Buku yang Sedang Dipinjam</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Status Peminjaman</th>
                        <th>keterangan</th>
                    </tr>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                        $id_buku = $data['buku_id'];
                        $query_buku = mysqli_query($koneksi, "SELECT judul FROM buku WHERE buku_id = '$id_buku'");
                        $buku = mysqli_fetch_array($query_buku);
                        ?>
                        <tr>
                            <td>
                                <?php echo $i++ ?>
                            </td>
                            <td>
                                <?php echo $buku['judul']; ?>
                            </td>
                            <td>
                                <?php echo $data['tanggal_peminjaman']; ?>
                            </td>
                            <td>
                                <?php echo $data['status_peminjaman']; ?>
                            </td>
                            <td>
                                <form method="POST" action="proses_update.php?peminjaman_id=<?php echo $data['peminjaman_id']; ?>">
                                <input type="submit" value="kembalikan" class="btn btn-danger">
                                </form>
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
