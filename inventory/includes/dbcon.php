<?php
$servername = "localhost";
$usename = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ecom", $usename, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if(!isset($_SESSION["user_level"]))
{
    header("Location: login.php");
}
?>