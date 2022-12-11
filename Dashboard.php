
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
// Else {
// echo "Connected successfully";
// }

//
// if (isset($_GET['errors'])){
//   echo 'ce compte n eseste pas ';
// }



?>
<?php include 'head.php'?>
<?php include 'body.php'?>

