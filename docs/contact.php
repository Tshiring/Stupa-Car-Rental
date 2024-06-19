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
    <h1>Contact Us</h1>
    <p>If you have any questions, please feel free to reach out to us.</p>
    <div class="form-wrapper">
      <div class="auth-form">
        <form action="send_contact.php" method="post">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
          </div>

          <div class="form-group">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
          </div>

          <div class="form-group">

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
          </div>

          <input type="submit" value="Send Message" name="login">

        </form>
      </div>
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