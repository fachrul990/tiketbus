<?php
require "../../config.php";
session_start();

if ($_SESSION['status_login'] != true) {
    header("Location: ../../login.php");
}
$kelas = mysqli_query($conn, "SELECT * FROM kelas");
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
    <title>Kelas Bus</title>
</head>

<body>
    <!-- Header -->
    <?php
    include '../../navbar.php';
    ?>
    <div class="container">
        <h3 class="mt-3 text-start">Kelas Bus</h3>
        <a href="kelola.php" type="button" class="btn btn-primary mt-2 mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Jumlah Kursi</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = mysqli_fetch_assoc($kelas)) {
                ?>
                    <tr>
                        <td><?= $result['nama_kelas']; ?></td>
                        <td><?= $result['jumlah_kursi']; ?></td>
                        <td class="text-center">
                            <a href="kelola.php?edit=<?= $result['id_kelas']; ?>" type="update" class="btn btn-success"><i class="fas fa-pen"></i></a>
                            <a href="proses.php?delete=<?= $result['id_kelas']; ?>" type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tesebut?')"><i class="fas fa-trash"></i></a>
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