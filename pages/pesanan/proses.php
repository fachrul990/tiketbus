<?php
require "../../config.php";
session_start();
$id_admin = $_SESSION['id'];

if (isset($_GET['delete'])) {
    $ido = $_GET['delete'];
    $query = "DELETE FROM pesanan WHERE id_order = '$ido'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        echo '<script>alert("Hapus data berhasil")</script>';
        echo '<script>window.location="pesanan.php"</script>';
    } else {
        echo 'gagal ' . mysqli_error($conn);
    }
}
