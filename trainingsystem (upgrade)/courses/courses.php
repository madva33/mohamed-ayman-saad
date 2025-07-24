<?php
session_start();
include '../db.php';
include '../navbar.php';

$result = $conn->query("SELECT * FROM courses");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Courses</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>All Courses</h2>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <a href="add_courses.php" class="btn btn-primary">Add New Course</a>
    <?php endif; ?>
  </div>

  <?php if ($result->num_rows > 0): ?>
    <table class="table table-dark table-striped table-hover shadow">
      <thead>
        <tr>
          <th>ID</th><th>Title</th><th>Description</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td>
              <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
              <a href="edit_courses.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="delete_courses.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="alert alert-warning">No courses found.</div>
  <?php endif; ?>
</div>
</body>
</html>
