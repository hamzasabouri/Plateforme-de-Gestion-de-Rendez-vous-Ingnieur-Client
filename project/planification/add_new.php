<?php
include "db_connect.php";

if (isset($_POST["submit"])) {
   $ressources = $_POST['ressources'];
   $project = $_POST['project'];
   $date = $_POST['date'];
   $time = $_POST['time'];
   

   $sql = "INSERT INTO `planification` (`id`, `ressources`, `project`, `date`, `time` ) VALUES (NULL,'$ressources','$project','$date','$time')";

   $result4 = mysqli_query($conn, $sql);

   if ($result4) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
 
}
$query = "SELECT `prenom`, `nom` FROM `ressources2`";
    $result1 = mysqli_query($conn, $query);
    $query2 = "SELECT  `client` FROM `client`";
    $result2 = mysqli_query($conn, $query2);




?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="UTF-8">
    <title>Ajouter Planification</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

   </head>

<body>
  
  <div class="sidebar close">
    <div class="logo-details">
      <img class="header-log" id="logo-men" src="LOGO.png" style="width: 60px;">
      <span class="logo_name"> SABOURI</span>
    </div>
    <ul class="nav-links">
      <li>
        <a onclick="location.href='//localhost/Project/Acceuil/'">
          <i class='bx bxs-home' ></i>
          <span class="link_name" onclick="location.href='//localhost/Project/Acceuil/'">Acceuil</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" onclick="location.href='//localhost/Project/Acceuil/'">Acceuil</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">

            <i class='bx bxs-data'></i>
            <span class="link_name">Gestion</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Gestion</a></li>
          <li><a onclick="location.href='//localhost/Project/Recources'">Ressource</a></li>
          <li><a onclick="location.href='//localhost/Project/Project/'">Projet</a></li>
        </ul>
      </li>

      <li>
      <a onclick="location.href='//localhost/Project/planification/'">
          <i class='bx bxs-briefcase'></i>
          <span class="link_name">Planification</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" onclick="location.href='//localhost/Project/planification/'">Planification</a></li>
        </ul>
      </li>
      <li>
        <a onclick="location.href='//localhost/Project/planning/'">
          <i class='bx bxs-calendar'></i>
          <span class="link_name">Planning</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" onclick="location.href='//localhost/Project/planning/'">Planning</a></li>
        </ul>
      </li>
 
      
</ul></div>
</div>
<section class="home-section">
  <div class="home-content">
    <i class='bx bx-menu' ></i>
<div class="accueil-header">
  <img class="header-log" id="logo-men" src="LOGO.png" style="width: 240px;">
</div>
<form class="form" action="" method="post">


  <p class="title"> Ajouter Planification </p>

  <div class="select">
    <select id="ressources" name="ressources">
    <option selected disabled>Choisir Ressource</option>
    <?php  
    while ($row = mysqli_fetch_array($result1)) {
        echo '<option value="' . $row[0] .' '.  $row[1] . '">' . $row[0] .' '.  $row[1] . '</option>';
    }
    ?>
</select>


    </select>
 </div>

 <div class="select">
  <select  id="project" name="project">
  <option selected disabled>Choisir Project</option>
  <?php  
    while ($row1 = mysqli_fetch_array($result2)) {
        echo '<option value="' . $row1[0] . '">' . $row1[0] . '</option>';
    }
    ?>

  </select>
</div>
<input type="date" id="date" name="date" > 

          
<div class="select">
  <select id="time" name="time">
  <option selected disabled>Choisir Time</option>
     <option value="am">AM</option>
     <option value="pm">PM</option>
     <option value="tj">TJ</option>

  </select>
</div>



      

<button type="submit"  name="submit" class="submit">Ajouter</button>
        <a href="index.php" class="submit">Exit</a>
        </div>
 
</form>







</section>

  <script src="script.js"></script>
  


</body>
</html>
