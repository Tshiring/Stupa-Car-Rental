<?php require 'head.php' ?>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; color: #333;">

  <?php require 'nav.php' ?>

  <section class="contact" style="padding: 20px 0;">
    <div class="container" style="width: 80%; margin: auto; overflow: hidden;">
      <h1>Contact Us</h1>
      <p style="line-height: 1.6; margin-bottom: 10px;">If you have any questions or need further information, please feel free to reach out to us. We are here to help you.</p>

      <form action="contact_form_submit.php" method="post" style="margin-top: 20px;">
        <div class="form-group" style="margin-bottom: 15px;">
          <label for="name" style="display: block; margin-bottom: 5px;">Name:</label>
          <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
          <label for="email" style="display: block; margin-bottom: 5px;">Email:</label>
          <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
          <label for="message" style="display: block; margin-bottom: 5px;">Message:</label>
          <textarea id="message" name="message" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; height: 100px;"></textarea>
        </div>
        <button type="submit" style="padding: 10px 20px; background-color: #333; color: white; border: none; border-radius: 5px; cursor: pointer;">Send</button>
      </form>

      <p style="line-height: 1.6; margin-top: 20px; margin-bottom: 10px;">You can also reach us at:</p>
      <ul style="padding: 0; list-style: none;">
        <li style="margin-bottom: 10px;">Email: tshiring1814@gmail.com</li>
        <li style="margin-bottom: 10px;">Phone: 9842614529</li>
        <li style="margin-bottom: 10px;">Address: Tinchuli, Kathmandu</li>
      </ul>
    </div>
  </section>

  <!-- <?php require './components/footer.php' ?> -->

</body>
</html>
