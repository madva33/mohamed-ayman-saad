<?php
include '../db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM enrollments WHERE id = $id");
header("Location: enrollment.php");
