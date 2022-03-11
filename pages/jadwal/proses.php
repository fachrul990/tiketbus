<?php
require "../../config.php";
session_start();
$id_admin = $_SESSION['id'];

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'add') {
        $tujuan = $_POST['tujuan'];
        $jam = $_POST['jam'];

        $query = "INSERT INTO jadwal VALUES(
                    null,
                    '$tujuan',
                    '$jam',
                    '$id_admin')";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            echo '<script>alert("Tambah data berhasil")</script>';
            echo '<script>window.location="jadwal.php"</script>';
        } else {
            echo 'gagal ' . mysqli_error($conn);
        }
    } else if ($_POST['aksi'] == 'update') {
        $tujuan = $_POST['tujuan'];
        $jam = $_POST['jam'];
        $id_jadwal = $_POST['id_jadwal'];

        $query = "UPDATE jadwal SET
                    tujuan= '$tujuan',
                    jam= '$jam'
                    WHERE id_jadwal = '$id_jadwal'";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            echo '<script>alert("Edit data berhasil")</script>';
            echo '<script>window.location="jadwal.php"</script>';
        } else {
            echo 'gagal ' . mysqli_error($conn);
        }
    }
}
if (isset($_GET['delete'])) {
    $idj = $_GET['delete'];
    $query = "DELETE FROM jadwal WHERE id_jadwal = '$idj'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        echo '<script>alert("Hapus data berhasil")</script>';
        echo '<script>window.location="jadwal.php"</script>';
    } else {
        echo 'gagal ' . mysqli_error($conn);
    }
}
