<?php
include "db_connect.php";
?>






<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="UTF-8">
    <title> Data Project</title>




   </head>

<body>
  

    <br><br><br> <p class="title">Data Client </p>

    <table border = 1 style="size" >
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
