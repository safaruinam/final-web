<?php
include 'fungsi_destinasi.php';

if(isset($_POST['aksi'])){
    if($_POST['aksi'] == "add"){
        $berhasil = tambah_data($_POST, $_FILES);

        if($berhasil){
            $_SESSION['hasil'] = "Data berhasil ditambahkan,success";
            header("location: tabel_destinasi.php");
        } else {
            echo $berhasil;
        } 
    
    } else if($_POST['aksi'] == "edit"){

        $berhasil = ubah_data($_POST, $_FILES);
        
        if($berhasil){
            $_SESSION['hasil'] = "Data berhasil diperbarui,success";
            header("location: tabel_destinasi.php");
        } else {
            echo $berhasil;
        }
    }
}


if(isset($_GET['hapus'])){

    $berhasil = hapus_data($_GET);

    if($berhasil){
        header("location: tabel_destinasi.php");
    } else {
        echo $berhasil;
    }
}

?>
