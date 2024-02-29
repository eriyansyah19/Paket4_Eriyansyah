<?php
include "../koneksi/koneksi.php";
error_reporting(0);
session_start();
if(isset($_SESSION['Username'])) {
    echo "<script>alert('Maaf,anda sudah login. Silahkan logout terlebih dahulu'); window.location.replace('index.php')</script>";
}

if(isset($_POST['submit'])) {
    $Username = $_POST['Username'];
    $Password = md5($_POST['Password']);

    $sql = "SELECT * FROM user WHERE Username='$Username' AND Password='$Password'";
    $result = mysqli_query($koneksi, $sql);

    if ($result->num_rows> 0) {
        $row = mysqli_fetch_assoc($result);

        $level = $row['Level'];
        $_SESSION['Level'] = $level;

        $_SESSION['Username'] = $row['Username'];

        header("Location:index.php");
        echo "<script>alert('Berhasil Masuk')></script>";
    } else {
        echo "<script>alert('Username Atau Password Anda Salah. Silahkan Coba Lagi!')</script>";
    }
}
?>
<body style="background-color:pink">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <link rel="stylesheet" href="../bootstrap-5.3.2-dist new/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3 mt-3">
                                <label for=""class="form-label">Username</label>
                                <input type="Text" name="Username" class="form-control" required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for=""class="form-label">Password</label>
                                <input type="Password" name="Password" class="form-control" required>
                            </div>
                            <center><button name="submit" class="btn btn-primary">Login</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap-5.3.2-dist new/bootstrap.min.js"></script>
    <script src="../bootstrap-5.3.2-dist new/jquery.min.js"></script>
</body>
</html>