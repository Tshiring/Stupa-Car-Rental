<?php
session_start();
if (!isset($_SESSION["org"]) || $_SESSION["user_type"] != 'organization') {
  header("Location: ../403.php");
  exit();
}

include '../database.php';

if (isset($_POST["update"])) {
  if (isset($_FILES['car-image']) && $_FILES['car-image']['error'] == UPLOAD_ERR_OK) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/Car/uploads/'; // Use root directory path
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0755, true); // Create directory if it doesn't exist
    }
    $uploadFile = $uploadDir . basename($_FILES['car-image']['name']);

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['car-image']['tmp_name'], $uploadFile)) {
      $imagePath = mysqli_real_escape_string($conn, 'uploads/' . basename($_FILES['car-image']['name']));
    } else {
      echo "Error uploading file.";
      exit();
    }
  } else {
    $imagePath = null;
  }

  $id = mysqli_real_escape_string($conn, $_POST["car-id"]); // Add hidden input for car ID
  $name = mysqli_real_escape_string($conn, $_POST["car-name"]);
  $price = mysqli_real_escape_string($conn, $_POST["car-price"]);
  $mileage = mysqli_real_escape_string($conn, $_POST["car-mileage"]);
  $transmission = mysqli_real_escape_string($conn, $_POST["car-transmission"]);
  $capacity = (int)$_POST["car-capacity"];
  $type = mysqli_real_escape_string($conn, $_POST["vehicle-type"]);

  // Handle the case when no new image is uploaded
  if ($imagePath) {
    $sqlUpdate = "UPDATE cars SET image='$imagePath', name='$name', price='$price', mileage='$mileage', transmission='$transmission', capacity=$capacity, type='$type' WHERE id='$id'";
  } else {
    $sqlUpdate = "UPDATE cars SET name='$name', price='$price', mileage='$mileage', transmission='$transmission', capacity=$capacity, type='$type' WHERE id='$id'";
  }

  // Debugging: Print the query
  echo $sqlUpdate;

  if (mysqli_query($conn, $sqlUpdate)) {
    echo "Record updated successfully";
    header("Location: ./car.php");
    exit();
  } else {
    echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($conn);
  }
}
?>

<?php require '../components/head.php'; ?>

<body>
  <div class=" org-car">
    <?php require './sidebar.php'; ?>
    <div class="main-content">
      <h1>Edit Car</h1>
      <div id="add-car" class="car-form">
        <form id="car-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          <?php
          if (isset($_GET["id"])) {
            $id = mysqli_real_escape_string($conn, $_GET["id"]);
            $sql = "SELECT * FROM cars WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_array($result)) {
          ?>
              <input type="hidden" name="car-id" value="<?php echo $row["id"]; ?>">

              <label for="car-image">Upload Car Image:</label>
              <input type="file" id="car-image" name="car-image" accept="image/*">
              <?php if ($row['image']) : ?>
                <p>Current Image: <?php echo basename($row['image']); ?></p>
              <?php endif; ?>

              <label for="car-name">Car Name:</label>
              <input type="text" id="car-name" value="<?php echo htmlspecialchars($row["name"]); ?>" name="car-name">

              <label for="car-price">Price:</label>
              <input type="text" id="car-price" value="<?php echo htmlspecialchars($row["price"]); ?>" name="car-price">

              <label for="car-mileage">Mileage:</label>
              <input type="text" id="car-mileage" value="<?php echo htmlspecialchars($row["mileage"]); ?>" name="car-mileage">

              <label for="car-transmission">Transmission:</label>
              <select id="car-transmission" name="car-transmission">
                <option value="auto" <?php if ($row["transmission"] == "auto") echo 'selected'; ?>>Auto</option>
                <option value="manual" <?php if ($row["transmission"] == "manual") echo 'selected'; ?>>Manual</option>
              </select>

              <label for="car-capacity">People Capacity:</label>
              <input type="number" id="car-capacity" value="<?php echo htmlspecialchars($row["capacity"]); ?>" name="car-capacity">

              <label for="vehicle-type">Type of Vehicle:</label>
              <select id="vehicle-type" name="vehicle-type">
                <option value="electric" <?php if ($row["type"] == "electric") echo 'selected'; ?>>Electric</option>
                <option value="fuel" <?php if ($row["type"] == "fuel") echo 'selected'; ?>>Fuel</option>
              </select>

              <button type="submit" name="update">Edit Car</button>
        </form>
      </div>
  <?php
            } else {
              echo "<h3>Car Not Found</h3>";
            }
          } else {
            echo "<h3>No Car ID Provided</h3>";
          }
  ?>
    </div>
  </div>

  <script src="script.js"></script>
  <script>
    feather.replace();
  </script>
</body>

</html>