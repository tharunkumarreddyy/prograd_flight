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
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];

    $sql = "INSERT INTO userdetails (name, email, phone, password, gender) VALUES ('$name', '$email', '$phone', '$password', '$gender')";

    if ($conn->query($sql) === TRUE) {
        header("Location: signin.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
