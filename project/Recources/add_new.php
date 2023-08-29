<?php
include "db_connect.php";

if (isset($_POST["submit"])) {
   $matricule = $_POST['matricule'];
   $prenom = $_POST['prenom'];
   $nom = $_POST['nom'];
   $profile = $_POST['profile'];
   
   if (strlen($matricule) != 5 || !preg_match('/^[0-9]+$/', $matricule)) {
    
    $alert = '<script>alert("Erreur : Le matricule doit contenir uniquement des chiffres(5 chiffres)")</script>';
 echo $alert;
    
} elseif (!preg_match('/^[a-zA-Z]+$/', $nom) || !preg_match('/^[a-zA-Z]+$/', $prenom)) {
  $alert = '<script>alert("Erreur : Le nom et le prénom doivent contenir uniquement des lettres de l alphabet")</script>';
 echo $alert;
   
} elseif (empty($profile)) {
  $alert = '<script>alert("Erreur : Veuillez choisir un profil.")</script>';
 echo $alert;
    
} else {
    

   $sql = "INSERT INTO `ressources2` (`id`, `matricule`, `prenom`, `nom`, `profile`) VALUES (NULL,'$matricule','$prenom','$nom','$profile')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
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
    <title> Ajouter Ressource</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

   </head>

<body>
  
  <div class="sidebar close">
    <div class="logo-details">
      <img class="header-log" id="logo-men" src="LOGO.png" style="width: 70px;">
      <span class="logo_name"> Producteur de productivité</span>
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
<form class="form" action=""S method="post">
  <p class="title">Ajouter Ressource </p>

      <div class="flex">
      <label>
          <input required="" placeholder="" type="text" class="input" id="prenom" name="prenom">
          <span>Prenom</span>
      </label>

      <label>
          <input required="" placeholder="" type="text" class="input" id="nom" name="nom">
          <span>Nom</span>
      </label>
  </div>  
          
  <label>
      <input required="" placeholder="" type="text" class="input" id="matricule" name="matricule">
      <span>Matricule</span>
  </label> 
      
  
              
          <div class="select">
            <select id="format" name="profile">
            <option selected disabled>Choisir Profile</option>
               <option value="Consultant Reseau">Consultant Réseau</option>
               <option value="consultant Securite">Consultant Sécurité</option>
               <option value="Senior Reseau">Senior Réseau</option>
               <option value="Senior Securite">Senior Sécurité</option>
               <option value="Expert Reseau">Expert Réseau</option>
               <option value="Expert Securite">Expert Sécurité</option>
            </select>
         </div>
  
  
 
  <div>

        <button type="submit"  name="submit" class="submit">Ajouter</button>
        <a href="index.php" class="submit">Exit</a>
        </div>
 
</form>







</section>

  <script src="script.js"></script>
  


</body>
</html>
