<?php
   include "koneksi.php";   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>bg-
    <body class="bg-light ">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card bg-primary shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register perpustakaan digital</h3></div>
                                    <div class="card-body">
                                        <?php
                                            if(isset($_POST['Register'])){
                                                $nama_lengkap = $_POST['nama_lengkap'];
                                                $email = $_POST['email'];
                                                $username = $_POST['username'];
                                                $alamat = $_POST['alamat'];
                                                $password = md5($_POST['password']);

                                                if(isset($_POST['peminjam'])){
                                                    $level = "peminjaman";
                                                }

                                                if(isset($_POST['admin'])){
                                                    $level = "admin";
                                                }

                                                $insert = mysqli_query($koneksi, "INSERT INTO user(nama_lengkap,email,username,alamat,password, level) VALUES ('$nama_lengkap','$email','$username','$alamat','$password','$level')");

                                                if($insert){
                                                    header('location:index.php');
                                                }else{
                                                    echo '<script>alert("selamat Register gagal , silahkan ulangi kembali.)</script>';
                                                }
                                            }
                                        ?>
                                        <form method="post">
                                            <div class=" mb-3">
                                                <label for="inputEmail">nama lengkap</label>
                                                <input class="form-control" id="inputEmail" type="text" required name="nama_lengkap" placeholder="nama lengkap" />
                                            </div>
                                            <div class=" mb-3">
                                                <label for="inputEmail">email</label>
                                                <input class="form-control" id="inputEmail" type="text" required name="email" placeholder="masukkan email" />
                                            </div>
                                            
                                            <div class=" mb-3">
                                            <label>username</label>
                                                <input class="form-control"  type="username" required name="username" placeholder="masukkan username" />
                                                
                                            </div>
                                            <div class=" mb-3">
                                                <label for="inputEmail">alamat</label>
                                                <input class="form-control" id="inputEmail" type="text" required  name="alamat" placeholder="masukkan alamat" />
                                            </div>
                                            <div class=" mb-3">
                                            <label for="inputPassword">Password</label>
                                                <input class="form-control" id="inputPassword" type="password" required name="password" placeholder="Password" />
                                                
                                            </div>
                                            <div >
                                                <label for="">level</label>
                                                <div style="display: flex; flex-direction: row; gap: 15px;">
                                                    <div>
                                                        <input type="checkbox" value="peminjam" id="peminjam" name="peminjam">
                                                        <label for="peminjam">peminjam</label>
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" value="admin" id="admin" name="admin">
                                                        <label for="admin">admin</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column gap-2 align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary w-100" type="submit" name="Register" value="Register">Register</button>
                                            </div>
                                            <p class="mt-3">Sudah punya akun? <a href="login.php">login</a></p>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            &copy; 2024 perpustakaan digital.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>