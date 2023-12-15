<?php
session_start();
include 'connect.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = sha1($_POST['pass']);
   $cpass = sha1($_POST['cpass']);

   $query = "SELECT * FROM users WHERE email = '$email'";
   $result = mysqli_query($conn, $query);

   if(mysqli_num_rows($result) > 0){
      $message[] = 'email sudah terdaftar!';
   }else{
      if($pass != $cpass){
         $message[] = 'masukkan password yang sama!';
      }else{
         $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$cpass')";
         $result = mysqli_query($conn, $query);

         if($result){
            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$cpass'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) > 0){
               $message[] = 'pendaftaran berhasil, silahkan Masuk';
            }else{
               $message[] = 'pendaftaran gagal, silahkan coba lagi';
            }
         }
      }
   }
}
?>  

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Daftar | HealingQu</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="images/logo.svg">

</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>



<div class="video-container">
   <video src="images/vid-1.mp4" id="video-slider" loop autoplay muted></video>
</div> 

<!-- register section starts  -->

<div class="regis-form-container">

   <form action="" method="POST">
      <h3>daftar</h3>
      <div class="inputBox">
         <input type="text" required maxlength="20" placeholder="Masukkan Nama" class="box" name="name">
      </div>
      <div class="inputBox">
         <input type="email" required maxlength="50" placeholder="Masukkan Email" class="box" name="email">
      </div>
      <div class="inputBox">
         <input type="password" id="pass" name="pass" required minlength="8" maxlength="50" placeholder="Masukkan Kata sandi" onmouseover="showPassword()" onmouseout="hidePassword()" class="box">
      </div>
      <div class="inputBox">
         <input type="password" id="cpass" required minlength="8" maxlength="50" placeholder="Kofirmasi Kata sandi" onmouseover="showPassword()" onmouseout="hidePassword()" class="box" name="cpass">
      </div>
      <input type="submit" value="Daftar" name="submit" class="btn">
      <p>Sudah punya akun? <a href="login.php">Masuk</a></p>
   </form>

</div>

<!-- register section ends -->
   <!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>
