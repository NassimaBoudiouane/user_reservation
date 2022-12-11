

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
 


  session_start();

  $requete ="select nom,prenom,Email,type_reservation,motif,ressources.intitulé as Salle,etat.intitulé,reservation.ID as IDRES ,date_evenement,heure_debut,heure_fin  FROM reservation INNER JOIN detail_reservation ON detail_reservation.ID_Reservation=reservation.ID Inner join séance on séance.ID=detail_reservation.id_seance INNER JOIN ressources ON ressources.ID=detail_reservation.ID_ressource INNER JOIN users on users.ID=id_users INNER JOIN etat on etat.ID=reservation.id_etat where users.ID= '{$_SESSION['ID']}' order by date_evenement desc";
  $ressult=$conn->query($requete);

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="users.css"> -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>users</title>

    <style>
      .nav{
  /* position: fixed; */
background-color: #522157;
height: 80px;
/* width: 100%; */
display: flex;
align-items: center;
justify-content: space-between;
padding: 0 5%;
}

.nav .accueil{
color: aliceblue;
padding-right: 80%;
margin-left:20px;
text-decoration: none;
font-size: 20px;
transition: all 0.3s ;
}
.nav .logout {
color: aliceblue;
/* padding-right: 86%; */
text-decoration: underline;
font-size: 20px;
transition: all 0.3s;
}
.btnr{
  border-radius:20px;
  background-color:rgb(169, 169, 242);
  font-size:18px;
  color:rgb(35, 35, 57);
  width:20%;
  height:35px;
  margin-top:2%;
  margin-left:80%;
  cursor:pointer;

}
.btnr:hover{
  background-color:rgb(77, 77, 129);
  font-size:18px;
  color:rgb(210, 210, 251);
  width:20%;
  height:35px;
  margin-top:2%;
  margin-left:80%;

}
img{
margin-right:2px;
margin-top: 5px;
object-fit: cover;
border-radius: 50%;
width: 64px;
}
select{
  width:170px;
  height: 27px;
}
.valider{
  margin-left:25px;
  width: 50%;

  padding: 14px 30px;
  background: #c2649a;
  outline: none;
  border: 2px;
  color: black;
  /* border-color:red; */
  letter-spacing: 0.1em;
  font-weight: bold;
  font-family: monospace;
  font-size: 16px;
  border-radius:5px;
}
i{
  color: white;
}

#tablemesreservation td, #tablemesreservation th {
  border: 1px solid #ddd;
  padding: 8px;
}
#tablemesreservation tr:nth-child(even){background-color: #f2f2f2;}

#tablemesreservation tr:hover {background-color: #ddd;}
#tablemesreservation th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #e7d1fc;
  color: black;
}
tr td {
    text-align:center;
    width:15%;  
    padding-top: 8px;
}
#tableseance td, #tableseance th {
  border: 1px solid #ddd;
  padding: 8px;
}
#tableseance tr:nth-child(even){background-color: #f2f2f2;}
#tableseance tr:hover {background-color: #ddd;}
#tableseance th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #e7d1fc;
  color: black;
}
#tablemesreservation tr:hover {background-color: #ddd;}

fieldset {
  width: 30%;
  height: 470px;
  margin-left: 30%;
  margin-bottom: 10%;
  text-align: center;
  border: solid 2px #e4c7b7;
  /* background-color: #522157; */
  border-radius: 10px;
}
.form {
  padding: 20px 15px 24px;
  margin: 0 auto;
  height: 400px;
  width: 450px;
  padding: 20px 15px 24px;
}
/* .cclose{
      width:20px;
      height: 20px;
      background-color: red;
    }
.cclose i{
  margin-top:20%;
      padding-left: 21px;
    font-size: 24px;
    min-width: 45px;
    height: 100%;
    margin-left:91%;
    align-items: center;
    justify-content: center;
    justify-content: center;
    color:var(--black-light-color);
    } */
    </style>
</head>
<body style=" background-color:while">

    <div class="nav">
        <img src="logo1.png" alt="">
        <a href="###" class="accueil"><?php  echo $_SESSION["user_name"]?></a>
        <a href="logout.php" class="logout">logout</a>
    </div>
    <div class="reserver">
        <input type="submit" class="btnr" value="Reserver" onclick="visibility('menu1')"onclick="hiding('menu2')">
    </div>
    <div class="mesreservation">
        <input type="submit" class="btnr" value="Mes Reservation" onclick="visibility('menu2')" onclick="hiding('menu1')">
    </div>


    <!-- <?php $seance ="select heure_debut,heure_fin from séance";
  $resseance=$conn->query($seance); 
  ?>
    <center> <table id="tableseance" border="1" cellpadding="3" style="margin-top:-100px;margin-right:100%;width:30%;border-collapse:collapse;font-family: Arial, Helvetica, sans-serif;" style="display:block; ">
            <tr>        
              <th>heure Debut</th>
              <th>heure fin</th>
        </tr>
        <tr>
            <?php while($row=$resseance->fetch(PDO::FETCH_ASSOC)){?>
              <td><?php  echo $row["heure_debut"]?></td>
              <td><?php  echo $row["heure_fin"]?></td>
        </tr>
        <?php } ?>

    </table></center> -->




<fieldset id="menu1"style="display:none">
<!-- <fieldset id="menu" style="display:none;height: 450px;"> -->
<form autocomplete='off' class='form' action="users.php" method="post" >
<!-- <div class="cclose">  <i style="cursor: pointer;" class="uil uil-times-square" onclick="hiding('legend')"></i></div>   -->



     <label for="salle" style="color: black;font-weight: bold;font-size: 20px;" >Ressources </label>

        <select name="salle" id="" style="margin-left:40px;width: 250px;background-color: #f2f2f2;">
          
        <?php 
          $req = "select * from ressources";
          $ress=$conn->query($req);
          while($row=$ress->fetch(PDO::FETCH_ASSOC)){?>
            <option value="<?php echo $row['ID']; ?>"><?php echo $row['intitulé']; ?></option>
            <?php } ?>
          </select>
        </br>

        </br>
       

        <label for="motif" style="  color: black;font-weight: bold;font-size: 20px;" requered>Motif </label>
          <select name="motif" id="" style="margin-left:86px;width: 250px;background-color: #f2f2f2;">
            
            <option value="CREATION" selected>CREATION</option>
            <option value="REUNION">CORECTION</option>
            <option value="REUNION">Autre</option>
          </select> </br>
          </br>
        
          

        <label for="filiere" style="  color: black;font-weight: bold;font-size: 20px;">Filiere </label>
         <input name="filiere" type="text"requered style="margin-left:80px;width: 245px;"> </br>
          </br>

          <label for="module" style="  color: black;font-weight: bold;font-size: 20px;">Module </label>
         <input name="module" type="text"requered style="margin-left:71px;width: 245px;"> </br>
        </br>

          <label for="effectif" style="  color: black;font-weight: bold;font-size: 20px;">effectif </label>
         <input name="effectif" type="text"requered style="margin-left:79px;width: 245px;"> </br>
          </br>

          <label  for="Date_exame" style="color: black;font-weight: bold;font-size: 20px;">Date Examen</label>
          
          <input id="Date_exame"  name='Date_exame' value="" type='date' min="" style="margin-left:28px;width: 245px;">
          </br>
          </br>
          
          <label  for="Date_reservation" style="color: black;font-weight: bold;font-size: 20px;">Date EVENEMENT</label>
          
          <input id="Date_reservation"  name='Date_reservation' value="" type='date' min="" style="margin-left:5px;width: 245px;">
          </br>
          </br>



          <!-- <label for="heure_D" style="color: black;font-weight: bold;font-size: 20px;margin-rigth:5px;">Date Debut </label>
          <?php
            $date =date("Y-m-d");
          ?>
          <input id="datedebut"  name='dateD'  type='time' required  style="margin-left:40px;width: 140px;">
          
          <select name="seance" id="" style="margin-left:15px;width: 90px;background-color: #f2f2f2 ;">
          
          <?php 
            $reqDATEDEB = "SELECT * FROM séance";
            $ress=$conn->query($reqDATEDEB);
            while($row=$ress->fetch(PDO::FETCH_ASSOC)){?>
              <option value="<?php echo $row['ID']; ?>"><?php echo $row['heure_debut']; ?></option>
              <?php } ?>
            </select>
        

        </br>
          </br>
      
          <label for="heur_f"style="color: black;font-weight: bold;font-size: 20px;">Date fin </label>
          <input id="datefin" name='dateF' type='time'  required style="margin-left:67px;width: 140px;">
        
         
          <select name="seance" id="" style="margin-left:15px;width: 90px;background-color: #f2f2f2;">
          
          <?php 
            $reqDATEFIN = "SELECT * FROM séance ";
            $ress=$conn->query($reqDATEFIN);
            while($row=$ress->fetch(PDO::FETCH_ASSOC)){?>
              <option value="<?php echo $row['ID']; ?>"><?php echo $row['heure_fin']; ?></option>
              <?php } ?>
            </select> -->

        </br></br></br></br>
        <input type="button" name="valider" value="suivant" class="valider" style="margin-left:30px;"onclick="visibility('menu3')" onclick="hiding('menu1')">
        </br>



    </form>   
</fieldset> 
<!-- </fieldset> -->

<fieldset id="menu3"style="display:none">
<form autocomplete='off' class='form' action="verifier.php" method="post" >


<input name="salle" type="hidden" value="<?php echo $_post['salle']?>" style="margin-left:80px;width: 245px;"> </br>
          </br>

</br>

<input name="motif" type="hidden" value="<?php echo $_post['motif']?>" style="margin-left:80px;width: 245px;"> </br>
          </br>
  </br>

         <input name="filiere" type="hidden" value="<?php echo $_post['filiere']?>" style="margin-left:80px;width: 245px;"> </br>
          </br>

         <input name="module" type="hidden" value="<?php echo $_post['module']?>"  style="margin-left:71px;width: 245px;"> </br>
        </br>

         <input name="effectif" type="hidden" value="<?php echo $_post['effectif']?>"  style="margin-left:79px;width: 245px;"> </br>
          </br>

          
          <input id="Date_exame"  name='Date_exame' value="<?php echo $_post['Date_exame']?>"   type='hidden' min="" style="margin-left:28px;width: 245px;">
          </br>
          </br>
          
          
          <input id="Date_reservation"  name='Date_reservation' value="<?php echo $_post['Date_reservation']?>"   type='hidden' min="" style="margin-left:5px;width: 245px;">
         


          <?php
            $date =date("Y-m-d");
          ?>
          <input id="datedebut"  name='dateD'  type='time'  requered style="margin-left:40px;width: 140px;">
          
          
        </br>
          </br>
      
          <input id="datefin" name='dateF' type='time' requered  style="margin-left:67px;width: 140px;">
        
        </br></br></br></br>
        <input type="submit" name="valider" value="suivant" class="valider" style="margin-left:30px;">
        </br>


       
 <?php 
 $requeteselectressources ="select ID from ressources where intitulé='{$_post['salle']}' ";
  $ressulta=$conn->query($requeteselectressources);
  while($ligne=$ressulta->fetch(PDO::FETCH_ASSOC)){
    
 $requetereservation1 ="SELECT séance.`heure_debut`,séance.`heure_fin` FROM `séance` INNER JOIN detail_reservation on detail_reservation.id_seance=séance.ID where detail_reservation.date_evenement = '{$_post['Date_reservation']}' and detail_reservation.ID_ressource={$ligne['ID']};";
  $ressul=$conn->query($requetereservation1);?>
<center> <table id="tablemesreservation" border="1" cellpadding="3" style="margin-top:20px;width:100%;border-collapse:collapse;font-family: Arial, Helvetica, sans-serif;" style="display:block; ">
            <tr>        
            
            <th>heure Debut</th>
            <th>heure fin</th>
        </tr>
        <tr>
            <?php while($row=$ressul->fetch(PDO::FETCH_ASSOC)){?>
            <td><?php echo $row['heure_debut']; ?></td>
            <td><?php echo $row['heure_fin']; ?></td>
            
           <td> <button style="border:none; background-color:var(--panel-color);color:var(--text-color);text-decoration:underline;"><a href="verifier.php?idres=<?php echo $row['IDRES'];?>">valider</a></button>
           </td>       
              <!-- <td> <button style="border:none; background-color:var(--panel-color);color:var(--text-color);text-decoration:underline;">Modifier</button> -->
            
            <!-- </td> -->
        </tr>
        <?php }  
    }?>

    </table></center>

    </form>   
</fieldset> 
<!--------------------------------------------------------------------------------------------- -->
<div id="menu2" style="display:none">
<center> <table id="tablemesreservation" border="1" cellpadding="3" style="margin-top:20px;width:100%;border-collapse:collapse;font-family: Arial, Helvetica, sans-serif;" style="display:block; ">
            <tr>        
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Type Reservation</th>
            <th>motif </th>
            <th>Salle</th>
            <th>Etat</th>
            <th>date reservation</th>
            <th>heure Debut</th>
            <th>heure fin</th>
            <th style="text-align:center;"colspan="2">Action</th>
            

        </tr>
        <tr>
            <?php while($row=$ressult->fetch(PDO::FETCH_ASSOC)){?>
            <td><?php  echo $row["nom"]?></td>
            <td><?php  echo $row["prenom"]?></td>
            <td><?php  echo $row["Email"]?></td>
            <td><?php echo $row['type_reservation']; ?></td>
            <td><?php echo $row['motif']; ?></td>

            <td><?php echo $row['Salle']; ?></td>
            <td style="color:red;"><?php echo $row['intitulé']; ?></td>
            <td><?php echo $row['date_evenement']; ?></td>
            <td><?php echo $row['heure_debut']; ?></td>
            <td><?php echo $row['heure_fin']; ?></td>
            
           <td> <button style="border:none; background-color:var(--panel-color);color:var(--text-color);text-decoration:underline;"><a href="verifier.php?idres=<?php echo $row['IDRES'];?>">Annuler</a></button>
           </td>       
              <!-- <td> <button style="border:none; background-color:var(--panel-color);color:var(--text-color);text-decoration:underline;">Modifier</button> -->
            
            <!-- </td> -->
        </tr>
        <?php } ?>

    </table></center>
  </div>


<!-- ------------------------------------------------------------------------------------------->
<script>
    function visibility(id)
{
   var e = document.getElementById(id);

    if(e.style.display == 'block')

        e.setAttribute('style','display: none;');

    else

        e.setAttribute('style','display: block;');
}

function hiding(id) {

var e = document.getElementById(id);

if(e.style.display == 'none')

    e.setAttribute('style','display: none;');

else

    e.setAttribute('style','display: none;');

}

function  myFunction()

{

    var date = document.getElementById("Date_reservation").value;

    var dateD = document.getElementById("datedebut");
    var dateF = document.getElementById("datefin");

    dateD.setAttribute("value",date);
    dateF.setAttribute("value",date);

}

document.getElementById("Date_reservation").addEventListener("input", myFunction);
</script>


</body>
</html>