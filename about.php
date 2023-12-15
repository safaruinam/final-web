<?php

session_start();
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tentang | HealingQu</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="images/logo.svg">

</head>

<body>

   <!-- header section starts  -->

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
   <!-- header section ends -->

   <div class="heading" style="background:url(images/header-bg-1.png) no-repeat;">
      <h1>Tentang Kami</h1>
   </div>

   <!-- home about section starts  -->

   <section class="home-about">

      <div class="image">
         <img src="images/logo_large.png" alt="">
      </div>

      <div class="content">
         <h3>HealingQu</h3>
         <p>HealingQu adalah penyedia paket perjalanan healing/berkeliling untuk Sulawesi Selatan.
            Layanan yang kami berikan seperti akomodasi, dan Jasa Sewa Alat Camp.
         </p>
         <div class="icons-container">
            <div class="icons">
               <i class="fas fa-hand-holding-usd"></i>
               <span>Harga Terjangkau</span>
            </div>
            <div class="icons">
               <i class="fas fa-headset"></i>
               <span>24/7 Layanan Panduan</span>
            </div>
            <div class="icons">
               <i class="fas fa-map"></i>
               <span>Top Destinasi</span>
            </div>
         </div>
      </div>
   </section>

   <!-- footer section starts  -->

   <section class="footer">

      <div class="box-container">

         <div class="box">
            <h3>Link Menu</h3>
            <a href="index.php"> <i class="fas fa-angle-right"></i> Home</a>
            <a href="about.php"> <i class="fas fa-angle-right"></i> Destinasi</a>
            <a href="destinasi.php"> <i class="fas fa-angle-right"></i> Sewa</a>
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

   <!-- footer section ends -->

   <!-- swiper js link  -->
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>