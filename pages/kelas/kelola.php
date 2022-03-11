<?php
require "../../config.php";
session_start();
$nk = "";
$jk = "";

if ($_SESSION['status_login'] != true) {
    header("Location: ../../login.php");
}
if (isset($_GET['edit'])) {
    $id_kelas = $_GET['edit'];
    $query = "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    $nk = $result['nama_kelas'];
    $jk = $result['jumlah_kursi'];
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
    <title>Kelas Bus</title>
</head>

<body>
    <!-- HEADER -->
    <?php
    include '../../navbar.php';
    ?>
    <!-- CONTENT -->
    <div class="container">
        <h3 class="mt-3">Data Kelas Bus</h3>
        <form action="proses.php" method="POST">
            <input type="hidden" value="<?= $id_kelas; ?>" name="id_kelas">
            <div class="form-group row">
                <label for="input1" class="my-2 col-sm-2 col-form-label">Nama Kelas</label>
                <div class="col-sm-10">
                    <input type="text" name="nk" class="form-control my-2" id="input1" placeholder="Nama Kelas" value="<?= $nk; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="input2" class="my-2 col-sm-2 col-form-label">Jumlah Kursi</label>
                <div class="col-sm-10">
                    <input type="text" name="jk" class="form-control my-2" id="input2" placeholder="Jumlah Kursi" value="<?= $jk; ?>" required>
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
                    <a href="kelas.php" class="btn btn-danger">Kembali</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>