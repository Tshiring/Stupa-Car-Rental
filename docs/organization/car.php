<?php
session_start();

if (!isset($_SESSION["org"]) || $_SESSION["user_type"] != 'organization') {
  header("Location: ../403.php");
  exit();
}

include '../database.php';

// Fetch data from the 'cars' table
$sql = "SELECT * FROM cars";
$result = mysqli_query($conn, $sql);

?>

<?php require '../components/head.php'; ?>

<body>
  <div class=" org-car">
    <?php require './sidebar.php'; ?>
    <div class="main-content">
      <h1>Cars List</h1>
      <table border="1">
        <thead>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Mileage</th>
            <th>Transmission</th>
            <th>Capacity</th>
            <th>Type</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Check if there are any results
          if (mysqli_num_rows($result) > 0) {
            // Loop through each row in the result set
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><img style="width: 100px; height: 50px;" src="<?php echo $row["image"]; ?>" alt="Car Image"></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["price"]; ?></td>
                <td><?php echo $row["mileage"]; ?></td>
                <td><?php echo $row["transmission"]; ?></td>
                <td><?php echo $row["capacity"]; ?></td>
                <td><?php echo $row["type"]; ?></td>
                <td>
                  <a href="editCar.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                  <a href="deleteCar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
              </tr>
          <?php
            }
          } else {
            echo "<tr><td colspan='9'>No cars found.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="script.js"></script>
  <script>
    feather.replace();
  </script>
</body>

</html>