<?php

$servername = "localhost";
$dbname="reservation_ressource";
$username = "root";
$password = "";

// Create connection
$conn = new pdo ("mysql:host=$servername;dbname=$dbname","$username","");

// Check connection
if (!$conn) {
  Echo ("Connection failed");
}
//   $req = "select * from ressources";
  $ress=$conn->query($req);


  session_start();

  if(isset($_SESSION["ID"]))
  {
    session_destroy();
    header("location:login.php");
  }

?>

