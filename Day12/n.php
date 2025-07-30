<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test123";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);


$id = 1;
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($result)) {
    echo "Name: " . $row['name'] . "<br>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>