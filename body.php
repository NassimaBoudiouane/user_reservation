<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>admin dashboard panel</title>
</head>
<body>
<section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle" ></i>
            <div class="search-box">
                <i class="uil uil-search" > </i>
                <input type="text" placeholder="search here.." >
            </div>
             <!-- <button name="chercheruser"class='btn block-cube block-cube-hover' type='submit'>
        <div class='text'>
           Rechercher
        </div> -->
        </div>
        <div class="dash-content">
          <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text" >Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                    <i class="uil uil-users-alt"></i>
                        <span class="text">Total Users</span>
                        <span class="number">
                        <?php
                          $rec="SELECT * FROM users";
                          $res=$conn->query($rec);
                          $C = $res -> FETCHALL();
                         Echo count($C);
                         ?>
                        </span>
                    </div>
                    <div class="box box2">
                    <i class="uil uil-chart"></i>
                    <!-- <i class="uil uil-setting"></i> -->
                        <span class="text">Total Ressources</span>
                        <span class="number">
                        <?php
                          $rec="SELECT * FROM ressources";
                          $res=$conn->query($rec);
                          $C = $res -> FETCHALL();
                         Echo count($C);?>
                            </span>

                    </div>
                    <div class="box box3">
                    <i class="uil uil-calendar-alt"></i>
                        <span class="text">Total Reservation</span>
                        <span class="number">

                        <?php
                          $rec="SELECT * FROM reservation";
                          $res=$conn->query($rec);
                          $C = $res -> FETCHALL();
                         Echo count($C);?>

                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
<center><table  border=0.9px  cellpadding="3" style="background-color: var(--panel-color);">
        <tr>
            <th>Nom complete</th>
            
            <th>Email User</th>
            <th>ID Reservation</th>
            <th>Type Reservation</th>
            <th>Motif </th>
            <th>Faire le :</th>
            <th>Nom Ressource</th>
            <th>date Examen</th>

            <th colspan="3">Date Reservation</th>
            <th colspan="2">Action</th>

        </tr>
        <tr>
            <?php
            $req = "SELECT nom,prenom,Email,reservation.ID,type_reservation,motif,date_reservation,intitulé,date_examen,date_evenement,heure_debut,heure_fin FROM reservation INNER JOIN detail_reservation ON detail_reservation.ID_Reservation=reservation.ID left JOIN séance on detail_reservation.id_seance = séance.ID  INNER JOIN ressources ON ressources.ID=detail_reservation.ID_ressource INNER JOIN users on users.ID=id_users  ";
            $ress=$conn->query($req);
            
              
             while($row=$ress->fetch(PDO::FETCH_ASSOC)){
                //  $sql="SELECT Min(heure_debut)as dateD,Max(heure_fin)as dateF from séance inner join detail_reservation on detail_reservation.id_seance = séance.ID where ID_Reservation= '{$row['ID']}'";
                // $R=$conn->query($sql);
                // while($ro=$R->fetch(PDO::FETCH_ASSOC)){
          ?>

            <td><?php echo $row['nom'].' '.$row['prenom']; ?></td>
          
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['type_reservation']; ?></td>
            <td><?php echo $row['motif']; ?></td>
            <td><?php echo $row['date_reservation']; ?></td>
            <!-- <td><?php echo $row['ID']; ?></td> -->
            <td><?php echo $row['intitulé']; ?></td>
          
          
            <td><?php echo $row['date_examen']; ?></td>
            <td><?php echo $row['date_evenement']; ?></td>
                  
        
            <td><?php echo $row['heure_debut'];?></td>
            <td><?php echo $row['heure_fin'];?></td>

           
            <td><button class="btnsup"><a href="verifier.php?supp=<?php echo $row['ID'];?>">Supprimer</a></button></td>
            <td><button  class=" btnmod"><a href="">Modifier  </a></button></td>

        </tr>
        <?php 
    // }
     } ?>
    </table></center>

   </section>
   
<script src="script.js"></script>

</body>
</html>