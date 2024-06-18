<?php
session_start();
if (isset($_SESSION["org"])) {
  header("Location: ./organization/index.php");
}

?>
<?php require './components/head.php' ?>

<body>
  <?php require './components/nav.php' ?>

  <?php
  if (isset($_POST["submit"])) {
    $orgName = $_POST["org-name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();

    if (empty($orgName) || empty($email) || empty($password) || empty($confirmPassword)) {
      array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 6) {
      array_push($errors, "Password must be at least 6 characters long");
    }
    if ($password !== $confirmPassword) {
      array_push($errors, "Passwords must match");
    }

    require_once "database.php";
    $sql = "SELECT * FROM orgusers WHERE email = '$email'";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      if (mysqli_stmt_num_rows($stmt) > 0) {
        array_push($errors, "Email already exists!");
      }
      mysqli_stmt_close($stmt);
    } else {
      array_push($errors, "Database error");
    }

    if (count($errors) > 0) {
      foreach ($errors as $error) {
        echo "<div>$error</div>";
      }
    } else {
      $sql = "INSERT INTO orgusers (name, email, pass) VALUES (?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $orgName, $email, $hashedPassword);
        mysqli_stmt_execute($stmt);
        echo "<div>Organization registered successfully</div>";
      } else {
        echo "<div>Error: Could not prepare statement</div>";
      }
      mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
  }
  ?>

  <div class="form-wrapper">
    <div class="auth-form">
      <h2>Organization Register</h2>
      <form action="docs/orgRegister.php" method="POST">
        <div class="form-group">
          <label for="org-name">Organization Name</label>
          <input type="text" name="org-name" id="org-name" autocomplete="off" placeholder="Enter your organization name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" autocomplete="off" placeholder="Enter your email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" autocomplete="off" placeholder="Enter your password">
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm Password</label>
          <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Enter your password again">
        </div>
        <p>Already registered as an organization? <a href="docs/orgLogin.php">Sign in</a></p>
        <input type="submit" class="btn btn-primary" value="Register" name="submit">
      </form>
    </div>
  </div>
</body>

</html>