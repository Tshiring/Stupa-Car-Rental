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
				header("Location: dashboard.php");
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
	<div class="auth-form">
		<form action="docs/login.php" method="post">
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" name="email" id="">
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name="password" id="">
			</div>
			<input type="submit" value="Login" name="login">
		</form>
	</div>
</body>

</html>