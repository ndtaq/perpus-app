<?php
require_once "koneksi.php";

$id = $_GET["id"];
$query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE peminjaman_id = '$id'");
echo "<script>location.href = '?page=peminjaman'</script>";