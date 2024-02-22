
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
  <title>user view packages E-Transit</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cssfile/sidebar.css">
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
    width:90%;
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
form {
    margin-top: 20px;
    margin-right: 20px;
    text-align: right;
  }

  label {
    font-size: 16px;
    margin-right: 10px;
  }

  input[type="date"] {
    padding: 8px;
    font-size: 14px;
  }

  input[type="submit"] {
    padding: 8px 15px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
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


    <h1 class="adminTopic">Booking Your Ticket...</h1>
    <form method="GET" action="">
      <label for="filterDate">Select Date:</label>
      <input type="date" id="filterDate" name="filterDate">
      <input type="submit" value="Filter">
    </form>




    <?php
// Get the filtered date from the form submission
$filterDate = isset($_GET['filterDate']) ? $_GET['filterDate'] : '';

// Construct the SQL query
$sqlget = "SELECT * FROM route";

// Check if a filter date is provided
if (!empty($filterDate)) {
    // Add a WHERE clause to filter by date
    $sqlget .= " WHERE departure_date = '$filterDate'";
}

// Execute the query
$sqldata = mysqli_query($conn, $sqlget) or die('error getting');

echo "<table>";
echo "<tr>
      <th>ID</th>
      <th>Via City</th>
      <th>Destination</th>
      <th>Bus Name</th>
      <th>Departure Date</th>
      <th>Departure Time</th>
      <th>Cost</th>
      <th>Booking</th>
    </tr>";

while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
    echo "<tr><td>";
    echo $row['id'];
    echo "</td><td>";
    echo $row['via_city'];
    echo "</td><td>";
    echo $row['destination'];
    echo "</td><td>";
    echo $row['bus_name'];
    echo "</td><td>";
    echo $row['departure_date'];
    echo "</td><td>";
    echo $row['departure_time'];
    echo "</td><td>";
    echo $row['cost'];
    echo "</td>";

    // Booking button with a link to AddBooking.php
    echo "<td>
            <button style='border:2px solid yellow; border-radius:7px; background-color:red;color:white;'>
              <a href='AddBooking.php?id={$row['id']}&date={$row['departure_date']}&cost={$row['cost']}&bus_name={$row['bus_name']}&place={$row['via_city']}&des={$row['destination']}'>
                Book Now
              </a>
            </button>
          </td></tr>";
}

echo "</table>";
?>






</div>

</body>
</html>