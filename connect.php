<?php

   $host = "localhost";
   $user = "root";
   $password = "";
   $dbname = "travel";

   $conn = mysqli_connect($host, $user, $password, $dbname);

   mysqli_select_db($conn, $dbname);

?>