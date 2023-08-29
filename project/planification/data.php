<?php
include "db_connect.php";
?>






<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="UTF-8">
    <title>Data Planification</title>




   </head>

<body>
  
    <br><br><br> <p class="title">Data Planification </p>

    <table border = 1 style="size" >
      <thead class="table-dark">
        <tr>
          <th scope="col">Ressources</th>
          <th scope="col">Project</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
      
         
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `planification`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["ressources"] ?></td>
            <td><?php echo $row["project"] ?></td>
            <td><?php echo $row["date"] ?></td>
            <td><?php echo $row["time"] ?></td>

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