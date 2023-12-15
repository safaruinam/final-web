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

$id_destinasi = $_GET['id'];
$ambil = $conn->query("SELECT * FROM destinasi WHERE id_destinasi='$id_destinasi'");
$result = $ambil->fetch_assoc();

if (isset($_POST['beli'])) {

   $id_pembeli = $_SESSION["id"];
   $id_destinasi = $result['id_destinasi'];
   $paket = $_POST['paket'];
   if ($paket == 'solo') {
      $jtkt = 1;
   }
   $jtkt = $_POST['jumlah_tiket'];
   if (!$jtkt || $jtkt == 0) {
      $jtkt = 1;
   }
   $pergi = $_POST['pergi'];
   $pulang = $_POST['pulang'];

   $query = "INSERT INTO transaksi VALUES(null, '$id_destinasi', '$id_pembeli', '$paket', '$jtkt', '$pergi', '$pulang', 'belum berangkat')";
   $hasil = mysqli_query($conn, $query);

   if ($hasil) {
      header("location: profil.php");
      //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
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
   <title>Detail Destinasi | HealingQu</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="images/logo.svg">
</head>

<body style="background-color: #E6EAED;">

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

   <section class="lokasi">
      <div class="detail">
         <h2><?php echo $result['nama_lokasi']; ?></h2>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
         </div>
         <div class="img-destinasi"><img src="images/<?php echo $result['gambar_d']; ?>" alt=""></div>
         <p><?php echo $result['detail']; ?></p>
         <h3>Rp <?php echo number_format($result['harga']); ?></h3>
      </div>
      <div class="info-lokasi">
         <h2>Info Lokasi</h2>
         <div class="map">
            <?php echo $result['maps']; ?>
         </div>
         <div class="booking">
            <h1 class="title">Ayo Segera Gaskan!!!</h1>
            <form action="" method="POST" class="book-form" onsubmit="return validateForm()">
               <div class="flex">
                  <div class="inputBox">
                     <span>Pilih Paket :</span><br>
                     <p>*Paket Squad minimal pembelian tiket 4</p>
                     <select name="paket" class="box" required onchange="handleSelectChange(event)">
                        <option value="" disabled selected>Paket</option>
                        <option value="solo">Solo</option>
                        <option value="squad">Squad</option>
                     </select>
                  </div>
                  <div class="inputBox" id="jumlahTiketBox">
                     <span>Jumlah Tiket :</span>
                     <input type="number" placeholder="Masukkan jumlah tiket" name="jumlah_tiket" min="4" max="999" onkeypress="if(this.value.length == 3) return false;">
                  </div>
                  <div class="inputBox">
                     <span>Tanggal Berangkat :</span>
                     <input type="date" name="pergi" min="<?php echo date("Y-m-d", strtotime("+1 day")); ?>">
                  </div>
                  <div class="inputBox">
                     <span>Tanggal Kembali :</span>
                     <input type="date" name="pulang" min="<?php echo isset($_POST['pergi']) ? $_POST['pergi'] : date("Y-m-d", strtotime("+2 day")); ?>">
                  </div>
               </div>
               <div class="beli">
                  <input type="submit" value="Beli" class="btn" name="beli">
               </div>
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
      const ambilInput = document.querySelector('input[name="pergi"]');
      const kembaliInput = document.querySelector('input[name="pulang"]');

      ambilInput.addEventListener("change", function() {
         kembaliInput.setAttribute("min", this.value);
      });

      function handleSelectChange(event) {
         const paket = event.target.value;
         const jumlahTiketBox = document.getElementById('jumlahTiketBox');
         if (paket === 'solo') {
            jumlahTiketBox.style.display = 'none';
         } else {
            jumlahTiketBox.style.display = 'block';
         }
      }
   </script>

</body>

</html>