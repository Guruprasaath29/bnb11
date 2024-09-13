<?php 
// Simulated database of bookings
$bookings = [
    16 => ['name' => 'Kellie', 'checkin_date' => '2024-09-12', 'checkout_date' => '2024-09-13', 'contact_number' => 'fvu84igfd7ii', 'extras' => 'fiy54bfiyl', 'review' => 'good'],
    17 => ['name' => 'Helen', 'checkin_date' => '2023-11-19', 'checkout_date' => '2023-11-25', 'contact_number' => '', 'extras' => '', 'review' => '']
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
    <title>Room Details View</title>
    <style>
        .booking-details {
            border: 1px solid black;
            padding: 10px;
            width: 300px;
            margin-bottom: 20px;
        }
        .actions {
            margin-top: 20px;
        }
        a{
            font-size: larger;
        }
    </style>
</head>
<body>
    <h1>Room Details View</h1>
    <a href="listbookings1.php">[Return to the Booking listing]</a> | 
    <a href="index.php">[Return to the main page]</a>
    <br><br>

    <div class="booking-details">
        <p><strong>Booking detail #<?php echo htmlspecialchars($booking_id); ?></strong></p>
        <p>Room name: <?php echo htmlspecialchars($booking['name']); ?></p>
        <p>Checkin Date: <?php echo htmlspecialchars($booking['checkin_date']); ?></p>
        <p>Checkout Date: <?php echo htmlspecialchars($booking['checkout_date']); ?></p>
        <p>Contact number: <?php echo htmlspecialchars($booking['contact_number']); ?></p>
        <p>Extras: <?php echo htmlspecialchars($booking['extras']); ?></p>
        <p>Room review: <?php echo htmlspecialchars($booking['review']); ?></p>
    </div>

    <h3>Are you sure you want to delete this Booking?</h3>
    <div class="actions">
        <form action="delete_booking.php" method="POST" style="display:inline;">
            <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($booking_id); ?>">
            <input type="submit" value="Delete">
        </form>
        <a href="listbookings1.php">Cancel</a>
    </div>
</body>
</html>
