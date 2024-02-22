<!DOCTYPE html>
<html lang="en">

<head>
    <!--Subscribe to our Youtube channel "Coder ACB"-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment completed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cssfile/paySucess.css">

</head>


<?php
session_start();

include("connection.php");

?>
  <div class="container">
          <div id="alert-additional-content-5" class="alert-box" role="alert">
              <div class="img">
                  <img class="img" src="image/869563.png">
              </div>
              <div class="alert">
                  <i class="fa-solid fa-circle-check ico"></i>
                  <h3>Payment Successful !!!</h3>
              </div>
              <div class="alert-content alert">
                  Your Payment is Successfull and thank you for geting ticket from us. 
              </div>
              <div class="alert"><a href="viewBus.php">
                  <button type="button" class="button">
                      <i class="fa-solid fa-eye"></i>
                      Ok
                  </button></a>
                  <?php
                    if (!isset($_SESSION['user_id'])) {
                      header("Location:./login.php"); // Redirect to the login page if not logged in
                      exit();
                  }
                  //echo $_SESSION['user_id'];
                  
                  // Fetch bookings associated with the logged-in user
                  $user_id = $_SESSION['user_id'];/*
                  $sql = "SELECT * FROM users WHERE user_id = $user_id";
                  $result = mysqli_query($conn, $sql);
                  ?>
                  
                  
                  <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                    // echo "<a href='generateTicket.php?id={$row['id']}' target='_blank'>Generate Ticket</a>";
                  }
                  
                  ?>*/
                  $query = "select * from users where user_id = '$user_id' limit 1";
                  $result = mysqli_query($conn, $query);
                  
                  if($result)
                  {
                      if($result && mysqli_num_rows($result) > 0)
                      {
                  
                          $user_data = mysqli_fetch_assoc($result);
                  
                              $_SESSION['user_email'] = $user_data['email'];
                              $user_email = $_SESSION['user_email'];
                              //echo $_SESSION['user_email'];
                              //$sql = "SELECT * FROM booking WHERE email == $_SESSION['user_email']";
                              $sql = "select * from booking where email = '$user_email' limit 1";
                              $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr><td><button id='close' class='dismiss-btn' onclick='viewTicket({$row['id']})'>View</button></td></tr>";
                              }
                  
                                
                              
                              
                        
                      }
                      
                  }
    
                  ?>
                  
              </div>
      </div>
      <script src="js/main.js"></script>

  <!-- The modal to display ticket details -->
  <div id="ticketModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <?php 
        if (!isset($_SESSION['user_id'])) {
          header("Location:./login.php"); // Redirect to the login page if not logged in
          exit();
      }
      //echo $_SESSION['user_id'];
      
      // Fetch bookings associated with the logged-in user
      $user_id = $_SESSION['user_id'];/*
      $sql = "SELECT * FROM users WHERE user_id = $user_id";
      $result = mysqli_query($conn, $sql);
      ?>
      
      
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        // echo "<a href='generateTicket.php?id={$row['id']}' target='_blank'>Generate Ticket</a>";
      }
      
      ?>*/
      $query = "select * from users where user_id = '$user_id' limit 1";
      $result = mysqli_query($conn, $query);
      
      if($result)
      {
          if($result && mysqli_num_rows($result) > 0)
          {
      
              $user_data = mysqli_fetch_assoc($result);
      
                  $_SESSION['user_email'] = $user_data['email'];
                  $user_email = $_SESSION['user_email'];
                  //echo $_SESSION['user_email'];
                  //$sql = "SELECT * FROM booking WHERE email == $_SESSION['user_email']";
                  $sql = "select * from booking where email = '$user_email' limit 1";
                  $result = mysqli_query($conn, $sql);
                  /*while ($row = mysqli_fetch_assoc($result)) {
                    echo "<a href='generateTicket.php?id={$row['id']}' target='_blank'>Generate Ticket</a>";
                    }*/
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<a class='print' href='generateTicket.php?id={$row['id']}' target='_blank'><button class='button2'>Print</button></a>";
                  }
      
                    
                  
            
          }
          
      }    
      
      ?>
      <div id="ticketDetails"></div>
    </div>
  </div>

  <script>

    function viewTicket(bookingId) {
      // Fetch ticket details via AJAX
      // Replace the URL with the actual path to generateTicket.php
      var url = 'generateTicket.php?id=' + bookingId;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("ticketDetails").innerHTML = this.responseText;
          openModal();
        }
      };
      xhttp.open("GET", url, true);
      xhttp.send();
    }

    function openModal() {
      document.getElementById("ticketModal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("ticketModal").style.display = "none";
    }
  </script>
  <style type="text/css">

  body{
  background-image: url("image/20.jpg");
  background-position: center;
  background-size: cover;
  height: 700px;
  background-repeat: no-repeat;
  background-attachment: fixed;

  }
  .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
  }

  .modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 30px; /* Increase the padding for a larger modal */
    width: 80%; /* Adjust the width of the modal */
    max-width: 600px; /* Set a maximum width for the modal */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
    border:5px solid green;
  }

  .close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 30px;
    color: white;
    background: black;
    border-radius:5px;
    margin: 5px;
    padding:5px 10px;

    
  }
  button{
    font-size:25px;
    padding-bottom: 5px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin-bottom:20px;
  }
  .button2{
    font-size:25px;
    padding-bottom: 5px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin-bottom:20px;
    background:green;
    color:white;
  }

  /* Add more styles as needed */

  /* Animation for the modal */
  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  /* Apply the animation to the modal content */
  .modal-content {
    animation: fadeIn 0.3s ease-in-out;
  }


  </style>


