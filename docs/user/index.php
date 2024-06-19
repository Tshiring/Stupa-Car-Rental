<?php
session_start();
if (!isset($_SESSION["user"]) || $_SESSION["user_type"] != 'user') {
  header("Location: ../403.php");
  exit();
}

include '../database.php';

$sqlCars = "SELECT COUNT(*) as total_cars FROM cars";
$resultCars = mysqli_query($conn, $sqlCars);
$rowCars = mysqli_fetch_assoc($resultCars);
$totalCars = $rowCars['total_cars'];

?>

<?php require '../components/head.php'; ?>

<body>
  <div class=" org-car">
    <?php require './sidebar.php'; ?>
    <div class="main-content">
      <h1>Welcome back</h1>
      <div class="card-wrapper">
        <div>
          <h2>Total Cars</h2>
          <p><?php echo $totalCars; ?></p>
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