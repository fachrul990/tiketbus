<?php
require "config.php";
session_start();

if ($_SESSION['status_login'] != true) {
    header("Location: login.php");
}
$query = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin='" . $_SESSION['id'] . "' ");
$data = mysqli_fetch_object($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Profil</title>
</head>

<body>
    <!-- Header -->
    <?php
    include 'navbar.php';
    ?>
    <!-- Content -->
    <section>
        <div class="container">
            <h3 class="mt-3">Profil</h3>
            <form action="" method="POST">
                <div class="form-group row">
                    <label for="inputName" class="my-2 col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control my-2" id="inputName" placeholder="Nama Lengkap" value="<?= $data->nama_admin ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputUsername" class="my-2 col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control my-2" id="inputUsername" name="user" placeholder="Username" value="<?= $data->username ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="my-2 col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control my-2" id="inputEmail" name="email" placeholder="Email" value="<?= $data->email_admin ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 my-2">
                        <button type="submit" name="submit" class="btn btn-primary">Ubah Profil</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $nama = $_POST['nama'];
                $user = $_POST['user'];
                $email = $_POST['email'];

                $update = mysqli_query($conn, "UPDATE admin SET 
                                     nama_admin = '" . $nama . "',
                                     username = '" . $user . "',
                                     email_admin = '" . $email . "' 
                                     WHERE id_admin= '" . $data->id_admin . "' ");
                if ($update) {
                    echo "<script>alert('Data berhasil diperbarui');window.location='profil.php'</script>";
                } else {
                    echo "<script>alert('Data gagal diperbarui')</script>";
                }
            }
            ?>
        </div>

        <div class="container">
            <h3 class="mt-3">Ubah Password</h3>
            <form action="" method="POST">
                <div class="form-group row">
                    <label for="inputPass1" class="my-2 col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                        <input class="form-control my-2" id="inputPass1" type="password" name="pass1" placeholder="Password Baru" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPass2" class="my-2 col-sm-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                        <input class="form-control my-2" id="inputPass2" type="password" name="pass2" placeholder="Konfirmasi Password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 my-2">
                        <button type="submit" name="ubah_pass" class="btn btn-primary">Ubah Password</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST['ubah_pass'])) {
                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];

                if ($pass1 != $pass2) {
                    echo "<script>alert('Konfirmasi Password Baru Tidak Sesuai')</script>";
                } else {
                    $update_pass = mysqli_query($conn, "UPDATE admin SET 
                                     password = '" . MD5($pass1) . "'
                                     WHERE id_admin= '" . $data->id_admin . "' ");
                    if ($update_pass) {
                        echo "<script>alert('Password berhasil diperbarui');window.location='profil.php'</script>";
                    } else {
                        echo 'gagal' . mysqli_error($conn);
                    }
                }
            }

            ?>

        </div>
        </div>
    </section>
</body>

</html>