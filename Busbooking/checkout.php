<?php 
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($conn);

if (isset($_GET)) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Form submitted, process the payment and save to the database

        $email = $user_data['email'];
        $c_name = $_POST['c_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $product_name = $_POST['product_name'];
        $amount = $_POST['amount'];
        $bus_name = $_POST['amount'];

        // Insert payment details into the database
        $stmt = $conn->prepare("INSERT INTO payment(amount, name, email, address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("dsss", $amount, $c_name, $email, $address);
        $stmt->execute();
        $stmt->close();

        // Remaining code for Stripe Checkout
        // ...

        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Payment successful!');
                window.location.href='print.php'; // Redirect to success page
                </script>");

        header("Location: print.php?price={$amount}&bus_name={$bus_name}");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Integration (Stripe)</title>
    <link rel="stylesheet" href="./css/_style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <style>
        .form-container > form > div > input {
            padding-top:10px;
        }
        .form-container {
        width: 100%;
        margin: 0 5px;
        padding: 1px;
        background: transparent;
        }
    </style>
<button type="button" onclick="goback()" class="back" >Go Back</button> 
<div class="row">
    <div class="col-md-6">
        <div class="form-container">
            <form autocomplete="off" action="checkout.php" method="POST">
                
                <div>

                    <input type="email" value="<?php echo $user_data['email'];?>" name="email" disabled required>
                    <label>Email</label>
                </div>
                <div>
                    <input type="text" name="c_name" required/>
                    <label>Customer Name</label>
                </div>
                <div>
                    <input type="text" name="address" required/>
                    <label>Address</label>
                </div>
                <div>
                    <input type="number" id="ph" name="phone" pattern="\d{10}" maxlength="10" required/>
                    <label>Contact number</label>
                </div>
                <div>
                    <input type="text"  name="bus_name" value="<?php echo $_GET["bus_name"]?>" disabled required/>
                    <label>Bus name</label>
                </div>
                <div>
                    <input type="text"  name="price" value="<?php echo $_GET["price"]?>" disabled required/>
                    <label>Price</label>
                </div>

                <input type="hidden" name="amount" value="<?php echo $_GET["price"]?>">
                <input type="hidden" name="product_name" value="<?php echo $_GET["bus_name"]?>">

                <script 
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_51OKFuJIuh3oPe7J90TzvzVuGLMYk3ffOXQz05fiw1lvxV0Kzx4qOtnSqSyem2Y0AAlKwf3gp0TNyhMWdqJU3kV3B00SNxFFc7S"
                data-amount=<?php echo str_replace(",","",$_GET["price"]) * 100?>
                data-name="<?php echo $_GET["bus_name"]?>"
                data-description="<?php echo $_GET["bus_name"]?>"
                data-currency="inr"
                data-locale="auto">
                </script>
            </form>
        </div>
    </div>
</div>

<script>
    function goback(){
        window.history.go(-1);
    }

    $('#ph').on('keypress', function () {
        var text = $(this).val().length;
        if (text > 9) {
            return false;
        } else {
            $('#ph').text($(this).val());
        }
    });
</script>
</body>
</html>
