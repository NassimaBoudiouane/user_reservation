<?php

$servername = "localhost";

$dbname="reservation_ressource";

$username = "root";

$password = "";

$conn = new pdo ("mysql:host=$servername;dbname=$dbname","$username","");

if(!empty($_GET['Modifier'])){

    $sql = "SELECT * FROM Ressources WHERE ID='{$_GET['Modifier']}'";

    $res=$conn->query($sql);

    $row=$res->fetch(PDO::FETCH_ASSOC);

    // echo "Ressource Modifier avec succès";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>


<body style="background: var( --panel-color);transition:var(--tran-05)">

<style>
  form{
    border:1px solid black;
    /* background-color: red; */
    margin-top:100px;
    margin-bottom:0;
    margin-left:50%;
    width:30%;
    padding-left:75px;
    height: 170px;
    padding-top:15px;
    border-radius:7px;
    
    
    background-color:var( --panel-color);
  }
  body{
    background-color: var( --panel-color);
  }
</style>




  

<form action="verifier.php" method="POST" >

  <label for="id" style="width: 70px"> ID: </label> <input style="margin-left:53px;" type="number" name="id" id="nm" value="<?php echo $row['ID']?>" required><br><br>

  <label for="intitule" style="width: 70px"> Nom: </label> <input style="margin-left:30px;" type="text" name="intitule" id="intitule" value="<?php echo $row['intitulé']?>" required><br><br>

  <button class="btn btn-outline-success" style="margin-left:10px;width:30%;color:var(#CCC);" type="submit" required>Enregistrer</button>

  <input type="hidden" name="IdMod" value=<?php echo $_GET['Modifier']?> >



  <button type="reset" style="margin-left:30px;width:30%;color:var(#CCC)" class="btn btn-outline-danger">Annuler</button>

</form>
</body>
</html>
<?php include("resource.php") ?>

  
