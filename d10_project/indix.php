<?php
include 'db.php';
include 'navbar.php';

$students_count = $conn->query("SELECT COUNT(*) as total FROM students")->fetch_assoc()['total'];
$courses_count = $conn->query("SELECT COUNT(*) as total FROM courses")->fetch_assoc()['total'];
$enrollments_count = $conn->query("SELECT COUNT(*) as total FROM enrollments")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <div class="row text-center">
    <div class="col-md-4">
      <div class="card bg-gradient bg-dark text-white shadow">
        <div class="card-body">
          <h4>Students</h4>
          <p><strong><?= $students_count ?></strong> total</p>
          <a href="students/students.php" class="btn btn-primary">View</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-gradient bg-dark text-white shadow">
        <div class="card-body">
          <h4>Courses</h4>
          <p><strong><?= $courses_count ?></strong> total</p>
          <a href="courses/courses.php" class="btn btn-success">View</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-gradient bg-dark text-white shadow">
        <div class="card-body">
          <h4>Enrollments</h4>
          <p><strong><?= $enrollments_count ?></strong> total</p>
          <a href="enrollments/enrollment.php" class="btn btn-warning">View</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
