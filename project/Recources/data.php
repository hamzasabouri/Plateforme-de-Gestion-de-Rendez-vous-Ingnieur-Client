<?php
include "db_connect.php";
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="UTF-8">
    <title> Gestion Ressource</title>




   </head>

<body>
 


<form  >
  


  <div class="container">
 
    <br><br><br> <p class="title">Data Ressource </p>

    <table border = 1 style="size" >
      <thead class="table-dark">
        <tr>
          <th scope="col">Matricule</th>
          <th scope="col">Prenom</th>
          <th scope="col">nom</th>
          <th scope="col">Profile</th>
         
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `ressources2`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["matricule"] ?></td>
            <td><?php echo $row["prenom"] ?></td>
            <td><?php echo $row["nom"] ?></td>
            <td><?php echo $row["profile"] ?></td>
            </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    </div>



  
</section>
</form>




</body>
</html>
