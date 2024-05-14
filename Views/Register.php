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
    echo "ehhee";
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $errors = array();
    if (empty($fullName) or empty($email) or empty($password) or empty($confirmPassword)) {
      array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Email is not valid");
    }
    if (strlen($password  < 6)) {
      array_push($errors, "Password must be 6 character long");
    }
    if ($password !== $confirmPassword) {
      array_push($errors, "Password must be same");
    }
    if (count($errors) > 0) {
      foreach ($errors as $error) {
        echo "<div>$error</div>";
      }
    } else {
      // insert data into database
    }
  }
  ?>


  <div class="auth-form">
    <form action="views/register.php" method="POST">
      <input type="text" name="full_name" id="">
      <input type="email" name="email" id="">
      <input type="password" name="password" id="">
      <input type="password" name="confirmPassword" id="">
      <input type="submit" class="btn btn-primary" value="Register" name="submit">
    </form>
  </div>
</body>

</html>