<header class="container">
  <!-- <div class="hamburger-menu">
    <span></span>
    <span></span>
    <span></span>
  </div> -->
  <h1>LOGO</h1>
  <nav>
    <ul>
      <li><a href="">Home</a></li>
      <li><a href="">About</a></li>
      <li><a href="">Contact</a></li>
    </ul>
  </nav>
  <div class="login-btn">
    <?php if (isset($_SESSION["user"])) : ?>
      <a href="docs/organization/car.php">Dashboard</a>
    <?php else : ?>
      <a href="docs/userLogin.php">Login </a>
      <a href="docs/Register.php"> / Register</a>
    <?php endif; ?>
  </div>

</header>