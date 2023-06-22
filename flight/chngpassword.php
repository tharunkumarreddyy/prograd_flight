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
    $oldPassword = $_POST["old_password"];
    $newPassword = $_POST["new_password"];

    $stmt = $conn->prepare("SELECT * FROM userdetails WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($oldPassword, $user['password'])) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateStmt = $conn->prepare("UPDATE userdetails SET password = ? WHERE name = ?");
            $updateStmt->bind_param("ss", $hashedPassword, $name);
            $updateStmt->execute();

            header("Location: home.html");
            exit();
        }
    }

    
}

$conn->close();
?>
