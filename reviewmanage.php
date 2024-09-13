<?php 
// Simulated database of bookings
$bookings = [
    16 => ['name' => 'Kellie D 1', 'checkin_date' => '2024-09-12', 'checkout_date' => '2024-09-13', 'contact_number' => '', 'extras' => '', 'review' => ''],
    17 => ['name' => 'Helen D 1', 'checkin_date' => '2023-11-19', 'checkout_date' => '2023-11-25', 'contact_number' => '', 'extras' => '', 'review' => '']
];

// Get booking_id from URL query parameter
$booking_id = isset($_GET['booking_id']) ? $_GET['booking_id'] : null;

// Check if the booking exists
if ($booking_id && isset($bookings[$booking_id])) {
    $booking = $bookings[$booking_id];
} else {
    echo "<p>Booking not found.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit/Add Room Review</title>
    <style>
        label {
            display: block;
            margin-top: 10px;
        }
        a{
            font-size: larger;
        }
    </style>
</head>
<body>
    <h1>Edit/add room review</h1>
    <a href="listbookings1.php">[Return to the Bookings listing]</a> | 
    <a href="index.php">[Return to the main page]</a>
    <br><br>
    
    <form action="update_review.php" method="POST">
        <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($booking_id); ?>">

        <label for="room_review">Reviews:
            <input type="text" id="room_review" name="room_review" value="<?php echo htmlspecialchars($booking['review']); ?>">
        </label>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
