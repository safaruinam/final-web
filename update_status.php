<?php
include 'connect.php';

$id_pembeli = $_POST['id_pembeli'];

// ubah status di database
$query = "UPDATE transaksi SET status='perjalanan selesai' WHERE id_pembeli='$id_pembeli'";
$result = mysqli_query($conn, $query);

// kembali ke halaman sebelumnya
header('Location: dashboard.php');

?>

<?php

$id_penyewa = $_POST['id_penyewa'];

$query = "UPDATE sewa SET status='dikembalikan' WHERE id_penyewa='$id_penyewa'";
$result = mysqli_query($conn, $query);

// kembali ke halaman sebelumnya
header('Location: dashboard.php');

?>
