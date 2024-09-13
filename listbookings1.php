<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Bookings</title>
    <style>
        table,th,tr,td{
            border: 1px solid;
        }
        p{
            font-size: larger;
        }
    </style>
</head>
<body>
    <h1>Current bookings</h1>
    <p><a href="makebooking.php">[Make a booking]</a> | <a href="index.php">[Return to main page]</a></p>
 
    <table>
        <thead>
            <tr>
                <th>Current Bookings (Room, Dates)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $bookings = [
                ['id' => 16, 'name' => 'Kellie', 'start_date' => '2024-09-12', 'end_date' => '2024-09-13'],
                ['id' => 17, 'name' => 'Helen', 'start_date' => '2023-11-19', 'end_date' => '2023-11-25']
            ];
 
        
            foreach ($bookings as $booking) {
                echo "<tr>";
                echo "<td>{$booking['name']}, {$booking['start_date']}, {$booking['end_date']}</td>";
                echo "<td>
                        <a href='viewbooking.php?booking_id={$booking['id']}'>[view]</a>
                        <a href='editbooking.php?booking_id={$booking['id']}'>[edit]</a>
                        <a href='reviewmanage.php?booking_id={$booking['id']}'>[manage reviews]</a>
                        <a href='deletebooking.php?booking_id={$booking['id']}'>[delete]</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>