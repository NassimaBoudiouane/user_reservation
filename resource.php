
<?php
$servername = "localhost";
$dbname="reservation_ressource";
$username = "root";
$password = "";
$conn = new pdo ("mysql:host=$servername;dbname=$dbname","$username","");
//modifier ressources

if(!empty($_GET['Modifier'])){

  $sql = "SELECT * FROM Ressources WHERE ID='{$_GET['Modifier']}'";

  $res=$conn->query($sql);

  $row=$res->fetch(PDO::FETCH_ASSOC);

  // echo "Ressource Modifier avec succès";

}



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


$req = "select * from ressources";
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
    <!-- <link rel="stylesheet" href="style.css"> -->
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard panel</title>

   <style>
#btnaddresso{
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
#btnaddresso:hover{
    background-color:var(--box1-color);

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
  padding-left: 53px;
  padding-right: 53px;
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
fieldset{
    
    width:55%;
    height: 35%;
    margin-top:-10%;
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
    height: 20%;
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
        margin-left :37%;
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
            <h1 style="color:var(--primary-color);margin-top:80px">RESSOURCES</h1>
        
            <button id="btnaddresso" type='submit' onclick="visibility('legend1')" >Ajouter</button>
            
            <center> <table >
            <tr>        
                <th>ID</th>
                <th>SALLE</th>
                <th >Action</th>
            </tr>
            <tr>
                <?php while($row=$ress->fetch(PDO::FETCH_ASSOC)){?>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['intitulé']; ?></td>
                <td>
                <button style="border:none;border-radius:5px;width:35%; height: 23px;background-color:var(--box1-color)"><a href="verifier.php?suppres=<?php echo $row['ID'];?>">Supprimer</a></button>
                <button style="border:none;border-radius:5px;width:35%; height: 23px;background-color:var(--box3-color); margin-left:15px" ><a href="modifier1.php?Modifier=<?php echo $row['ID'];?>" >modifier</a></button>
                </td> 
                
            </tr>
        <?php } ?>

      </table></center>  
      


<form action="verifier.php" method="post">
      <fieldset id="legend1" style="display:none">

        <div class="cclose">  <i style="cursor: pointer;" class="uil uil-times-square" onclick="hiding('legend1')"></i></div>  
            <div class="inputt">
              <!-- <input name='ID' placeholder='ID' type='text' required> -->

              <input name='intitule' placeholder='intitulé' type='text' required>
          
              </div>                 
          <input  id="btn1" name="ajouter" value="ajouter" class='btn block-cube block-cube-hover' type='submit'>
              
             
      </fieldset>

</form>








    </section>

   
  
    <script src="script.js"></script>
</body>
</html>