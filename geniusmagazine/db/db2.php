<?php
$servername = "localhost";
$username = "root";
$password = "";

  $pdo = new PDO("mysql:host=$servername;dbname=landing_page", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
?>