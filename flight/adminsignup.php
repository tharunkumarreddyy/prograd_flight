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
    $name = $_POST["name"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    

    $sql = "INSERT INTO userdetails (name, password,  phone) VALUES ('$name', '$password','$phone' )";

    if ($conn->query($sql) === TRUE) {
        header("Location: signin.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
