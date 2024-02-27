<?php
include "db_connect.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $code = $_POST['code'];
   $client = $_POST['client'];
   $description = $_POST['description'];
   if (strlen($code) != 15) {
    $alert = '<script>alert("Erreur : Le code doit contenir exactement 15 caractères.")</script>';
 echo $alert;
    
} elseif (empty($client) || !preg_match('/^[a-zA-Z]+$/', $client)) {
    $alert = '<script>alert("Erreur : Le client doit être spécifié et contenir uniquement des lettres de l alphabet")</script>';
    echo $alert;
} else {
   

  $sql = "UPDATE `client` SET `code`='$code',`client`='$client',`description`='$description' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
}

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="UTF-8">
    <title> Modifier Project</title>
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
  <img class="header-log" id="logo-men" src="LOGO.png" style="width: 190px;">
</div>
<form class="form" action="" method="post">
  <p class="title">Modifier Project </p>

  <?php
    $sql = "SELECT * FROM `client` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>


      <div class="flex">
      <label>
          <input required="" placeholder="" type="text" class="input"id="code" name="code" value="<?php echo $row['code'] ?>">
          <span>Code</span>
      </label>

      <label>
          <input required="" placeholder="" type="text" class="input"id="client" name="client" value="<?php echo $row['client'] ?>">
          <span>Client</span>
      </label>
  </div>  
          
  <label>
      <input required="" placeholder="" type="text" class="input" id="description" name="description" value="<?php echo $row['description'] ?>">
      <span>Description</span>
  </label> 
      
  
 
  <div>

        <button type="submit"  name="submit" class="submit">Mis a Jour</button>
        <a href="index.php" class="submit">Exit</a>
        </div>
 
</form>







</section>

  <script src="script.js"></script>
  


</body>
</html>
