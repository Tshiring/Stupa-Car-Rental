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
    <?php if (isset($_SESSION["user_type"])) : ?>
      <?php if ($_SESSION["user_type"] == 'user') : ?>
        <a href="docs/user/index.php">Dashboard</a>
      <?php elseif ($_SESSION["user_type"] == 'organization') : ?>
        <a href="docs/organization/index.php">Dashboard</a>
      <?php endif; ?>
    <?php else : ?>
      <a href="docs/orgLogin.php">Login as Organization</a>
      <a href="docs/userLogin.php"> / Login </a>
      <a href="docs/userRegister.php"> / Register</a>
    <?php endif; ?>
  </div>
</header>