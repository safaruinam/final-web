<?php

session_start();
include 'connect.php';

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);


$data = mysqli_fetch_array($result);
$_SESSION["id"] = $data["id"];
$_SESSION["foto"] = $data["foto"];
$_SESSION["email"] = $data["email"];
$_SESSION["password"] = $data["password"];

$transaksi = "SELECT transaksi.id_pembeli, users.name, destinasi.nama_lokasi, transaksi.jumlah, transaksi.berangkat, transaksi.kembali, transaksi.status FROM transaksi JOIN users ON transaksi.id_pembeli = users.id JOIN destinasi ON transaksi.id_des = destinasi.id_destinasi WHERE transaksi.id_pembeli = id;";
$ambilDataTransaksi = mysqli_query($conn, $transaksi);

$penyewa = "SELECT sewa.id_penyewa, users.name, produk.nama_produk, sewa.ambil_barang, sewa.kembali_barang, sewa.status FROM sewa JOIN users ON sewa.id_penyewa = users.id JOIN produk ON sewa.id_perlengkapan = produk.id_produk WHERE sewa.id_penyewa = id;";
$ambilDataPenyewa = mysqli_query($conn, $penyewa);
?>


<!DOCTYPE html>
<html lang="en">

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
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="dashboard.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Forms & table Destinasi</label>
                    </li>
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
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

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!--[ Recent Users ] start-->
                                <div class="col-xl-12 col-md-6">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Daftar perjalanan</h5>
                                        </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <?php
                                                        while ($status = mysqli_fetch_assoc($ambilDataTransaksi)) {
                                                        ?>
                                                            <tr class="unread">
                                                                <td><img class="rounded-circle" style="width:40px;" src="assets/img/user/avatar-2.jpg" alt="activity-user"></td>
                                                                <td>
                                                                    <h6 class="mb-1"><?php echo $status['name']; ?></h6>
                                                                    <p class="m-0"></p>
                                                                </td>
                                                                <td>
                                                                    <h6 class="mb-1"><?php echo $status['nama_lokasi']; ?></h6>
                                                                    <p class="m-0"></p>
                                                                </td>
                                                                <td>
                                                                    <h6 class="text-muted"><?php echo $status['jumlah']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i><?php echo $status['berangkat']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i><?php echo $status['kembali']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6 class="text-muted"><?php echo $status['status']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <form action="update_status.php" method="post">
                                                                        <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli = $status['id_pembeli']; ?>">
                                                                        <input type="submit" value="Ubah Status">
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Daftar Penyewa</h5>
                                        </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <?php
                                                        while ($hasil = mysqli_fetch_assoc($ambilDataPenyewa)) {
                                                        ?>
                                                            <tr class="unread">
                                                                <td><img class="rounded-circle" style="width:40px;" src="assets/img/user/avatar-2.jpg" alt="activity-user"></td>
                                                                <td>
                                                                    <h6 class="mb-1"><?php echo $hasil['name']; ?></h6>
                                                                    <p class="m-0"></p>
                                                                </td>
                                                                <td>
                                                                    <h6 class="mb-1"><?php echo $hasil['nama_produk']; ?></h6>
                                                                    <p class="m-0"></p>
                                                                </td>
                                                                <td>
                                                                    <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i><?php echo $hasil['ambil_barang']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i><?php echo $hasil['kembali_barang']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6 class="text-muted"><?php echo $hasil['status']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <form action="update_status.php" method="post">
                                                                        <input type="hidden" name="id_penyewa" value="<?php echo $id_penyewa = $hasil['id_penyewa']; ?>">
                                                                        <input type="submit" value="Ubah Status">
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ Recent Users ] end-->

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