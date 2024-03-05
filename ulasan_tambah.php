<?php
include 'koneksi.php';
$user_id=$_SESSION['user']['user_id'];
$idbuku = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

  // Validasi form
  if (empty($idbuku) || empty($ulasan) || empty($rating)) {
    echo '<script>alert("Semua kolom harus diisi!");</script>';
} else {
    $query = "INSERT INTO ulasan (buku_id, user_id, ulasan, rating) VALUES ('$idbuku', '$user_id', '$ulasan', '$rating')";
    $result = mysqli_query($koneksi, $query);
    

    if ($result) {
        echo '<script>alert("Tambah Data Ulasan Berhasil");</script>';
        header("Location: index.php?page=detail&id=$idbuku");
        exit();
    } else {
        echo '<script>alert("Tambah Data Ulasan Gagal: ' . mysqli_error($koneksi) . '");</script>';
    }
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ulasan Buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Ulasan Buku</h1>
        <div class="card">
            <div class="card-body">
                <form method="post">

                    <div class="form-group row">
                        <label for="namaLengkap" class="col-sm-2 col-form-label">Judul Buku</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul" class="form-control" id="namaLengkap" value="<?php
                            $buk = mysqli_query($koneksi, "SELECT * FROM buku WHERE buku_id=$idbuku"); 
                            $buku = mysqli_fetch_array($buk);echo $buku['judul']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ulasan" class="col-sm-2 col-form-label">Ulasan</label>
                        <div class="col-sm-10">
                            <textarea name="ulasan" rows="5" class="form-control" id="ulasan"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rating" class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <select name="rating" class="form-control" id="rating">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="index.php?page=detail&id=<?php echo $idbuku ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>