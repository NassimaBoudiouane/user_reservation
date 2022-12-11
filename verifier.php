
 <?php
$servername = "localhost";
$dbname="reservation_ressource";
$username = "root";
$password = "";
$conn = new pdo ("mysql:host=$servername;dbname=$dbname","$username","");


// Start the session
    session_start();
  // Set session variables
        
    


///////////////////////////////////////////// tester admin /user
if (!empty($_POST['Email'])&& !empty($_POST['password'])){
    
    $req="SELECT ID,nom,prenom,Group_id,etat_compte,COUNT(*) as count FROM users where Email='{$_POST['Email']}' and PASW='{$_POST['password']}' and etat_compte=1";
    $res=$conn->query($req);
    
  
    while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
    if($row['count']!=0 )
     {
        
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["email"]=$row['Email'];
        $_SESSION["nom"]=$row['nom'];
        $_SESSION["prenom"]=$row['prenom'];
        $_SESSION["Group_id"] = $row['Group_id'];

        if ($row['Group_id']==1) {
            $_SESSION["admin_name"] =$row['nom'].' '.$row['prenom'];

            header("location:Dashboard.php");
            
        }
        else{
            
            $_SESSION["user_name"] =$row['nom'].' '.$row['prenom'];

            header("location:Users.php");
        }  
    }  
    else{ 
            header("Location:login.php?errors={$errors}");
        } 
    }}

///////////////////////////////ajouter ressources
                    if(!empty($_POST['ajouter']))
                    {                            
                            $sql = "INSERT INTO ressources (intitulé) VALUES ('{$_POST['intitule']}')";
                            if ($conn->query($sql)) {
                                // echo "User ajoutés avec succès";
                                header("Location:resource.php");
                              } 
                          else {
                                echo "ressayer";
                               }    
                    }
                    
///////////////////////////////////////insert into reservation /detail_reservation :users

                    if(isset($_POST['valider']))
                    {           
                        if(!empty($_POST['motif'])) {
                            $selected = $_POST['motif'];     
                        } 
                        $ID= $_SESSION["ID"];
                        $dateReservation =date("Y-m-d");
                        $sql0 = "INSERT INTO séance (heure_debut,heure_fin) VALUES ('{$_POST['dateD']}','{$_POST['dateF']}')";
                        if ($conn->query($sql0)) {
                            $sqlseance = "SELECT ID  FROM séance ORDER BY ID DESC LIMIT 1";
                            if ($conn->query($sqlseance)) 
                            {
                               $result=$conn->query($sqlseance);
                               $row=$result->fetch(PDO::FETCH_ASSOC);
                               $ID_seance = $row['ID'];
                             
                                                                                                                       
                            }

                            $sql = "INSERT INTO reservation (type_reservation,motif,date_reservation,id_etat,id_users,date_examen) VALUES ('Normal','$selected','$dateReservation',1,$ID,'{$_POST['Date_exame']}')";
                            if ($conn->query($sql)) {
                             $sql1 = "SELECT ID  FROM reservation ORDER BY ID DESC LIMIT 1";
                             if ($conn->query($sql1)) 
                             {
                                $result=$conn->query($sql1);
                                $row=$result->fetch(PDO::FETCH_ASSOC);
                                $ID_RESERVATION = $row['ID'];
                                // $ID_SEANCE = $row['ID'];
                                if(!empty($_POST['salle'])) {
                                    $selectedSalle = $_POST['salle'];     
                                } 
                                $dateD=$_POST['Date_reservation'];
                                // $dateF=$_POST['dateF'];
                                $sql2 = "INSERT INTO detail_reservation(ID_reservation, ID_ressource,id_seance,date_evenement) VALUES ($ID_RESERVATION,$selectedSalle,$ID_seance,'$dateD')";
                                $conn->query($sql2);
                                                                
                                header("location:users.php?error={$error}");
                             }
                        } 

                    } }
                /////////////////////////////supprimer reservation
                
// // Supprimer reservation //
if(!empty($_GET['id'])){
    $sqlsuppdet = "DELETE FROM detail_reservation WHERE ID_reservation='{$_GET['id']}'";
    $sqlsuppres = "DELETE FROM reservation WHERE ID='{$_GET['id']}'";
    if($conn->query($sqlsuppdet))
    {
         ($conn->query($sqlsuppres));
            
                header("location:reservatio.php");         
    }
}



// // Supprimer reservation  USERS //
if(!empty($_GET['idres'])){
    $sqlsuppdet = "DELETE FROM detail_reservation WHERE ID_reservation='{$_GET['idres']}'";
    $sqlsuppres = "DELETE FROM reservation WHERE ID='{$_GET['idres']}'";
    if($conn->query($sqlsuppdet))
    {
         ($conn->query($sqlsuppres));
            
                header("location:users.php");         
    }
}


// // // Supprimer  USERS //
if(!empty($_GET['IDuser'])){
    
    $sqlsupuser = "DELETE FROM users WHERE ID='{$_GET['IDuser']}'";
    $sqlsuppreserv = "DELETE FROM reservation WHERE id_users='{$_GET['IDuser']}'";
    $sqlselect="SELECT ID from reservation where id_users= '{$_GET['IDuser']}' ";
    $req=$conn->query($sqlselect);
    $row=$req->fetch(PDO::FETCH_ASSOC);
    $ID_RESERVATION = $row['ID'];
    $sqlsuupdetail=" DELETE FROM detail_reservation WHERE  ID_reservation= '{$ID_RESERVATION}'";

    if($conn->query($sqlsuupdetail))
    {
        echo $ID_RESERVATION;
            if($conn->query($sqlsuppreserv))
            { 

                if (($conn->query($sqlsupuser)))
                    {
                        header("location:user.php");
                    }          
        
            }        
    }else
    {
        $conn->query($sqlsupuser);
    }            
}   



    // // Supprimer Detail-reservation
if(!empty($_GET['supp'])){
    $sqlsuppdet = "DELETE FROM detail_reservation WHERE ID_reservation='{$_GET['supp']}'";
    if($conn->query($sqlsuppdet))
    {       
          header("location:Dashboard.php");         
    }
}

   // // Supprimer ressources
   if(!empty($_GET['suppres'])){
    $suppres = "DELETE FROM ressources WHERE ID='{$_GET['suppres']}'";
    if($conn->query($suppres))
    {       
          header("location:resource.php");         
    }
}
                  
//////modifier Ressources



if(!empty($_POST['IdMod'])){

    $sql="UPDATE Ressources SET ID = {$_POST['id']} , intitulé = '{$_POST['intitule']}'

    WHERE ID = {$_POST['IdMod']}";

    if($conn->query($sql)){

        header("location:resource.php");

    }
}
else{
    echo "ressayer";
}
                              
/////////////////////////////////////ajouter users 

if(isset($_POST['ajouteruser']))
{                            
    if(isset($_POST['genre']))
     {
            $cheked = $_POST['genre'];  //  Displaying Selected Value  
     }  

        $sqlajtuser = "INSERT INTO users (matricule, cin, nom, prenom, date_naissance, Téléphone, Adresse, Ville, genre, Group_id, Email, PASW,etat_compte) VALUES 
        ('{$_POST['matricule']}','{$_POST['cin']}','{$_POST['nom']}','{$_POST['prenom']}','{$_POST['date_naissance']}','{$_POST['Téléphone']}','{$_POST['Adresse']}','{$_POST['ville']}','$cheked',{$_POST['statut']},'{$_POST['email']}','{$_POST['password']}',1)";        
            if ($conn->query($sqlajtuser))
                {
                    echo "User ajoutés avec succès";
                    header("Location:user.php");
                } 
        else {
            echo "ressayer";
              
             }     
 
}

/////////////////////////////////////Accepter / Refuser
if(isset($_GET["statut2"]))
{
    $sql="UPDATE reservation SET id_etat= 3 WHERE ID='{$_GET["statut2"]}'";

    if($conn->query($sql))
    {
         ($conn->query($sql));
            
                header("location:reservatio.php");         
    }
}

if(isset($_GET["statut3"]))
{
    $sql="UPDATE reservation SET id_etat= 2 WHERE ID='{$_GET["statut3"]}'";

    if($conn->query($sql))
    {
         ($conn->query($sql));
            
                header("location:reservatio.php");         
    }
}
///////////////////////////////activer /desactiver
if(isset($_GET["etatactiver"]))
{
    $sql="UPDATE users SET etat_compte= 0 WHERE ID='{$_GET["etatactiver"]}'";

    if($conn->query($sql))
    {
         ($conn->query($sql));
            
                header("location:user.php");         
    }
}

if(isset($_GET["etatdesactiver"]))
{
    $sql="UPDATE users SET etat_compte= 1 WHERE ID='{$_GET["etatdesactiver"]}'";

    if($conn->query($sql))
    {
         ($conn->query($sql));
            
                header("location:user.php");         
    }
}
///////////////////////////////////// verefier la creation du Cpompte
if(isset($_POST['btnenregistrer']))
{
    
                                
            $sqlajtuser = "INSERT INTO users (matricule, cin, nom, prenom, date_naissance, Téléphone, Adresse, Ville, genre, Group_id, Email, PASW,etat_compte) VALUES 
            ('{$_POST['Matricule']}','{$_POST['Cin']}','{$_POST['Nom']}','{$_POST['Prenom']}','{$_POST['Date_naissance']}','{$_POST['Tele']}','{$_POST['Adresse']}','{$_POST['Ville']}','{$_POST['genre']}',0,'{$_POST['Email']}','{$_POST['Password']}',0)";        
                if ($conn->query($sqlajtuser))
                    {
                        
                        header("Location:login.php");
                    } 
            else {
                echo "ressayer";
                  
                 }     
    
}
?>