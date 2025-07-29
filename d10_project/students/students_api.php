<?php
include '../db.php';

header('Content-Type: application/json');

$result = $conn->query("SELECT * FROM students");

$students = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

echo json_encode($students);
?>
