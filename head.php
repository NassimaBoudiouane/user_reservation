<?php
  session_start();

?>
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
    <nav>
        <div class="logo-name">
            <div class="logo_image">
                <img src="logo1.png" alt="">
            </div>
            <span class="logo_name"><?php  echo $_SESSION["admin_name"] ?></span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="dashboard.php">
                <i class="uil uil-estate"></i>
                <span class="link-name">Dashboard</span>
                </a></li>
                 
                <li >
                    
                <a href="user.php">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name" id="users" >Users </span>
                    <!-- <i class="uil uil-angle-down"  onclick="visibility('Health')" ></i> -->
                </a>
                <!-- <div class="menuList" style="height: 100%;:10px">
                    <ul style="display:none;" id="Health" class="content">
                        <li><span href="#"style="color:#ccc;font-size:14px;padding-left:40%;cursor:pointer;font-weight: bold;">Afficher</span></li>
                        <li><span href="#"style="color:#ccc;font-size:14px;padding-left:40%;cursor:pointer;font-weight: bold;">Ajouter</span></li>
                    </ul>
                </div> -->
                </li>
             
                <li><a href="resource.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Ressources</span>
                    <!-- <i class="uil uil-angle-down"  onclick="visibility('Health1')" ></i> -->
                </a>
                <!-- <div class="menuList">
                    <ul style="display:none;" id="Health1" class="content">
                        <li><span href="#"style="color:#CCC;font-size:14px;padding-left:50%;cursor:pointer;font-weight: bold;">Afficher</span></li>
                        <li><span href="#"style="color:#CCC;font-size:14px;padding-left:50%;cursor:pointer;font-weight: bold;">Ajouter</span></li>
                    </ul>
                </div> -->
                </li>
                <li><a href="reservatio.php">
                    <i class="uil uil-calendar-alt"></i>
                    <span class="link-name">Reservation</span>
                    <!-- <i class="uil uil-angle-down" onclick="visibility('Health2')" ></i> -->
                </a>
                <!-- <div class="menuList">
                    <ul style="display:none;" id="Health2" class="content">
                        <li><span href="#"style="color:#CCC;font-size:14px;padding-left:50%;cursor:pointer;font-weight: bold;">Afficher</span></li>
                        <li><span href="#"style="color:#CCC;font-size:14px;padding-left:50%;cursor:pointer;font-weight: bold;">Ajouter</span></li>
                    </ul>
                </div> -->
            </li>
           
            </ul>
           
            <ul class="logout-mod">
            </a></li>
                <li><a href="login.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <li class="mode"><a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark mode</span>
               </a>
                <div class="mode-toggle">
                <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

  
</body>