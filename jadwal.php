<?php
require "config.php";
session_start();

if ($_SESSION['status_login'] != true) {
    header("Location: loginmember.php");
}
$jadwal = mysqli_query($conn, "SELECT * FROM jadwal");
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
    <title>Jadwal Bus</title>
</head>

<body>
    <!-- Header -->
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <h3 class="mt-3 text-start">Jadwal Bus</h3>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Jam</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = mysqli_fetch_assoc($jadwal)) {
                ?>
                    <tr>
                        <td><?= $result['tujuan']; ?></td>
                        <td><?= $result['jam']; ?></td>
                        <td class="text-center">
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>