<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booking</title>
    <style>
        .booking-details {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
           
            max-width: 600px;
            
        }
        .booking-details p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Room Details view</h1>
   <h3> <a href="listbookings1.php">]Return to Booking List]</a>| <a href="index.php">[Return to main page]</a></h3>

    <?php
    // Simulated database or array for bookings
    $bookings = [
        16 => ['name' => 'Kellie', 'start_date' => '2024-09-12', 'end_date' => '2024-09-13', 'contact' => '0123456789', 'extras' => 'No extras', 'review' => 'Great room'],
        17 => ['name' => 'Helen', 'start_date' => '2023-11-19', 'end_date' => '2023-11-25', 'contact' => '0987654321', 'extras' => 'Extra bed', 'review' => 'Clean and quiet']
    ];
 
    // Get the booking_id from the URL
    $booking_id = isset($_GET['booking_id']) ? $_GET['booking_id'] : null;
 
    // Check if booking exists
    if ($booking_id && isset($bookings[$booking_id])) {
        $booking = $bookings[$booking_id];
        echo '<div class="booking-details">';
        echo "<p><strong>Room Name:</strong> {$booking['name']}</p>";
        echo "<p><strong>Checkin Date:</strong> {$booking['start_date']}</p>";
        echo "<p><strong>Checkout Date:</strong> {$booking['end_date']}</p>";
        echo "<p><strong>Contact Number:</strong> {$booking['contact']}</p>";
        echo "<p><strong>Extras:</strong> {$booking['extras']}</p>";
        echo "<p><strong>Review:</strong> {$booking['review']}</p>";
        echo '</div>';
    } else {
        echo "<p>Booking not found.</p>";
    }
    ?>
</body>
</html>
