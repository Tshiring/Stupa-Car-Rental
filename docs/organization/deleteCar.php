<?php
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  include '../database.php';
  $sql = "DELETE FROM cars WHERE id='$id'";
  if (mysqli_query($conn, $sql)) {
    echo "Deleted";
    header("Location:./car.php");

  } else {
    die("Something went wrong");
  }
} else {
  echo "Book does not exist";
}
