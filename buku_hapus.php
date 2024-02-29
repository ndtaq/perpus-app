<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM buku WHERE buku_id=$id");
?>
<script>
    alert('hapus data berhasil');
    location.href = "index.php?page=buku";
</script>