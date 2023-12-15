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
   <title>Beranda | HealingQu</title>

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

   <!-- home section starts  -->

   <section class="home">

      <div class="swiper home-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide" style="background:url(images/home-slide-11.jpg) no-repeat;">
               <div class="content">
                  <h3>Berkeliling sulsel</h3>
                  <a href="destinasi.php" class="btn-home">Gasss!!!</a>
               </div>
            </div>

            <div class="swiper-slide slide" style="background:url(images/home-slide-22.jpg) no-repeat">
               <div class="content">
                  <h3>menemukan tempat baru</h3>
                  <a href="destinasi.php" class="btn-home">Gasss!!!</a>
               </div>
            </div>

            <div class="swiper-slide slide" style="background:url(images/home-slide-33.jpg) no-repeat">
               <div class="content">
                  <h3>camp dangan tenang</h3>
                  <a href="destinasi.php" class="btn-home">Gasss!!!</a>
               </div>
            </div>

         </div>

         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>

      </div>

   </section>

   <!-- home section ends -->

   <!-- services section starts  -->

   <section class="services">

      <h1 class="heading-title"> PELAYANAN KAMI </h1>

      <div class="box-container">

         <div class="box">
            <img src="images/icon-1.png" alt="">
            <h3>Petualangan</h3>
         </div>

         <div class="box">
            <img src="images/icon-2.png" alt="">
            <h3>Pemandu Wisata</h3>
         </div>

         <div class="box">
            <img src="images/icon-4.png" alt="">
            <h3>Api unggun</h3>
         </div>

         <div class="box">
            <img src="images/icon-6.png" alt="">
            <h3>Sewa Alat Camp</h3>
         </div>

      </div>

   </section>

   <!-- services section ends -->

   <!-- home packages section starts  -->

   <section class="home-packages1">

      <h1 class="heading-title"> TOP DESTINASI </h1>

      <div class="box-container">
         <?php $tigaDes = $conn->query("SELECT * FROM destinasi LIMIT 3"); ?>
         <?php while ($ambildata = $tigaDes->fetch_assoc()) { ?>
            <div class="box">
               <div class="image">
                  <img src="images/<?php echo $ambildata['gambar_d']; ?>" alt="">
               </div>
               <div class="content">
                  <h3><?php echo $ambildata['nama_lokasi']; ?></h3>
                  <!-- <p>Pulau Samalona ini merupakan salah satu objek wisata bahari yang banyak dikunjungi wisatawan lokal maupun mancanegara.</p> -->
                  <a href="destinasi.php" class="btn">Pesan</a>
               </div>
            </div>
         <?php } ?>
      </div>

      <div class="load-more"> <a href="destinasi.php" class="btn-load">Selengkapnya ></a></div>

   </section>

   <!-- home packages section ends -->
   <section class="home-packages2">

      <h1 class="heading-title"> TOP PERLENGKAPAN </h1>

      <div class="box-container">
         <?php $tigaPro = $conn->query("SELECT * FROM produk LIMIT 4"); ?>
         <?php while ($ambildata = $tigaPro->fetch_assoc()) { ?>
            <div class="box">
               <div class="image">
                  <img src="images/<?php echo $ambildata['g_produk']; ?>" alt="">
               </div>
               <div class="content">
                  <h3><?php echo $ambildata['nama_produk']; ?></h3>
                  <a href="sewa.php" class="btn">Sewa</a>
               </div>
            </div>
         <?php } ?>
      </div>

      <div class="load-more"> <a href="sewa.php" class="btn-load">Selengkapnya ></a> </div>

   </section>

   <!-- blogs section starts  -->

   <!-- blogs section ends -->

   <section class="home-offer">
      <div class="content">
         <h3>50% Lebih Murah</h3>
         <p>Biaya murah, Destinasi Lengkap, Perjalanan nyaman, Camping dengan Aman, Perlengkapan Camp berkualitas.</p>
         <a href="destinasi.php" class="btn">Pesan Sekarang</a>
      </div>
   </section>

   <section class="clients">
      <div class="swiper clients-slider">
         <div class="swiper-wrapper">
            <div class="swiper-slide silde"><img src="images/client-logo-1.png" alt=""></div>
            <div class="swiper-slide silde"><img src="images/client-logo-2.png" alt=""></div>
            <div class="swiper-slide silde"><img src="images/client-logo-3.png" alt=""></div>
            <div class="swiper-slide silde"><img src="images/client-logo-4.png" alt=""></div>
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