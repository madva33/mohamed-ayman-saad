<?php
session_start();
include '../db.php';
include '../navbar.php';

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Students</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h2 class="mb-4">All Students</h2>
  <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
  <a href="add_students.php" class="btn btn-primary ">Add New Student</a>
  <?php endif; ?>
  <?php if ($result->num_rows > 0): ?> 
    <table class="table table-dark table-striped table-hover shadow mt-5">
      <thead>
        <tr>
          <th>ID</th><th>Name</th><th>Email</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
              <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                  <a href="edit_students.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="delete_students.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="alert alert-warning">No students found.</div>
  <?php endif; ?>
</div>
</body>
</html>
