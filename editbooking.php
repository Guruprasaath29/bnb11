<?php 
// Simulated database of bookings
$bookings = [
    16 => ['name' => 'Kellie D 1', 'checkin_date' => '2024-09-12', 'checkout_date' => '2024-09-13', 'contact_number' => '', 'extras' => '', 'review' => 'good'],
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
    <title>Edit a Booking</title>
    <!-- Include jQuery and jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <style>
        label {
            display: block;
            margin-top: 10px;
        }
        a{
            font-size: larger;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Apply jQuery UI Datepicker to input fields
            $("#checkin_date, #checkout_date").datepicker({
                dateFormat: "yy-mm-dd" // Set date format to match the desired format
            });
        });
    </script>
</head>
<body>
    <h1>Edit a booking</h1>
    <a href="listbookings1.php">[Return to the Bookings listing]</a> | 
    <a href="index.php">[Return to the main page]</a>
    <br><br>
    
    <h2>Booking made for <?php echo htmlspecialchars($booking['name']); ?></h2>
    <form action="update_booking.php" method="POST">
        <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($booking_id); ?>">

        <label for="rooms">Rooms (name, type, beds):
            <select name="rooms" id="rooms">
                <option value="<?php echo htmlspecialchars($booking['name']); ?>" selected><?php echo htmlspecialchars($booking['name']); ?></option>
                <!-- Add more room options here if needed -->
            </select>
        </label>
        
        <label for="checkin_date">Checkin Date:
            <input type="text" id="checkin_date" name="checkin_date" value="<?php echo htmlspecialchars($booking['checkin_date']); ?>">
        </label>
        
        <label for="checkout_date">Checkout Date:
            <input type="text" id="checkout_date" name="checkout_date" value="<?php echo htmlspecialchars($booking['checkout_date']); ?>">
        </label>
        
        <label for="contact_number">Contact number:
            <input type="text" id="contact_number" name="contact_number" value="<?php echo htmlspecialchars($booking['contact_number']); ?>">
        </label>
        
        <label for="booking_extras">Booking Extras:
            <textarea id="booking_extras" name="booking_extras"><?php echo htmlspecialchars($booking['extras']); ?></textarea>
        </label>
        
        <label for="room_review">Room Review:
            <input type="text" id="room_review" name="room_review" value="<?php echo htmlspecialchars($booking['review']); ?>">
        </label>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
