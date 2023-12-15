<?php
include 'connect.php';

function tambah_data($data, $files)
{
    $namaProduk = $data['nama_produk'];
    $hargaProduk = $data['harga_sewa'];

    $split = explode('.', $files['g_produk']['name']);
    $ekstensi = $split[count($split) - 1];

    $gambarProduk = $namaProduk.'.'.$ekstensi;

    $dir = "images/";
    $tmpFile = $files['g_produk']['tmp_name'];

    move_uploaded_file($tmpFile, $dir.$gambarProduk);

    $query = "INSERT INTO produk VALUES(null, '$gambarProduk', '$namaProduk', '$hargaProduk')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data, $files)
{
    $id = $data['id_produk'];
    $nama_produk = $data['nama_produk'];
    $harga_sewa = $data['harga_sewa'];

    $queryShow = "SELECT * FROM produk WHERE id_produk = '$id';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if ($files['g_produk']['name'] == "") {
        $gambarProduk = $result['g_produk'];
    } else {

        $split = explode('.', $files['g_produk']['name']);
        $ekstensi = $split[count($split) - 1];

        $gambarProduk = $result['g_produk'] . '.' . $ekstensi;
        unlink("images/" . $result['g_produk']);
        move_uploaded_file($files['g_produk']['tmp_name'], 'images/' . $gambarProduk);
    }

    $query = "UPDATE produk SET  g_produk = '$gambarProduk', nama_produk='$nama_produk', harga_sewa='$harga_sewa' WHERE id_produk='$id';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $id = $data['hapus'];

    $queryShow = "SELECT * FROM produk WHERE id_produk = '$id';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("images/" . $result['g_produk']);

    $query = "DELETE FROM produk WHERE id_produk = '$id';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

?>
