<?php
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
  <h2 class="mb-4">All Courses</h2>


<div class="d-flex flex-wrap gap-3 justify-content-center my-4">
  <?php
  $result->data_seek(0);
  while($row = $result->fetch_assoc()): ?>
    <div class="card bg-secondary text-white shadow p-3 mb-3 rounded" style="width: 18rem;">
      <h5><b><?= htmlspecialchars($row['title']) ?></b></h5>
      <p>Description: <?= htmlspecialchars($row['description']) ?></p>
      <p>Hours: <?= htmlspecialchars($row['hours']) ?></p>
      <p>Price: <?= htmlspecialchars($row['price']) ?></p>
    </div>
  <?php endwhile; ?>
</div>



  <?php
  $result = $conn->query("SELECT * FROM courses");
  if ($result->num_rows > 0): ?>
    <table class="table table-dark table-striped table-hover shadow">
      <thead>
        <tr>
          <th>ID</th><th>Title</th><th>Description</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['description'] ?></td>
            <td>
              <a href="edit_courses.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="delete_courses.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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
