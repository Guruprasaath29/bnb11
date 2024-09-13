<?php
// Include the session check file for logged-in users
include "checksession.php";

// Include database configuration
include "config.php";

// Establish a database connection
$DBC = mysqli_connect("127.0.0.1:3306", DBUSER, DBPASSWORD, DBDATABASE);

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Error: Unable to connect to MySQL. " . mysqli_connect_error();
    exit;
}

// Retrieve the room ID from the URL parameter
$id = $_GET['id'];

// Validate that the ID is not empty and is numeric
if (empty($id) or !is_numeric($id)) {
    echo "<h2>Invalid Room ID</h2>";
    exit;
}

// Fetch the room details from the database
$query = 'SELECT * FROM room WHERE roomID=' . $id;
$result = mysqli_query($DBC, $query);
$rowcount = mysqli_num_rows($result);

// HTML begins here
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Room Details View</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1, h2 {
            color: purple;
        }
        h2 a {
            color: purple;
            text-decoration: none;
            margin-right: 20px;
        }
        h2 a:hover {
            text-decoration: underline;
        }
        fieldset {
            border: 1px solid #000;
            padding: 10px;
            width: 50%;
        }
        dt {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Room Details View</h1>
    <h2>
        <a href='listbookings1.php'>[Return to the Room listing]</a>
        <a href='index.php'>[Return to the main page]</a>
    </h2>

    <?php
    // Display room details if found
    if ($rowcount > 0) {
        echo "<fieldset><legend>Booking detail #$id</legend><dl>";
        $row = mysqli_fetch_assoc($result);
        echo "<dt>Room name:</dt><dd>" . $row['roomname'] . "</dd>";
        echo "<dt>Description:</dt><dd>" . $row['description'] . "</dd>";
        echo "<dt>Room type:</dt><dd>" . $row['roomtype'] . "</dd>";
        echo "<dt>Beds:</dt><dd>" . $row['beds'] . "</dd>";
        echo "</dl></fieldset>";
    } else {
        echo "<h2>No Room found!</h2>"; // Feedback if no room found
    }

    // Free the result and close the database connection
    mysqli_free_result($result);
    mysqli_close($DBC);
    ?>
</body>
</html>
