<?php
session_start();
if (!isset($_SESSION["user"]) || $_SESSION["user_type"] != 'user') {
  header("Location: ../403.php");
  exit();
}

include '../database.php';


?>

<?php require '../components/head.php'; ?>

<body>
  <div class=" org-car">
    <?php require './sidebar.php'; ?>
    <div class="main-content">
      <h1>Booked Car</h1>

    </div>
  </div>

  <script src="script.js"></script>
  <script>
    feather.replace();
  </script>
</body>

</html>