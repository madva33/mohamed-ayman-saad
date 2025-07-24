<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}


include '../db.php';
include '../navbar.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $hours = $_POST['hours'];

  $stmt = $conn->prepare("INSERT INTO courses (title, description, price, hours) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssdi", $title, $description, $price, $hours);
  $stmt->execute();

  header("Location: courses.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Course</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
  <h3 class="mb-4">Add New Course</h3>

  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Course Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Price (EGP)</label>
      <input type="number" name="price" class="form-control" step="0.01" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Hours</label>
      <input type="number" name="hours" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Add Course</button>
  </form>
</div>

</body>
</html>
