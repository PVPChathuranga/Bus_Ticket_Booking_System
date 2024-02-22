<?php 
session_start();

  include("connection.php");
  include("function.php");

  $user_data = check_login($conn);

?>

<?php include("connection.php")?>

<!DOCTYPE html>
<html>
<head>
  <title>booking page</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cssfile/sidebar.css">
<link rel="stylesheet" href="cssfile/signUp.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cssfile/paySucess.css">


    <style type="text/css">

        body{

        background-image: url("image/20.jpg");
        background-position: center;
        background-size: cover;
        height: 700px;
        background-repeat: no-repeat;
        background-attachment: fixed;}

    </style>

</head>


    <form action="" class="card">
    <div class="container">
        <div id="alert-additional-content-5" class="alert-box" role="alert">
            <div class="img">
                <img class="img" src="image/869563.png">
            </div>
            <div class="alert">
                <i class="fa-solid fa-circle-check ico"></i>
                <h3>Ticket Booked Succesfully.Pay Now!!!</h3>
            </div>
            <div class="alert-content alert">
                Your Ticket Booking is Successfull and thank you for geting ticket from us.Click Pay Button For Online Payment 
            </div>
            <div class="alert">
                <button type="button" onclick="Close()" class="dismiss-btn" id="close">Pay Online</button>
            </div>
        </div>
    </div>
        <div class="card">
          <input type="hidden" name="bus_name" id="bus_name" value="<?php echo $_GET["bus_name"]?>"/> 
        </div>
        <div class="card">
          <input type="hidden" name="price" placeholder="Price" id="price" value="<?php echo $_GET["price"]?>" disabled required>
          
        </div>
     </form>
    <script>
        $(document).ready(function(){
           $(".dismiss-btn").on('click',function(e){
                e.preventDefault();
                    //var image_src = $(this).closest(".card").find("#image_src").attr("value");
                    var bus_name = $(this).closest(".card").find("#bus_name").attr("value");
                    var price = $(this).closest(".card").find("#price").attr("value");
                    var dt = '&bus_name='+bus_name+'&price='+price;
                    var url = 'http://localhost/Busbooking/checkout.php?'+dt; 
                    
                    $.ajax({
                         url:url,
                         method:'GET',
                         success:function(){
                              window.location.href=url;
                         }
                    });
                   
                    
           });
          
        });
   </script>
  </div>
</div>

</div>

</body>
</html>