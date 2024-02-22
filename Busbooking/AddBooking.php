<?php 
session_start();

  include("connection.php");
  include("function.php");

  $user_data = check_login($conn);

?>

<?php include("connection.php")?>
<!--
<!DOCTYPE html>
<html>
<head>
  <title>admin Panel suraksha</title>
</head>
<body>

   <?php// echo "welcome:".  $_SESSION['id']; ?>
   <a href="adminLogout.php"><button class="btnHome">logout</button></a>

</body>
</html>

-->


<!DOCTYPE html>
<html>
<head>
  <title>booking page</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cssfile/sidebar.css">
<link rel="stylesheet" href="cssfile/signUp.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style type="text/css">

      body{

      background-image: url("image/1.jpg");
      background-position: center;
      background-size: cover;
      height: 700px;
      background-repeat: no-repeat;
      background-attachment: fixed;

    }
    .adminTopic{
      text-align: center;
      color: #fff;
      

    }

table
{
    width:99%;
    border-collapse: separate !important;
    margin:auto;
    /*/table-layout:fixed;/*/
    text-align:center;
    margin-top:50px;
    background-color: rgb(255, 255, 255);
    border-radius: 10px 10px 0px 0px;

}
table th
{
    border-bottom:2px solid rgb(187, 187, 187);
    padding:10px 0px 10px 0px;
    font-family: "balsamiq_sansitalic" !important;
}
table tr td
{
    border-right: 2px solid rgb(187, 187, 187);
    height: 58px;
    padding: 22px 0px 0px 0px;
    font-family: "monospace;" !important;
    border-bottom: 2px solid rgb(187, 187, 187);
    font-size: 20px;
}
table tr td a
{
    /*background-color: rgb(255, 196, 0);*/
    color: white;
    border-radius: 5px;
    padding: 6px;
    text-decoration: none;
    margin: 10px;
    font-weight: 700;
}

table tr td button:hover
{

  /*
    background: rgb(255, 255, 255);
    text-decoration:underline;
    color:tomato;
    padding: 4px;
    border:2px solid tomato;
    transition:background-color 0.2s;*/

    padding: 5px 5px 5px 5px;
  border: 2px solid yellow;
    border-radius: 7px;
    background-color: red;
    color: white;
    cursor: pointer;
}
button 
{
    padding: 5px 5px 5px 5x;
}
.btnPolicy{

  padding: 5px 5px 5px 5px;
  border: 2px solid yellow;
    border-radius: 7px;
    background-color: red;
    color: white;
    margin-left: 20px;
}

.btnPolicy:hover{

  background:red;
    padding: 7px 7px 7px 7px;
    cursor: pointer;

}
.idclass{

      width: 100%;
      border-radius: 3px;
      border: 1px solid #9597a6;
      padding: 10px;
      outline: none;
      color: black;

    }


  </style>
</head>
<body>
  <input type="checkbox" id="check">

  <label for="check">
<i class="fa fa-bars" id="btn"></i>
<i class="fa fa-times" id="cancle"></i>


  </label>
  <div class="sidebar">
<header><img src="image/avatar.png">
<p><?php echo $user_data['username'];?></p>
</header>
<ul>



    <li><a href="viewBus.php">Ticket Booking</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="logout.php">logout</a></li>
    
  <!--  <li><a href="#">Event</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Service</a></li>
    <li><a href="#">Contact</a></li>-->
    </ul>
 <!--  <li>
      <div class="social-links">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-youtube"></i></a>
        
      </div>
    </li>-->
   

</div>



<div class="sidebar2">


    <h1 class="adminTopic">Get Your Ticket...</h1>


    <?php
if (isset($_POST['AddBooking'])) {
    $passenger = $_POST['passenger_name'];
    $tel = $_POST['tel'];
    $email = $user_data['email'];
    $board_place = $_GET["place"];
    $desti = $_GET["des"];
    $bus_name = $_GET["bus_name"];
    $cost= $_GET["cost"];

    if ($conn->connect_error) {
        die('Connection Failed :' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO booking(passenger_name, telephone, email, boarding_place, Your_destination,price) VALUES(?, ?, ?, ?, ?,?)");
        $stmt->bind_param("ssssss", $passenger, $tel, $email, $board_place, $desti,$cost);

        if ($stmt->execute()) {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Successfully added!!!');
                </script>");
                header("Location: AddBooking1.php?price={$cost}&bus_name={$bus_name}");
        } else {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Error adding data. Please try again.');
                
                </script>");
        }

        $stmt->close();
        $conn->close();
    }
}
?>
  

  <div class="wrapper">
  <div class="registration_form">
    <div class="title">
    Geting A Ticket...
    </div>

    <form action="#" class="card" method="POST">
      <div class="form_wrap">
        
        <div class="input_wrap">
          <label for="title">Passenger Name</label>
          <input type="text" id="title" name="passenger_name" placeholder="Passenger Name" required>
        </div>


        <div class="input_wrap">
          <label for="title">Telephone</label>
          <input type="text" id="title" name="tel" placeholder="Tel" required>
        </div>

        <div class="input_wrap">
          <label for="title">E-mail</label>
          <input type="E-mail" id="title" name="email"  class="idclass" value="<?php echo $user_data['email'];?>" disabled required>
        </div>

        <div class="input_wrap">
          <label for="title">Board Place</label>
          <input type="text" id="title" name="board_place" value="<?php echo $_GET["place"]?>" disabled required>
        </div>

        <div class="input_wrap">
          <label for="title">Your destination</label>
          <input type="text" id="title" name="Your_destination" value="<?php echo $_GET["des"]?>" disabled required>
          <input type="hidden" name="bus_name" id="bus_name" value="<?php echo $_GET["bus_name"]?>"/> 
        </div>
        <div class="input_wrap">
          <label for="title">Price</label>
          <input type="text" name="price" placeholder="Price" id="price" value="<?php echo $_GET["cost"]?>" disabled required>
          

        </div>


        <div class="input_wrap">
          <input type="submit" value="Booking Now" class="submit_btn" name="AddBooking">
          
        </div>



      </div>
    </form>
  </div>
</div>

</div>

</body>
</html> 