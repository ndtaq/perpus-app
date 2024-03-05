<?php
require("koneksi.php");
$id=$_SESSION['user']['user_id'];

if (isset($_GET['id'])) {
    $buku_id = $_GET['id'];

    // Periksa apakah buku sudah pernah dipinjam oleh pengguna yang sama pada saat yang sama
    $query_cek_peminjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE buku_id = '$buku_id' AND user_id = '$id' AND status_peminjaman = 'Dipinjam'");
    $jumlah_peminjaman = mysqli_num_rows($query_cek_peminjaman);

    if ($jumlah_peminjaman > 0) {
        echo "<script>alert('Buku Ini Sudah Dipinjam!');</script>";
        echo "<script>window.location.href='index.php?page=daftarbuku';</script>";
    } else {
        // Simpan data peminjaman ke tabel peminjaman
        $tanggal_peminjaman = date('Y-m-d');
        $query_simpan_peminjaman = mysqli_query($koneksi, "INSERT INTO peminjaman (user_id,buku_id, tanggal_peminjaman, status_peminjaman) VALUES ('$id','$buku_id', '$tanggal_peminjaman', 'Dipinjam')");

        if ($query_simpan_peminjaman) {
            // Perbarui status peminjaman buku di tabel buku
            $query_update_status = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman = 'Dipinjam' WHERE buku_id = '$buku_id'");
            if ($query_update_status) {
                echo "<script>alert('Buku berhasil dipinjam!');</script>";
                echo "<script>window.location.href='index.php?page=daftarbuku';</script>";
            } else {
                echo "<script>alert('Gagal memperbarui status peminjaman buku!');</script>";
                echo "<script>window.location.href='';</script>";
            }
        } else {
            echo "<script>alert('Gagal meminjam buku!');</script>";
            echo "<script>window.location.href='';</script>";
        }
    }
}
?>
