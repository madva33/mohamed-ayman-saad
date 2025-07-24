<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}


include '../db.php';
include '../navbar.php';

$id = $_GET['id'];
$student = $conn->query("SELECT * FROM students WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $conn->query("UPDATE students SET name='$name', email='$email' WHERE id=$id");
  header("Location: students.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h3>Edit Student</h3>
  <form method="POST">
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
  </form>
</div>
</body>
</html>
