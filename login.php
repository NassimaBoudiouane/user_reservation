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
session_start();
// session_destroy();

// if(isset($_SESSION["ID"]))
// {
//   if ($_SESSION["Group_id"]==1) {

//     header("location:Dashboard.php");
    
// }
// else{

//     header("location:users.php");
// }  
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="login.js"></script>
    <title>login</title>
</head>
<body>
  <marquee behavior="" direction=""> </marquee>
    <form autocomplete='off' class='form'  method="post" action="verifier.php">
        <div class='control'>
          <h1>
              Connexion 
          </h1>
        </div>
        <div class='control block-cube block-input'>
          <input name='Email' placeholder='Email' type='email' required>
            <div class='bg-top'>
                <div class='bg-inner'></div>
             </div>
            <div class='bg-right'>
              <div class='bg-inner'></div>
            </div>
            <div class='bg'>
              <div class='bg-inner'></div>
            </div>
          </div>
          <div class='control block-cube block-input'>
            <input name='password' placeholder='Password' type='password'required>
            <div class='bg-top'>
              <div class='bg-inner'></div> 
            </div>
            <div class='bg-right'>
              <div class='bg-inner'></div>
            </div>
            <div class='bg'>
              <div class='bg-inner'></div>
            </div>
          </div>
          <button class='btn block-cube block-cube-hover' type='submit' click="myFunction" id="btn1">
            <div class='bg-top'>
              <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
              <div class='bg-inner'></div>
            </div>
            <div class='bg'>
              <div class='bg-inner'></div>
            </div>
            <div class='text'>
                 Connecter
            </div>
          </button>
          <div class='credits' >
            <a href='CreerCompte.php' target='_blank' style=" visibility:visible;">
              Créer Compte
            </a>
          </div>  

          <?php
           if (isset($_GET['errors'])){
            echo 'ce compte n\'existe pas ';
            }
            
             ?> 
      </form>
     

</body>
</html>