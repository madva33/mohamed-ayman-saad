<?php
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


  <div class="d-flex flex-wrap gap-3 justify-content-center my-4">
    <?php
    $result->data_seek(0);
    while($row = $result->fetch_assoc()): ?>
      <div class="card shadow-sm p-3 mb-3 bg-white rounded" style="width: 18rem;">
        <h5><b><?= htmlspecialchars($row['name']) ?></b></h5>
        <p>Email: <?= htmlspecialchars($row['email']) ?></p>
        <p>Phone: <?= htmlspecialchars($row['phone']) ?></p>
      </div>
    <?php endwhile; ?>
  </div>


  <?php
  $result = $conn->query("SELECT * FROM students");
  if ($result->num_rows > 0): ?>
    <table class="table table-dark table-striped table-hover shadow">
      <thead>
        <tr>
          <th>ID</th><th>Name</th><th>Email</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>
              <a href="edit_students.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="delete_students.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="alert alert-warning">No students found.</div>
  <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
