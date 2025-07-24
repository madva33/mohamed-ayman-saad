<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}


include '../db.php';
include '../navbar.php';

$id = $_GET['id'];

$enrollment = $conn->query("SELECT * FROM enrollments WHERE id=$id")->fetch_assoc();
$students = $conn->query("SELECT * FROM students");
$courses = $conn->query("SELECT * FROM courses");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  $grade = $_POST['grade'];
  $date = $_POST['enrollment_date'];
  $conn->query("UPDATE enrollments SET student_id='$student_id', course_id='$course_id', grade='$grade', enrollment_date='$date' WHERE id=$id");
  header("Location: enrollment.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Enrollment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h2>Edit Enrollment</h2>
  <form method="POST" class="bg-dark p-4 rounded shadow-lg">
    <div class="mb-3">
      <label>Student</label>
      <select name="student_id" class="form-select bg-secondary text-white" required>
        <?php while($s = $students->fetch_assoc()): ?>
          <option value="<?= $s['id'] ?>" <?= $s['id'] == $enrollment['student_id'] ? 'selected' : '' ?>><?= $s['name'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Course</label>
      <select name="course_id" class="form-select bg-secondary text-white" required>
        <?php while($c = $courses->fetch_assoc()): ?>
          <option value="<?= $c['id'] ?>" <?= $c['id'] == $enrollment['course_id'] ? 'selected' : '' ?>><?= $c['title'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Grade</label>
      <input type="text" name="grade" value="<?= $enrollment['grade'] ?>" class="form-control bg-secondary text-white" required>
    </div>
    <div class="mb-3">
      <label>Date</label>
      <input type="date" name="enrollment_date" value="<?= $enrollment['enrollment_date'] ?>" class="form-control bg-secondary text-white" required>
    </div>
    <button class="btn btn-warning">Update</button>
    <a href="enrollment.php" class="btn btn-outline-light">Back</a>
  </form>
</div>
</body>
</html>
