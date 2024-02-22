<?php
include("connection.php"); // Include your database connection file

if (isset($_GET['id'])) {
    $bookingId = $_GET['id'];

    // Retrieve booking details from the database based on the $bookingId
    $sql = "SELECT * FROM booking WHERE id = $bookingId";
    $result = mysqli_query($conn, $sql);
    $bookingDetails = mysqli_fetch_assoc($result);

    if ($bookingDetails) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Booking Ticket</title>
            <style>
                /* Add your custom styles here */
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }

                .ticket {
                    border: 1px solid #000;
                    padding: 10px;
                    max-width: 400px;
                    margin: 0 auto;
                }

                /* Add more styles as needed */
            </style>
        </head>
        <body>

            <div class="ticket">
                <h2>Ticket Details</h2>
                <p><strong>Booking ID:</strong> <?php echo $bookingDetails['id']; ?></p>
                <p><strong>Passenger Name:</strong> <?php echo $bookingDetails['passenger_name']; ?></p>
                <p><strong>Telephone:</strong> <?php echo $bookingDetails['telephone']; ?></p>
                <p><strong>Email:</strong> <?php echo $bookingDetails['email']; ?></p>
                <p><strong>Boarding Place:</strong> <?php echo $bookingDetails['boarding_place']; ?></p>
                <p><strong>Destination:</strong> <?php echo $bookingDetails['Your_destination']; ?></p>
            </div>

            <script>
                // Optional: You can add more styling or content customization using JavaScript

                // Open the browser's print dialog when the page loads
                window.onload = function () {
                    window.print();
                };
            </script>

        </body>
        </html>
        <?php
    } else {
        echo "Booking not found.";
    }
} else {
    echo "Booking ID not provided.";
}
?>
