<?php
session_start();
if (!isset($_SESSION["org"]) || $_SESSION["user_type"] != 'organization') {
  header("Location: ../403.php");
  exit();
}

include '../database.php';
$orgName = $_SESSION["org_name"];

// Query to count the total number of cars
$sqlCars = "SELECT COUNT(*) as total_cars FROM cars";
$resultCars = mysqli_query($conn, $sqlCars);
$rowCars = mysqli_fetch_assoc($resultCars);
$totalCars = $rowCars['total_cars'];

// Query to count the total number of users
$sqlUsers = "SELECT COUNT(*) as total_users FROM users"; // Replace 'users' with your actual users table name
$resultUsers = mysqli_query($conn, $sqlUsers);
$rowUsers = mysqli_fetch_assoc($resultUsers);
$totalUsers = $rowUsers['total_users'];
?>

<?php require '../components/head.php'; ?>

<body>
  <div class="org-car">
    <?php require './sidebar.php'; ?>
    <div class="main-content">
      <h1>Welcome, <?php echo htmlspecialchars($orgName); ?></h1><br>
      <div class="card-wrapper">
        <div>
          <h2>Total Cars</h2>
          <p><?php echo $totalCars; ?></p>
        </div>

        <div>
          <h2>Total Users</h2>
          <p><?php echo $totalUsers; ?></p>
        </div>
      </div>

    </div>
  </div>

  <script src="script.js"></script>
  <script>
    feather.replace();
  </script>
</body>

</html>