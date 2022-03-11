<?php
require "../../config.php";
session_start();

if ($_SESSION['status_login'] != true) {
    header("Location: ../../login.php");
}

$tujuan = '';
$jam = '';

if (isset($_GET['edit'])) {
    $id_jadwal = $_GET['edit'];
    $query = "SELECT * FROM jadwal WHERE id_jadwal = '$id_jadwal'";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    $tujuan = $result['tujuan'];
    $jam = $result['jam'];
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
    <title>Jadwal Bus</title>
</head>

<body>
    <!-- HEADER -->
    <?php
    include '../../navbar.php';
    ?>
    <!-- CONTENT -->
    <div class="container">
        <h3 class="mt-3">Data Jadwal Bus</h3>
        <form action="proses.php" method="POST">
            <input type="hidden" value="<?= $id_jadwal; ?>" name="id_jadwal">
            <div class="form-group row">
                <label for="inputTujuan" class="my-2 col-sm-2 col-form-label">Tujuan</label>
                <div class="col-sm-10">
                    <input type="text" name="tujuan" class="form-control my-2" id="inputTujuan" placeholder="Tujuan" value="<?= $tujuan; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputJam" class="my-2 col-sm-2 col-form-label">Jam</label>
                <div class="col-sm-10">
                    <input type="time" name="jam" class="form-control my-2" id="inputJam" placeholder="Jam" value="<?= $jam; ?>" required>
                </div>
            </div>
            <div class="form-group row mt-3">
                <div class="col-sm-10 my-2">
                    <?php
                    if (isset($_GET['edit'])) {

                    ?>
                        <button type="submit" name="aksi" value="update" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                    <?php
                    } else {
                    ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary"><i class="fas fa-save"></i> Tambahkan</button>
                    <?php
                    };
                    ?>
                    <a href="jadwal.php" class="btn btn-danger">Kembali</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>