<?php
session_start();
if (isset($_SESSION["user"])) {
  header("Location: dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stupa Car Rental</title>
  <base href="http://localhost/Car/">

  <link rel="stylesheet" href="public/styles/main.min.css">
</head>

<body>
  <?php require './components/nav.php' ?>

  <?php
  if (isset($_POST["submit"])) {
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $hasedPassword = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();
    if (empty($fullName) or empty($email) or empty($password) or empty($confirmPassword)) {
      array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 6) {
      array_push($errors, "Password must be at least 6 characters long");
    }
    if ($password !== $confirmPassword) {
      array_push($errors, "Password must be same");
    }

    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
      array_push($errors, "Email already exists!");
    }

    if (count($errors) > 0) {
      foreach ($errors as $error) {
        echo "<div>$error</div>";
      }
    } else {
      $sql = "INSERT INTO users (full_name,email,password) VALUES (?,?,?)";
      $stmt = mysqli_stmt_init($conn);
      $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
      if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $hasedPassword);
        mysqli_stmt_execute($stmt);
        echo "<div>Registered successfully</div>";
      } else {
        die("Error");
      }
    }
  }
  ?>


  <div class="auth-form">
    <form action="docs/register.php" method="POST">
      <input type="text" name="full_name" id="">
      <input type="email" name="email" id="">
      <input type="password" name="password" id="">
      <input type="password" name="confirmPassword" id="">
      <input type="submit" class="btn btn-primary" value="Register" name="submit">
    </form>
  </div>
</body>

</html>