<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}


include '../db.php';
include '../navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);
  $phone = $conn->real_escape_string($_POST['phone']);
  $dob = $_POST['dob'];

  $check = $conn->query("SELECT * FROM students WHERE email = '$email'");
  if ($check->num_rows == 0) {
    $stmt = $conn->prepare("INSERT INTO students (name, email, phone, date_of_birth) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $dob);
    $stmt->execute();
    header("Location: students.php");
  } else {
    $error = "This email already exists.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h3>Add New Student</h3>
  <?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>
  <form method="POST">
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Date of Birth</label>
      <input type="date" name="dob" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Student</button>
  </form>
</div>
</body>
</html>
