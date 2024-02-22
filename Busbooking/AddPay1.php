<?php
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($conn);

// Include the Braintree PHP library
require_once 'vendor/autoload.php';

// Configure Braintree
Braintree\Configuration::environment('sandbox');
Braintree\Configuration::merchantId('hptcz7mdtfxds425');
Braintree\Configuration::publicKey('gc9nb7gcj925w84h');
Braintree\Configuration::privateKey('82c61089d2777a1a652df1d5e98307d1');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="cssfile/payment.css">
</head>
<body>

<?php
if (isset($_POST['checkout'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cname = $_POST['cardName'];
    $cnumber = $_POST['cardNumber'];
    $expM = $_POST['expM'];
    $expY = $_POST['expYear'];
    $cvv = $_POST['cvv'];
    $amount = $_POST['amount'];

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        // Create a Braintree transaction
        $result = Braintree\Transaction::sale([
            'amount' => $amount,
            'creditCard' => [
                'number' => $cnumber,
                'expirationDate' => $expM . '/' . $expY,
                'cvv' => $cvv,
            ],
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success || !is_null($result->transaction)) {
            // Transaction successful
            // Insert payment details into the database
            $stmt = $conn->prepare("INSERT INTO payment(amount, name, email, address, city, state, zip_code, card_name, card_number, exp_month, exp_year, cvv) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssssissssi", $amount, $name, $email, $address, $city, $state, $zip, $cname, $cnumber, $expM, $expY, $cvv);
            $stmt->execute();

            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Transaction Successful. Successfully added!!!');
                    window.location.href='paySuccess.php';
                    </script>");

            $stmt->close();
        } else {
            // Transaction failed
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Transaction Failed. Error: " . $result->message . "');
                    </script>");
        }
    }
}
?>

<div class="container">
    <form method="POST">
        <!-- Your existing HTML form for billing and payment details -->
    </form>
</div>

</body>
</html>
