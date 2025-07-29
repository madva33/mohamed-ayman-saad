<?php
include '../db.php';
include '../navbar.php';

$sql = "SELECT enrollments.id, students.name AS student_name, courses.title AS course_name
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
  <h2 class="mb-4">All Enrollments</h2>
  <a href="add_enrollment.php" class="btn btn-primary mb-3">Add Enrollment</a>

 
  <div class="d-flex flex-wrap gap-3 justify-content-center my-4">
    <?php
    $result->data_seek(0);
    while($row = $result->fetch_assoc()): ?>
      <div class="card shadow-sm p-3 mb-3 bg-white rounded" style="width: 18rem;">
        <h5><b>Enrollment ID: <?= $row['id'] ?></b></h5>
        <p>Student: <?= htmlspecialchars($row['student_name']) ?></p>
        <p>Course: <?= htmlspecialchars($row['course_name']) ?></p>
      </div>
    <?php endwhile; ?>
  </div>


  <?php
  $result = $conn->query($sql);
  if ($result->num_rows > 0): ?>
    <table class="table table-dark table-striped table-hover shadow">
      <thead>
        <tr>
          <th>ID</th><th>Student</th><th>Course</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['student_name']) ?></td>
            <td><?= htmlspecialchars($row['course_name']) ?></td>
            <td>
              <a href="delete_enrollment.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="alert alert-warning">No enrollments found.</div>
  <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
