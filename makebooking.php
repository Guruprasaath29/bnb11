<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Booking</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
       body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        a{
            font-size: large;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 45%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }
     
        table {
            width: 45%;
            margin-top: 15px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
       
        }
    </style>
</head>
<body>

<div class="loading-overlay">
    <div class="spinner"></div>
</div>

<div class="container">
    <h1>Add Booking</h1>
    <a href="index.php">[Return to main page]</a> | <a href="listbookings1.php">[Return to the Booking listing]</a>

    <form id="bookingForm" action="process_booking.php" method="post">
        <label for="room_name">Room name:</label>
        <select name="room_name" id="room_name">
            <option value="Kellie D 1">Kellie D 1</option>
            <option value="Herman">Herman S 2</option>
            <option value="Scarlett">Scarlett D 3</option>
        </select>

        <label for="customer">Customer:</label>
        <select name="customer" id="customer">
            <option value="1 Garrison Jordandd">1 Garrison Jordandd</option>
            <option value="2 irene Walkar">2 irene walker</option>
            <option value="3 forrest baldwin">3 forrest baldwin</option>
        </select>

        <label for="check_in">Check In:</label>
        <input type="text" name="check_in" id="check_in">

        <label for="check_out">Check Out:</label>
        <input type="text" name="check_out" id="check_out">

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" value="(012) 345-6789">

        <label for="extras">Extras:</label>
        <input type="text" name="extras" id="extras">

        <button type="submit">Book</button>
    </form>

    <h2>Search for room availability</h2>
    <form id="searchForm">
        <label for="from_date">From Date:</label>
        <input type="text" name="from_date" id="from_date">

        <label for="to_date">To Date:</label>
        <input type="text" name="to_date" id="to_date">

        <button type="button" id="searchButton">Search</button>
    </form>

    <div id="availabilityResults">
        <table>
            <thead>
                <tr>
                    <th>Room#</th>
                    <th>Room Name</th>
                    <th>Room Type</th>
                    <th>Beds</th>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
$(document).ready(function() {
    
    $("#check_in, #check_out, #from_date, #to_date").datepicker({
        dateFormat: 'yy-mm-dd'
    });

    $("#searchButton").click(function() {
        var fromDate = $("#from_date").val();
        var toDate = $("#to_date").val();

        $.ajax({
            url: 'search_availability.php',
            type: 'GET',
            data: {
                from_date: fromDate,
                to_date: toDate
            },
            success: function(response) {
                $("#availabilityResults tbody").html(response); 
            },
            error: function() {
                alert("An error occurred while searching for availability.");
            }
        });
    });

    $(".loading-overlay").fadeOut("slow", function() {
        $(".container").css("opacity", "1");
    });
});
</script>
</body>
</html>
