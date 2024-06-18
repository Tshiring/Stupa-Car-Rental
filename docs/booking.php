<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Detail</h1>
  <?php
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    include("./database.php");

    // Ensure the id is an integer to avoid SQL injection
    $id = intval($id);

    $sql = "SELECT * FROM cars WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful and returned a result
    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
  ?>
      <form action="charge.php" method="post">
        <p><?php echo $row['name'] ?></p>
        <p>US$ <?php echo $row['price'] ?></p>
        <input type="hidden" name="car_name" value="<?php echo $row['name'] ?>">
        <input type="hidden" name="car_price" value="<?php echo $row['price'] * 100; // Convert to cents 
                                                      ?>">
        <button>Pay</button>
      </form>
  <?php
    } else {
      echo "<p>No car found with the provided ID.</p>";
    }
  } else {
    echo "<p>No ID provided in the query string.</p>";
  }
  ?>
</body>

</html>