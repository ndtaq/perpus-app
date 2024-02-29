<?php
// Buat koneksi ke database
$koneksi = mysqli_connect('localhost','root','','perpus_ukk');

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi ke database gagal: " . mysqli_connect_error();
    exit();
}

// Periksa apakah ada permintaan "Pinjam"
if (isset($_GET['id'])) {
    // Dapatkan ID buku yang akan dipinjam
    $buku_id = $_GET['id'];
    $user_id = $_GET['id'];
    $tanggal_peminjaman = date('Y-m-d');

    // Simpan data peminjaman ke database
    $query = "INSERT INTO peminjaman (buku_id, user_id, tanggal_peminjaman) VALUES ('$buku_id','$user_id','$tanggal_peminjaman')";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah data berhasil disimpan
    if ($result) {
        echo '<script>alert("Buku Berhasil Dipinjam"); </script>';
    } else {
        echo '<script>alert("buku Gagal Dipinjam"); </script>';
    }
}

// Tutup koneksi
mysqli_close($koneksi);
?>
