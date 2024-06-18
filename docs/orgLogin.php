<?php
session_start();
if (isset($_SESSION["user"])) {
  header("Location: dashboard.php");
}

?>
<?php require './components/head.php' ?>

<body>
  <?php
  if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    require_once "database.php";
    $sql = "SELECT * FROM  users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($user) {
      if (password_verify($password, $user["password"])) {
        session_start();
        $_SESSION["user"] = "yes";
        header("Location: organization/car.php");
        die();
      } else {
        echo "<div>Password doesn't match!</div>";
      }
    } else {
      echo "<div>Email doesn't exists!</div>";
    }
  }
  ?>
  <?php require './components/nav.php' ?>
  <div class="form-wrapper">
    <div class="auth-form">
      <h2>Organization Login</h2>
      <form action="docs/userLogin.php" method="post">
        <div class="form-group">
          <label for="org-name">Organization Name</label>
          <input type="org-name" name="org-name" id="org-name" autocomplete="off" placeholder="Enter your organization name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" autocomplete="off" placeholder="Enter your email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" autocomplete="off" placeholder="Enter your password">
        </div>
        <input type="submit" value="Login" name="login">
      </form>
    </div>
  </div>
</body>

</html>