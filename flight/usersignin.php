<?php
$servername = "localhost";
$username = "host";
$password = "";
$dbname = "flight";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];

    $query = "SELECT * FROM userdetails WHERE name = '$name' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
