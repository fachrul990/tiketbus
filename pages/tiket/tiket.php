<?php
require "../../config.php";
session_start();

if ($_SESSION['status_login'] != true) {
    header("Location: ../../login.php");
}
$tiket = mysqli_query($conn, "SELECT * FROM vw_tiket");

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $tiket = mysqli_query($conn, "SELECT * FROM vw_tiket
                                    WHERE
                                     nama_tiket LIKE '%$keyword%' OR
                                     jam LIKE '$keyword' OR
                                     harga_tiket LIKE '%$keyword'");
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
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <title>Tiket Bus</title>
</head>

<body>
    <!-- Header -->
    <?php
    include '../../navbar.php';
    ?>
    <div class="container">
        <h3 class="mt-3 text-start">Tiket Bus</h3>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <form action="" method="post" class="form-inline d-flex">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" autocomplete="off">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="cari"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama Tiket</th>
                    <th scope="col">Jam Keberangkatan</th>
                    <th scope="col">Harga Tiket</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = mysqli_fetch_assoc($tiket)) {
                ?>
                    <tr>
                        <td><?= $result['nama_tiket']; ?></td>
                        <td><?= $result['jam']; ?></td>
                        <td><?= $result['harga_tiket']; ?></td>
                        <td class="text-center">
                            <a href="proses.php?delete=<?= $result['id_tiket']; ?>" type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tesebut?')"><i class="fas fa-trash"></i></a>
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