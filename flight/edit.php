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

    $stmt = $conn->prepare("SELECT * FROM userdetails WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $updateStmt = $conn->prepare("UPDATE userdetails SET email = ?, phone = ?, gender = ? WHERE name = ?");
            $updateStmt->bind_param("ssss", $email, $phone, $gender, $name);
            $updateStmt->execute();

            header("Location: home.html");
            exit();
        }
    }

    ;
}

$conn->close();
?>
