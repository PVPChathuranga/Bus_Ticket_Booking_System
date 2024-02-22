<?php 
session_start();

  include("connection.php");
  include("function.php");

  $user_data = check_login($conn);
 
?>

<?php
  if(isset($_GET)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Integartion (Stripe)</title>
    <link rel="stylesheet" href="./css/_style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<button type="button" onclick="goback()" class="back" >Go Back</button> 
<div class="row">
    <div class="col-md-6">
        <div class="form-container">
            <form autocomplete="off" action="checkout-charge.php" method="POST">
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
                    <input type="text"  name="product_name" value="<?php echo $_GET["bus_name"]?>" disabled required/>
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
                data-key="pk_test_51OMn9KEME0f0R52dJ1UfPTeNTzQedQPgE64w9t2gHHRWmvy0QlfXQu64WKMAwGV5W8OO6OCp0qlr5910F4vnKjxq00hlyjTHA3"
                data-amount=<?php echo str_replace(",","",$_GET["price"]) * 100?>
                data-name="<?php echo $_GET["bus_name"]?>"
                data-description="<?php echo $_GET["bus_name"]?>"
                data-currency="inr"
                data-locale="auto">
                </script>
            </form>
        </div>
    </div>
    

<?php
  }
?>
<script>
    function goback(){
        window.history.go(-1);
    }

    $('#ph').on('keypress',function(){
         var text = $(this).val().length;
         if(text > 9){
              return false;
         }else{
            $('#ph').text($(this).val());
         }
         
    });
</script>
</body>
</html>