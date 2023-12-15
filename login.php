<?php

session_start();
include 'connect.php';

if (isset($_POST['submit'])) {
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   $admin = 'admin@gmail.com';
   $pass = sha1($pass);

   $query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";;
   $result = mysqli_query($conn, $query);
   $row = mysqli_fetch_assoc($result);

   if (mysqli_num_rows($result) > 0) {
      if ($row['email'] == $admin) {
         $_SESSION['logged_in'] = true;
         $_SESSION['name'] = $row['name'];
         header("Location: dashboard.php");
      } else {
         $_SESSION['logged_in'] = true;
         $_SESSION['name'] = $row['name'];
         $_SESSION['email'] = $row['email'];
         $_SESSION['foto'] = $row['foto'];
         header("Location: index.php");
      }
   } else {
      $message[] = 'Email atau Password SALAH!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Masuk | HealingQu</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="images/logo.svg">

</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
   ?>

   <!-- register section starts  -->


   <div class="video-container">
      <video src="images/vid-1.mp4" id="video-slider" loop autoplay muted></video>
   </div>

   <div class="login-form-container">

      <!-- <i class="fas fa-times" id="form-close"></i> -->

      <form action="" method="POST">
         <h3>Masuk</h3>
         <div class="inputBox">
            <input type="email" name="email" required oninput="checkEmail(this)" id="username" class="box" placeholder="Masukkan Email" autocomplete="off" autofocus>
         </div>
         <div class="inputBox">
            <input type="password" required maxlength="50" minlength="8" name="pass" id="password" class="box" placeholder="Kata Sandi">
            <div id="toggle" onclick="showHide();"></div>
         </div>
         <input type="submit" value="Masuk" name="submit" class="btn">
         <p>Belum punya akun? <a href="regis.php">Daftar</a></p>
      </form>

   </div>

   <!-- register section ends -->


   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>