<?php
require("koneksi.php");

$id = $_SESSION['user']['user_id'];
if (isset($_GET['peminjaman_id'])) {
    // Ambil tanggal saat ini
    $tanggal_sekarang = date("Y-m-d");

    // Ambil ID peminjaman dari URL
    $id_peminjaman = $_GET['peminjaman_id'];
    
    // Perbarui status peminjaman dan tanggal pengembalian
    $query_update_status = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE peminjaman_id = '$id_peminjaman'");
    
    if ($query_update_status) {
        header("location:index.php?page=peminjaman");
    } else {
        echo "Gagal memperbarui status peminjaman: " . mysqli_error($koneksi);
    }
}
?>