<?php
require "../../config.php";
session_start();
if ($_SESSION['status_login'] != true) {
    header("Location: ../../login.php");
}
$id_admin = $_SESSION['id'];
$id_kelas = $_GET['id'];

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'add') {
        $nk = $_POST['nk'];
        $jk = $_POST['jk'];

        $query = "INSERT INTO kelas VALUES(
                    null,
                    '$nk',
                    '$jk',
                    '$id_admin')";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            echo '<script>alert("Tambah data berhasil")</script>';
            echo '<script>window.location="kelas.php"</script>';
        } else {
            echo 'gagal ' . mysqli_error($conn);
        }
    } else if ($_POST['aksi'] == 'update') {
        $nk = $_POST['nk'];
        $jk = $_POST['jk'];
        $id_kelas = $_POST['id_kelas'];

        $query = "UPDATE kelas SET
                    nama_kelas= '$nk',
                    jumlah_kursi= '$jk'
                    WHERE id_kelas = '$id_kelas'";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            echo '<script>alert("Edit data berhasil")</script>';
            echo '<script>window.location="kelas.php"</script>';
        } else {
            echo 'gagal ' . mysqli_error($conn);
        }
    }
}
if (isset($_GET['delete'])) {
    $idk = $_GET['delete'];
    $query = "DELETE FROM kelas WHERE id_kelas = '$idk'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        echo '<script>alert("Hapus data berhasil")</script>';
        echo '<script>window.location="kelas.php"</script>';
    } else {
        echo 'gagal ' . mysqli_error($conn);
    }
}
