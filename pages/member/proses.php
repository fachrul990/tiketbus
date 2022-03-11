<?php
require "../../config.php";
session_start();
$id_admin = $_SESSION['id'];


if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'add') {
        $nama_member = $_POST['nama_member'];
        $email = $_POST['email'];

        $query = "INSERT INTO member VALUES(
                    null,
                    '$nama_member',
                    '$email')";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            echo '<script>alert("Tambah data berhasil")</script>';
            echo '<script>window.location="member.php"</script>';
        } else {
            echo 'gagal ' . mysqli_error($conn);
        }
    } else if ($_POST['aksi'] == 'update') {
        $nama_member = $_POST['nama_member'];
        $email = $_POST['email'];
        $id_member = $_POST['id_member'];

        $query = "UPDATE member SET
                    nama_member= '$nama_member',
                    email= '$email'
                    WHERE id_member = '$id_member'";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            echo '<script>alert("Edit data berhasil")</script>';
            echo '<script>window.location="member.php"</script>';
        } else {
            echo 'gagal ' . mysqli_error($conn);
        }
    }
}
if (isset($_GET['delete'])) {
    $idm = $_GET['delete'];
    $query = "DELETE FROM member WHERE id_member = '$idm'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        echo '<script>alert("Hapus data berhasil")</script>';
        echo '<script>window.location="member.php"</script>';
    } else {
        echo 'gagal ' . mysqli_error($conn);
    }
}
