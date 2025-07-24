<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}


include '../db.php';
include '../navbar.php';

$id = $_GET['id'];
$course = $conn->query("SELECT * FROM courses WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $conn->query("UPDATE courses SET title='$title', description='$description' WHERE id=$id");
  header("Location: courses.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Course</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h3>Edit Course</h3>
  <form method="POST">
    <div class="mb-3">
      <label>Title</label>
      <input type="text" name="title" value="<?= htmlspecialchars($course['title']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control" required><?= htmlspecialchars($course['description']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
  </form>
</div>
</body>
</html>
