<?php
include "db_connect.php";
?>






<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="UTF-8">
    <title> Gestion Project</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
    <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add_new.php" class="btn btn-dark mb-3">Ajouter Client</a>
    <a href="export.php"> <button type="button" name="button" class="btn btn-dark mb-3">Export To Excel</button> </a>

    <br><br><br> <p class="title">Data Client </p>

    <table class="table table-hover text-center" style="size" >
      <thead class="table-dark">
        <tr>
          <th scope="col">Code</th>
          <th scope="col">Client</th>
          <th scope="col">Descreption</th>
      
         
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `client`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["code"] ?></td>
            <td><?php echo $row["client"] ?></td>
            <td><?php echo $row["description"] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>


  
</section>
</form>






  <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



</body>
</html>
