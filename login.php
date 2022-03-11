<?php
require "config.php";
session_start();
if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $check = mysqli_query($conn, "SELECT * FROM admin WHERE username='" . $user . "' AND password='" . MD5($pass) . "'");
    if (mysqli_num_rows($check) > 0) {
        $data = mysqli_fetch_object($check);
        $_SESSION['status_login'] = true;
        $_SESSION['admin'] = $data;
        $_SESSION['nama'] = $data->nama_admin;
        $_SESSION['id'] = $data->id_admin;
        echo "<script>alert('Login Berhasil!');window.location.href='jadwal.php'</script>";
    } else {
        echo "<script>alert('Username atau Password Anda Salah')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/f0a83601e3.js" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Login | Tiketbus</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h1 class="card-title text-center mb-5 fw-light fs-1">Login</h1>
                        <form action="" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="user" placeholder="Username" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="submit" value="Login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>