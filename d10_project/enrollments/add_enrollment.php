<?php
include '../db.php';
include '../navbar.php';

$students = $conn->query("SELECT id, name FROM students");
$courses = $conn->query("SELECT id, title FROM courses");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  $stmt = $conn->prepare("INSERT INTO enrollments (student_id, course_id) VALUES (?, ?)");
  $stmt->bind_param("id", $student_id, $course_id);
  $stmt->execute();
  header("Location: enrollment.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Enrollment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h3 class="mb-3">Enroll Student in a Course</h3>
  <form method="POST">
    <div class="mb-3">
      <label>Student</label>
      <select name="student_id" class="form-select" required>
        <option value="" disabled selected>Choose a student</option>
        <?php while($s = $students->fetch_assoc()): ?>
          <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['name']) ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Course</label>
      <select name="course_id" class="form-select" required>
        <option value="" disabled selected>Choose a course</option>
        <?php while($c = $courses->fetch_assoc()): ?>
          <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['title']) ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Enroll</button>
  </form>
</div>
</body>
</html>
