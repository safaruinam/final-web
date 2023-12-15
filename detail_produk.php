<?php

session_start();
include 'connect.php';

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

$id_produk = $_GET['id'];
$ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$result = $ambil->fetch_assoc();

if (isset($_POST['sewa'])) {

   $id_penyewa = $_SESSION["id"];
   $id_produk = $result['id_produk'];
   $ambil = $_POST['ambil'];
   $kembali = $_POST['kembali'];

   //id_sewa | id_perlengkapan | id_pembeli | ambil_barang | kembali_barang | status
   $query = "INSERT INTO sewa VALUES(null, '$id_produk', '$id_penyewa', '$ambil', '$kembali', 'diambil')";
   $hasil = mysqli_query($conn, $query);

   if ($hasil) {
      header("location: profil.php");
   } else {
      echo $hasil;
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Detail Produk | HealingQu</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="images/logo.svg">

</head>

<body style=" background-color: #F5F5F5;">

   <!-- header section starts  -->
   <section class="header" id="header">

      <a href="index.php" class="logo">
         <img src="images/logo.svg" alt="" />
      </a>

      <nav class="navbar">
         <a href="index.php" class="Btn">Home</a>
         <a href="package.php" class="Btn">Destinasi</a>
         <a href="sewa.php" class="Btn">Perlengkapan</a>
         <a href="about.php" class="Btn">About</a>
      </nav>

      <div class="search-form">
         <input type="search" id="search-box" placeholder="cari..." />
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


   <section class="flex-container">
      <div class="flex-item-left">
         <img src="images/<?php echo $result['g_produk']; ?>" alt="">
      </div>
      <div class="flex-item-right">
         <h2><?php echo $result['nama_produk']; ?></h2>
         <p><i class="fas fa-star"></i> 4 - Disewa 10x</p>
         <h1>Rp<?php echo number_format($result['harga_sewa']); ?><span>/Hari</span></h1>
         <div class="sewa">
            <form action="" method="post" class="book-form">
               <h1 class="title">Tentukan Tanggal Penyewaan</h1>
               <div class="flex">
                  <div class="inputBox">
                     <span>Tanggal Sewa :</span>
                     <input type="date" name="ambil" min="<?php echo date("Y-m-d", strtotime("+1 day")); ?>">
                  </div>
                  <div class="inputBox">
                     <span>Tanggal pengembalian :</span>
                     <input type="date" name="kembali" min="<?php echo isset($_POST['ambil']) ? $_POST['ambil'] : date("Y-m-d", strtotime("+2 day")); ?>">
                  </div>
               </div>
               <input type="submit" value="Sewa" class="btnSewa" name="sewa">
            </form>
         </div>
      </div>
   </section>

   <section class="footer">

      <div class="box-container">

         <div class="box">
            <h3>Link Menu</h3>
            <a href="index.php"> <i class="fas fa-angle-right"></i> Home</a>
            <a href="about.php"> <i class="fas fa-angle-right"></i> Destinasi</a>
            <a href="package.php"> <i class="fas fa-angle-right"></i> Sewa</a>
            <a href="sewa.php"> <i class="fas fa-angle-right"></i> Tentang Kami</a>
         </div>

         <div class="box">
            <h3>Extra Links</h3>
            <a href="#"> <i class="fas fa-angle-right"></i> Ajukan Pertanyaan</a>
            <a href="#"> <i class="fas fa-angle-right"></i> Tentang Kami</a>
            <a href="#"> <i class="fas fa-angle-right"></i> Kebijakan Privasi</a>
            <a href="#"> <i class="fas fa-angle-right"></i> Syarat Penggunaan</a>
         </div>

         <div class="box">
            <h3>Kontak Info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +6281342777152 </a>
            <a href="#"> <i class="fas fa-phone"></i> +62895423468666 </a>
            <a href="#"> <i class="fas fa-envelope"></i> safar.alam79@gmail.com </a>
            <a href="#"> <i class="fas fa-map"></i> Makassar, Indonesia - +62 </a>
         </div>

         <div class="box">
            <h3>Follow Kami</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> Facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> Twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> Linkedin </a>
         </div>

      </div>

      <div class="credit"> Created by <span>SAPARUDDIN</span> | All Rights Reserved! </div>

   </section>

   <!-- swiper js link  -->
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>
   <script>
      const ambilInput = document.querySelector('input[name="ambil"]');
      const kembaliInput = document.querySelector('input[name="kembali"]');

      ambilInput.addEventListener("change", function() {
         kembaliInput.setAttribute("min", this.value);
      });
   </script>

</body>

</html>