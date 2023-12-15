<?php

session_start();
include 'connect.php';

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result);
    $_SESSION["id"] = $data["id"];
    $_SESSION["foto"] = $data["foto"];
    $_SESSION["name"] = $data["name"];
    $_SESSION["email"] = $data["email"];
    $_SESSION["password"] = $data["password"];
}

$tujuanDestinasi = $conn->query("SELECT destinasi.nama_lokasi, transaksi.berangkat, transaksi.kembali, transaksi.status FROM destinasi JOIN transaksi ON destinasi.id_destinasi = transaksi.id_des WHERE transaksi.id_pembeli = '" . $_SESSION["id"] . "'");
$barangDisewa = $conn->query("SELECT produk.nama_produk, sewa.ambil_barang, sewa.kembali_barang, sewa.status FROM produk JOIN sewa ON produk.id_produk = sewa.id_perlengkapan WHERE sewa.id_penyewa = '" . $_SESSION["id"] . "'");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>


    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo.svg">
</head>

<body>

    <section class="header" id="header">

        <a href="index.php" class="logo">
            <img src="images/logo.svg" alt="" />
        </a>

        <nav class="navbar">
            <a href="index.php" class="Btn">Home</a>
            <a href="destinasi.php" class="Btn">Destinasi</a>
            <a href="sewa.php" class="Btn">Perlengkapan</a>
            <a href="about.php" class="Btn">About</a>
        </nav>

        <div class="search-form">
            <input type="search" id="search-box" placeholder="Cari..." />
            <label for="search-box" class="fas fa-search"></label>
        </div>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>

            <div class="fas fa-user" id="login-btn" onclick="toggleMenu()"></div>

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <a href="<?php if (isset($_SESSION['logged_in']) == true) {
                                    echo 'profil.php';
                                } else {
                                    echo 'login.php';
                                } ?>" class="sub-menu-link">
                        <p>Profile</p>
                        <span>></span>
                    </a>
                    <a href="<?php if (isset($_SESSION['logged_in']) == true) {
                                    echo 'logout.php';
                                } else {
                                    echo 'login.php';
                                } ?>" class="sub-menu-link">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
            </a>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>

    </section>

    <section class="profil">
        <div class="data">
            <div>
                <img src="<?php echo !empty($_SESSION['foto']) ? 'images/' . $_SESSION['foto'] : 'assets/img/user/avatar-2.jpg'; ?>" alt="">
            </div>
            <div>
                <h1><?php echo $_SESSION['name']; ?></h1>
                <h5><?php echo $_SESSION['email']; ?></h5>
            </div>
            <div class="keluar">
                <a href="logout.php">
                    <h1>Logout</h1>
                </a>
            </div>
        </div>
        <div class="col-xl-8 col-md-6 m-b-30">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a style="font-size: 15px" class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Destinasi</a>
                </li>
                <li class="nav-item">
                    <a style="font-size: 15px" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Perlengkapan</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show table-responsive" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="font-size: 15px">Tujuan Destinasi</th>
                                <th style="font-size: 15px">Berangkat</th>
                                <th style="font-size: 15px">Kembali</th>
                                <th style="font-size: 15px">Status</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <?php while ($ambildata = $tujuanDestinasi->fetch_assoc()) { ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="m-0"><?php echo $ambildata['nama_lokasi']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0"><?php echo $ambildata['berangkat']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0"><?php echo $ambildata['kembali']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0"><?php echo $ambildata['status']; ?></h6>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="font-size: 15px">Perlengkapan</th>
                                <th style="font-size: 15px">Diambil</th>
                                <th style="font-size: 15px">Dikembalikan</th>
                                <th style="font-size: 15px">Status</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <?php while ($ambildata = $barangDisewa->fetch_assoc()) { ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="m-0"><?php echo $ambildata['nama_produk']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0"><?php echo $ambildata['ambil_barang']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0"><?php echo $ambildata['kembali_barang']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0"><?php echo $ambildata['status']; ?></h6>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>