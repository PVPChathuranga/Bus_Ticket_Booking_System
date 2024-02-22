<?php

// Set your Stripe secret key
Stripe\Stripe::setApiKey('your_secret_keysk_test_51OKFuJIuh3oPe7J9GZ7TBV1yhFpQPFrJWQ3qGOFY932GIdBhA5YERCPPjgVaGy2bDCtaPQoXQJhQw8CAjzFKgtQ6006OuPB2iR'); // Replace with your actual secret key

// Token is created by Checkout or Elements
$token = $_POST['stripeToken'];

// Amount in cents
$amount = $_POST['amount'];

try {
    // Create a charge
    $charge = \Stripe\Charge::create([
        'amount' => $amount,
        'currency' => 'usd',
        'source' => $token,
        'description' => 'Example Charge',
    ]);

    // Handle the result of the charge
    if ($charge->status == 'succeeded') {
        // Payment succeeded, perform further actions if needed
        echo 'Payment successful!';
    } else {
        // Payment failed, handle the error
        echo 'Payment failed: ' . $charge->failure_message;
    }
} catch (\Stripe\Exception\CardException $e) {
    // Card error, handle the exception
    echo 'Card Error: ' . $e->getMessage();
} catch (\Stripe\Exception\InvalidRequestException $e) {
    // Invalid request, handle the exception
    echo 'Invalid Request Error: ' . $e->getMessage();
} catch (\Stripe\Exception\AuthenticationException $e) {
    // Authentication error, handle the exception
    echo 'Authentication Error: ' . $e->getMessage();
} catch (\Stripe\Exception\ApiConnectionException $e) {
    // Network communication error, handle the exception
    echo 'API Connection Error: ' . $e->getMessage();
} catch (\Stripe\Exception\ApiErrorException $e) {
    // Generic API error, handle the exception
    echo 'Stripe API Error: ' . $e->getMessage();
}
?>
