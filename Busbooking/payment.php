<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stripe Checkout Example</title>
  <script src="https://checkout.stripe.com/checkout.js"></script>
</head>
<body>

<!-- Your other form fields go here -->
<form action="process_payment.php" method="post">
  <input type="hidden" name="amount" value="500"> <!-- Amount in cents -->
  <button id="checkout-button">Checkout</button>
</form>

<script>
  var stripe = Stripe('pk_test_51OMn9KEME0f0R52dJ1UfPTeNTzQedQPgE64w9t2gHHRWmvy0QlfXQu64WKMAwGV5W8OO6OCp0qlr5910F4vnKjxq00hlyjTHA3'); // Replace with your actual publishable key

  var checkoutButton = document.getElementById('checkout-button');

  checkoutButton.addEventListener('click', function () {
    stripe.redirectToCheckout({
      items: [{ sku: 'sku_123', quantity: 1 }], // Replace with your actual SKU
      successUrl: 'success.php',
      cancelUrl: 'cancel.php',
    })
    .then(function (result) {
      if (result.error) {
        alert(result.error.message);
      }
    });
  });
</script>

</body>
</html>
