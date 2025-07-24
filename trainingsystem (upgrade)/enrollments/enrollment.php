<?php
session_start();
include '../db.php';
include '../navbar.php';

$sql = "SELECT enrollments.id, students.name AS student_name, courses.title AS course_title
        FROM enrollments
        JOIN students ON enrollments.student_id = students.id
        JOIN courses ON enrollments.course_id = courses.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Enrollments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>All Enrollments</h2>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <a href="add_enrollment.php" class="btn btn-primary">Add Enrollment</a>
    <?php endif; ?>
  </div>

  <?php if ($result->num_rows > 0): ?>
    <table class="table table-dark table-striped table-hover shadow">
      <thead>
        <tr>
          <th>ID</th><th>Student</th><th>Course</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['student_name']) ?></td>
            <td><?= htmlspecialchars($row['course_title']) ?></td>
            <td>
              <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
              <a href="delete_enrollment.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="alert alert-warning">No enrollments found.</div>
  <?php endif; ?>
</div>
</body>
</html>
