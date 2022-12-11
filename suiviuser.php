
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


$req = "select * from suiviUser";
$ress=$conn->query($req);


?>
<?php include 'head.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- <link rel="stylesheet" href="style.css"> -->
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <link rel="stylesheet" href="user.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard panel</title>
    <style>
    /* .form ::placeholder {
        color: var(--text-color);
        text-align: center;
        font-size:14px;

      } */
      fieldset{
            
    width:55%;
    height: 53%;
    margin-top:-54%;
    margin-left:25%;
    border-radius:10px;
    background-color: var(--panel-color);
    border-color:var(--box1-color);
    position: relative;

}
.inputt input{
  margin-left:40px;
  margin-top:20px;
  width:40%;
  height: 8%;
  text-align:center;
  color:black;
  font-size:16px;
  border-radius:5px;
  border:1px solid #000;
}

.controll input{
  width:20px;
  height: 18px;

}
.controll{
  padding-left: 55%;
  margin-top:-7%;
}
.btn{
       
       color:var(--text-color);
       border:none;
       border-radius:10px;
       width:25%;
       height:30px;
       cursor:pointer;

    }
    #btn1{
      margin-top :5%;
      margin-left :20%;
      background-color: green;
    }
    #btn2{
      margin-top :5%;
      margin-left :10%;
      background-color: blue;
      
    }
   
    .cclose i{
      padding-left: 20px;
    font-size: 24px;
    min-width: 45px;
    height: 100%;
    margin-left:91%;
    align-items: center;
    justify-content: center;
    justify-content: center;
    color:var(--black-light-color);
    }
      
    </style>
</head>
<body>
    <section class="dashboard">
            <div class="top">
                <i class="uil uil-bars sidebar-toggle" ></i>
                <div class="search-box">
                    <i class="uil uil-search" > </i>
                    <input type="text" placeholder="search here.." >
                </div>
            </div>
            <h1 style="color:var(--primary-color);margin-top:80px">USERS</h1>
           
            <!-- <button style="margin-left:5%;margin-top:-50px;"  id="btnadd" name="chercheruser"class='btn block-cube block-cube-hover' type='submit'>
        <div class='text'>
           Rechercher
        </div> -->
            <button id="btnadd" type='submit' onclick="visibility('legend')" >Ajouter</button>
        
      </button>
            <center> <table  cellpadding="3" style="width:100%">
            <tr>        
            <th>ID</th>
            <th>Matricul</th>
            <th>CIN</th>
            <th>Nom</th>
            <th>Prenom </th>
            <th>Date_naissance</th>
            <th>Telephone</th>

            <th>adresse</th>
            <th>Ville</th>
            <th>Genre</th>
            <th>Status</th>
            <th>Email</th>
            <th>PSW</th>
            <th>EEEEEETTTTAAATTE</th>

        </tr>
        <tr>
            <?php while($row=$ress->fetch(PDO::FETCH_ASSOC)){?>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['matricule']; ?></td>
            <td><?php echo $row['cin']; ?></td>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['prenom']; ?></td>

            <td><?php echo $row['date_naissance']; ?></td>
            <td><?php echo $row['Téléphone']; ?></td>
            <td><?php echo $row['Adresse']; ?></td>
            <td><?php echo $row['Ville']; ?></td>
            <td><?php echo $row['genre']; ?></td>
            <td><?php echo $row['Group_id']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['PASW']; ?></td>
            
            <td>
           
                    <button id="Accepter" style="border:none; background-color:var(--box1-color);border-radius:5px;width:40%;height: 23px;"><a href="verifierCreation.php?statut2=<?php echo $row['ID'];?>">accepter</a></button>   
                    <button id="refuser"  style="border:none;border-radius:5px;width:40%; height: 23px;background-color:var(--box3-color)"><a href="verifierCreation.php?statut3=<?php echo $row['ID'];?>">refuser</a></button>        
                    
                   
                    
                </td>
            <button style="border:none; background-color:var(--panel-color);color:var(--text-color);text-decoration:underline;"><a href="verifier.php?IDuser=<?php echo $row['ID'];?>">Supprimer</a></button> </td>       
           
        </tr>
        <?php } ?>

    </table></center>


    <form action="verifier.php" method="post">
    <fieldset id="legend" style="display:none">

<div class="cclose">  <i style="cursor: pointer;" class="uil uil-times-square" onclick="hiding('legend')"></i></div>  
   
<div class="inputt">
      <input name='matricule' placeholder='matricule' type='text' required>
    
      <input name='cin' placeholder='cin' type='text'required>

      <input name='nom' placeholder='nom' type='text' required>

      <input name='prenom' placeholder='prenom' type='text' required>
  
      <input name='date_naissance' value='1990-01-01' type='date'max="1990-01-01"  required>

      <input name='Téléphone' placeholder='Téléphone' type='tel' required>

      <input name='Adresse' placeholder='Adresse' type='text' required>

      <input name='ville' placeholder='ville' type='text' required>

      <input class="number"name='statut' placeholder='statut' type='number'min="0" max="1">

      <input name='email' placeholder='email' type='email'>

      <input name='password' placeholder='password' type='password'>
      <!-- (minlength="8") -->
</div>
      <div class='controll'>
        <input type="radio" id="F" name="genre" value="F">
        <label for="F" style="color: var(--text-color);padding-top:10px;">F</label>
        <input type="radio" id="H" name="genre" value="M">
        <label for="M" style="color: var(--text-color);">M</label>
      </div>
   
  
  <button style="margin-left:40%;"  id="btn1" name="ajouteruser"class='btn block-cube block-cube-hover' type='submit'>
        <div class='text'>
           Ajouter
        </div>

      <!-- <button  id="btn2" class='btn block-cube block-cube-hover' type='submit'>
          <div class='text'>
             Modifier
          </div> -->
        </button>

</fieldset>
</form>

 

   </section>

   
  
    <script src="script.js"></script>
</body>
</html>