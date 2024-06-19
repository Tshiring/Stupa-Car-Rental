<?php
session_start();
?>

<?php require './components/head.php' ?>

<?php
$date = date('Y-m-d');
?>

<body>
  <?php require './components/nav.php' ?>

  <div class="container about">
    <h1>About Us</h1><br><br>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p><br>

    <p>Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum.</p><br><br>
  </div>


  <section class="footer">
    <div class="logo">
      <h1>LuxeDrive</h1>
    </div>
    <div class="items">
      <p>Rent</p>
      <p>Share</p>
      <p>About us</p>
      <p>Contact</p>
    </div>
    <div class="socialmedia">
      <i data-feather="instagram"></i>
      <i data-feather="twitter"></i>
      <i data-feather="facebook"></i>
      <i data-feather="youtube"></i>
    </div>
  </section>


  <script src="public/js/nav.js">

  </script>
  <script>
    feather.replace();
  </script>
</body>

</html>