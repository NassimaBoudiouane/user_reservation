<!-- <?php
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
Else {
echo "Connected successfully";
}

// <!-- if ($_POST["password"] === $_POST["confirm_password"]) {
//   // success!
// }
// else {
//   // failed :(
// } -->
?> -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create.css">
    <title>Créer Compte</title>
</head>
<body>

<style>
  .controll input{
  width:25px;
  height: 30px;

}
.controll{
  padding-left: 0;
  margin-top:-7%;
  
  }
</style>
 <fieldset>
<form  action="verifier.php" method="post" class='form'>
        
   <div class="left">
        <div class='control block-cube block-input'>
          <input name='Matricule' placeholder='Matricule' type='text' required>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg1'>
            <div class='bg-inner'></div>
          </div>
        </div>

        <div class='control block-cube block-input'>
          <input name='Cin' placeholder='Cin' type='text'required>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg1'>
            <div class='bg-inner'></div>
          </div>
        </div>

        <div class='control block-cube block-input'>
          <input name='Nom' placeholder='Nom' type='text' required>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg1'>
            <div class='bg-inner'></div>
          </div>
        </div>

        <div class='control block-cube block-input'>
          <input name='Prenom' placeholder='Prenom' type='text' required>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg1'>
            <div class='bg-inner'></div>
          </div>
        </div>

        <div class='control block-cube block-input'>
          <input name='Date_naissance' placeholder='24/04/1990' type='date' required>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg1'>
            <div class='bg-inner'></div>
          </div>
        </div>


        <div class='control block-cube block-input'>
          <input name='Tele' placeholder='Telephone' type='text' required>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg1'>
            <div class='bg-inner'></div>
          </div>
        </div>
</div>

 <div class="right" style="margin-rigth:15px;">
        <div class='control block-cube block-input'>
          <input name='Adresse' placeholder='Adresse' type='text' required>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg1'>
            <div class='bg-inner'></div>
          </div>
        </div>

        <div class='control block-cube block-input'>
          <input name='Ville' placeholder='Ville' type='text' required>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg1'>
            <div class='bg-inner'></div>
          </div>
        </div>

        
           <div class='controll' style="padding-left:10px">
          
        <input type="radio" id="F" name="genre" value="F" style="padding-top:30%;padding-left:40px;">
        <label for="F" style="color: white;font-size:20px">Mme</label>
        <input type="radio" id="H" name="genre" value="M" style="padding-top:30px;padding-left:40px;" >
        <label for="M" style="color: white;font-size:20px">Mr</label>
      </div>
        
        <!-- <div class='control block-cube block-input'>
          <input name='genre' placeholder='genre' type='password'>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg1'>
            <div class='bg-inner'></div>
          </div>
        </div> -->

        <div class='control block-cube block-input'>
          <input name='Email' placeholder='Email' type='email' required>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg1'>
            <div class='bg-inner'></div>
          </div>
        </div>

        <div class='control block-cube block-input'>
        
        <input name='Password' placeholder='Password' type='password'required>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg1'>
            <div class='bg-inner'></div>
          </div>
        </div>

      
</div>
        <div class="bntt" style="margin-bottom: 15%;">
       <button id="btn1" class='btn block-cube block-cube-hover' type='submit' click="myFunction" name="btnenregistrer" style="margin-left: 20%;">
          <div class='bg-top1'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg'>
            <div class='bg-inner'></div>
          </div>
          <div class='text'>
            enregistrer
          </div>
        </button>
        <!-- <button id="btn2" class='btn block-cube block-cube-hover' type='submit' click="myFunction" id="btn1">
            <div class='bg-top1'>
              <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
              <div class='bg-inner'></div>
            </div>
            <div class='bg'>
              <div class='bg-inner'></div>
            </div>
            <div class='text'>
            <a href='login.php' target='_blank'>
            connecter</a>
            </div>
          </button> -->
      </form>
      </div>
      </fieldset> 
  
      
      </body>
</html>