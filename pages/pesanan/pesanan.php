<?php
require "../../config.php";
session_start();

if ($_SESSION['status_login'] != true) {
    header("Location: ../../login.php");
}
$pesanan = mysqli_query($conn, "SELECT A.nama_member, B.tgl_order, B.jam_order, B.status_order, B.id_order
                                FROM member A INNER JOIN pesanan B
                                ON A.id_member = B.id_member");
$order = mysqli_query($conn, "SELECT * FROM pesanan");
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
    <title>Pesanan Tiket</title>
</head>

<body>
    <!-- Header -->
    <?php
    include '../../navbar.php';
    ?>
    <div class="container">
        <h3 class="mt-3 mb-3 text-start">Pesanan Tiket</h3>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama Member</th>
                    <th scope="col">Tanggal Order</th>
                    <th scope="col">Jam Order</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = mysqli_fetch_assoc($pesanan)) {
                ?>
                    <tr>
                        <td><?= $result['nama_member']; ?></td>
                        <td><?= $result['tgl_order']; ?></td>
                        <td><?= $result['jam_order']; ?></td>
                        <td><?= $result['status_order']; ?></td>
                        <td class="text-center">
                            <a href="proses.php?delete=<?= $result['id_order']; ?>" type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tesebut?')"><i class="fas fa-trash"></i></a>
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