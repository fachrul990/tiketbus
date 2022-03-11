<?php
require "../../config.php";
session_start();
if ($_SESSION['status_login'] != true) {
    header("Location: ../../login.php");
}

if (isset($_GET['delete'])) {
    $idt = $_GET['delete'];
    $query = "DELETE FROM vw_tiket WHERE id_tiket = '$idt'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        echo '<script>alert("Hapus data berhasil")</script>';
        echo '<script>window.location="tiket.php"</script>';
    } else {
        echo 'gagal ' . mysqli_error($conn);
    }
}
