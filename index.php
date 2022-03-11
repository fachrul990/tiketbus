<?php
session_start();

if ($_SESSION['status_login'] != true) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>tiketbus</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <h1 class="text-center mt-3"><?php echo "Selamat Datang, " . $_SESSION['nama'] . "!" . ""; ?></h1>
</body>

</html>