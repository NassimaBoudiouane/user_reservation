
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


$req = "SELECT reservation.ID,nom,prenom,type_reservation,motif,id_etat,etat.intitulé as intituleETAT FROM `reservation` INNER JOIN users on users.ID=reservation.id_users INNER JOIN etat on etat.ID=reservation.id_etat order by reservation.ID desc ";
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
#btnaddres{
    color: var(--text-color);
    margin-top:40px;
    width:20%;
    cursor:pointer;
    height: 40px; 
    background-color:var(--buttom-add);
    border:none;
    border-radius:10px;
    color: var(--text-color);
    margin-left: 15%;
}
#Accepter:hover{
    background-color:#467981;
   

}
table, td, th {
  border: 1px solid #FFF;
}
table {
    display: flex;
    justify-content: space-between;
    border-collapse: collapse;
    margin-top: 35px;
    flex-direction: column;
    overflow: hidden;
}

tr td {
    text-align:center;
    width:20%; 
  padding-top: 8px;
}
tr{
    text-align: center;
    /* font-size: 16px; */
    color: var(--text-color);
}
td{
    text-align: left;
    /* font-size: 16px; */
    color: var(--text-color);
}

.form ::placeholder {
        color: var(--text-color);
        text-align: center;
        font-size:14px;

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
            <h1 style="color:var(--primary-color);margin-top:80px">RESERVATION</h1>
        
            <!-- <button id="btnaddres" type='submit' onclick="visibility('legend1')"  >Ajouter</button> -->
            
            <center> <table  style="background-color: var(--panel-color);">
            <tr>        
                <th>ID</th>
                <th>Nom Complete</th>
                <th>type</th>
                <th>Motif</th>               
          
                <th>Etat</th>
            </tr>
            <tr>
                <?php while($row=$ress->fetch(PDO::FETCH_ASSOC)){?>
                <td><?php echo $row['ID'];?></td>
                <td><?php echo $row['nom'].' '.$row['prenom']; ?></td>
                <td><?php echo $row['type_reservation']; ?></td>
                <td><?php echo $row['motif'];?></td>
                <td>

                <?php
                    $php=$row['id_etat'];
                    if($php != 1)
                    {
                        $STYLE = "hidden";
                    }else $STYLE="";
                    ?>
                
                    <button id="Accepter"<?php echo $STYLE ?> style="border:none; background-color:var(--box1-color);border-radius:5px;width:40%;height: 23px;"><a href="verifier.php?statut2=<?php echo $row['ID'];?>">accepter</a></button>   
                    <button id="refuser" <?php echo $STYLE ?> style="border:none;border-radius:5px;width:40%; height: 23px;background-color:var(--box3-color)"><a href="verifier.php?statut3=<?php echo $row['ID'];?>">refuser</a></button>        
                    
                    <?php
                    if(!empty($STYLE))
                    {  
                     echo $row['intituleETAT'];
                    }
                    ?>
                    
                </td>
                    <td><button style="border:none; background-color:var(--panel-color);color:var(--text-color);text-decoration:underline;"><a href="verifier.php?id=<?php echo $row['ID'];?>">Supprimer</a></button>  </td>       
            </tr>
        <?php } ?>

      </table></center>
    </section>

   
  
    <script src="script.js"></script>
</body>
</html>