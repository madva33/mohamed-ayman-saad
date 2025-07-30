<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test123";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);


$id = 1;
$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo "Name: " . $row['name'] . "<br>";
}

$stmt->close();
$conn->close();
?>