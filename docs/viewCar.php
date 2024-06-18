<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car</title>
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
      <h2>Title</h2>
      <p><?php echo $row['name'] ?></p>
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