<?php
include "db_connect.php";
$id = $_GET["id"];
$sql = "DELETE FROM `planification` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}