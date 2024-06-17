<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="charge.php" method="post">
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo getenv('STRIPE_PUBLISHABLE_KEY'); ?>" data-amount="999" data-name="Stupa Car Rental" data-description="Faster delivery" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-currency="usd"> </script>
  </form>
</body>

</html>