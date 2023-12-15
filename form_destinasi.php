<!DOCTYPE html>
<html lang="en">
<?php

session_start();
include 'connect.php';

$id_destinasi = '';
$nama_lokasi = '';
$deskripsi = '';
$harga = '';
$maps = '';

if (isset($_GET['ubah'])) {
    $id_destinasi = $_GET['ubah'];

    $query = "SELECT * FROM destinasi WHERE id_destinasi = '$id_destinasi';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama_lokasi = $result['nama_lokasi'];
    $deskripsi = $result['detail'];
    $harga = $result['harga'];
    $maps = $result['maps'];

    //var_dump($result);
    //die();
}
?>


<head>
    <title>Dashboard | Admin</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template" />
    <meta name="author" content="CodedThemes" />

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="images/logo.svg">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="dashboard.php" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title"><?= $_SESSION['name']; ?></span>
                </a>
                <a class="mobile-menu on" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                        <a href="dashboard.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Forms & table Destinasi</label>
                    </li>
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item active">
                        <a href="form_destinasi.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Form Destinasi</span></a>
                    </li>
                    <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="tabel_destinasi.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Table Destinasi</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Forms & table Perlengkapan</label>
                    </li>
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="form_produk.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Form Perlengkapan</span></a>
                    </li>
                    <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="tabel_produk.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Table Perlengkapan</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="dashboard.php" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title"><?= $_SESSION['name']; ?></span>
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="assets/img/user/avatar-2.jpg" class="img-radius" alt="User-Profile-Image">
                                <span class="b-title"><?= $_SESSION['name']; ?></span>
                            </div>
                            <ul class="pro-body">
                                <li><a href="logout.php" class="dropdown-item"><i class="feather icon-log-out"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Form Destinasi</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="tabel_destinasi.php">Tabel Data Destinasi</a></li>
                                        <li class="breadcrumb-item"><a href="#">Form Destinasi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Crud Destinasi</h5>
                                        </div>
                                        <div class="card-body">
                                            <h5>Form controls</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form method="POST" action="crud_destinasi.php" enctype="multipart/form-data">
                                                        <input type="hidden" value="<?php echo $id_destinasi; ?>" name="id_destinasi">
                                                        <div class="form-group">
                                                            <label for="nama_lokasi">Nama Destinasi</label>
                                                            <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" placeholder="Masukkan Nama Destinasi" value="<?php echo $nama_lokasi; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gambar_d">Gambar Destinasi</label>
                                                            <input <?php if (!isset($_GET['ubah'])) {
                                                                        echo "required";
                                                                    } ?> class="form-control" type="file" name="gambar_d" id="gambar_d" accept="image/*">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="detail">Deskripsi</label>
                                                            <textarea required class="form-control" id="detail" name="detail" rows="3"><?php echo $deskripsi; ?></textarea>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="maps">Lokasi Maps</label>
                                                        <input required type="text" class="form-control" id="maps" name="maps" placeholder="Masukkan lokasi maps" value="<?php echo $maps; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="harga">Harga</label>
                                                        <input required type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan harga" value="<?php echo $harga; ?>">
                                                    </div>
                                                    <div class="float-right">
                                                        <?php
                                                        if (isset($_GET['ubah'])) {
                                                        ?>
                                                            <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                                                                <i class="feather icon-save" aria-hidden="true"></i>
                                                                Simpan
                                                            </button>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <button type="submit" name="aksi" value="add" class="btn btn-primary">
                                                                <i class="feather icon-save" aria-hidden="true"></i>Tambah
                                                            </button>
                                                        <?php
                                                        }
                                                        ?>
                                                        <a href="tabel_destinasi.php" type="button" class="btn btn-danger">
                                                                <i class="fa fa-reply" aria-hidden="true"></i>
                                                                Batal
                                                            </a>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

</body>

</html>