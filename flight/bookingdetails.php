<?php
$servername = "localhost";
$username = "host";
$password = "";
$dbname = "flight";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM booking_details" ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["flightid"] . "</td>";
        echo "<td>" . $row["departure"] . "</td>";
        echo "<td>" . $row["destination"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td>" . $row["totalfare"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No data available</td></tr>";
}

$conn->close();
?>
