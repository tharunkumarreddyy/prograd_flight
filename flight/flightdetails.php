<?php
$servername = "localhost";
$username = "host";
$password = "";
$dbname = "flight";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $selectedDate = $_POST["date"];
    $selectedTime = $_POST["timing"];

    $sql = "SELECT * FROM flights WHERE date = '$selectedDate' AND time = '$selectedTime'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $flightNumber = $row["flight_number"];
            $source = $row["source"];
            $destination = $row["destination"];
            $departureTime = $row["time"];
            $price = $row["price"];

            echo "<div class='flight-details'>";
        echo "<h3>Flight Details:</h3>";
        echo "<div class='form-group'>";
        echo "<label for='flight-number'>Flight Number:</label>";
        echo "<span id='flight-number'>$flightNumber</span>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='source'>Source:</label>";
        echo "<span id='source'>$source</span>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='destination'>Destination:</label>";
        echo "<span id='destination'>$destination</span>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='departure-time'>Departure Time:</label>";
        echo "<span id='departure-time'>$departureTime</span>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='price'>Price:</label>";
        echo "<span id='price'>$price</span>";
        echo "</div>";
        echo "<a href='selectseats.html' class='btn btn-primary'>Select Seat</a>";
        echo "</div>";
        }
    } 

    $conn->close();
}
?>