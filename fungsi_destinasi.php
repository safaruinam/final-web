<?php
include 'connect.php';

function tambah_data($data, $files)
{
    $namaDestinasi = $data['nama_lokasi'];
    $deskripsi = $data['detail'];
    $maps = $data['maps'];
    $harga = $data['harga'];

    $split = explode('.', $files['gambar_d']['name']);
    $ekstensi = $split[count($split) - 1];

    $gambarDestinasi = $namaDestinasi . '.' . $ekstensi;

    $dir = "images/";
    $tmpFile = $files['gambar_d']['tmp_name'];

    move_uploaded_file($tmpFile, $dir . $gambarDestinasi);

    $query = "INSERT INTO destinasi VALUES(null, '$gambarDestinasi', '$namaDestinasi', '$deskripsi', '$harga', '$maps')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data, $files)
{
    $id = $data['id_destinasi'];
    $nama_lokasi = $data['nama_lokasi'];
    $deskripsi = $data['detail'];
    $harga = $data['harga'];
    $maps = $data['maps'];

    $queryShow = "SELECT * FROM destinasi WHERE id_destinasi = '$id';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if ($files['gambar_d']['name'] == "") {
        $gambarDestinasi = $result['gambar_d'];
    } else {

        $split = explode('.', $files['gambar_d']['name']);
        $ekstensi = $split[count($split) - 1];

        $gambarDestinasi = $result['nisn'] . '.' . $ekstensi;
        unlink("images/" . $result['gambar_d']);
        move_uploaded_file($files['gambar_d']['tmp_name'], 'images/' . $gambarDestinasi);
    }

    $query = "UPDATE destinasi SET  gambar_d = '$gambarDestinasi', nama_lokasi='$nama_lokasi', detail='$deskripsi', harga='$harga', maps='$maps' WHERE id_destinasi='$id';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}


function hapus_data($data)
{
    $id = $data['hapus'];

    $queryShow = "SELECT * FROM destinasi WHERE id_destinasi = '$id';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("images/" . $result['gambar_d']);

    $query = "DELETE FROM destinasi WHERE id_destinasi = '$id';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

?>

