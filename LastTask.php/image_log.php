<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: index.php");
  exit();
}
$logs = $_SESSION["uploads"] ?? [];
?>
<!DOCTYPE html><html><head><title>Image Log Table</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-dark text-white">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="dashboard.php">Dashboard</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav me-auto">
      <li class="nav-item"><a class="nav-link" href="upload.php">Upload Product</a></li>
      <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
      <li class="nav-item"><a class="nav-link" href="image_log.php">Image Log Table</a></li>
      <li class="nav-item"><a class="nav-link" href="login_log.php">Login Log Table</a></li>
    </ul>
    <span class="navbar-text me-3 text-white">Welcome <?= $_SESSION["user"] ?? '' ?></span>
    <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
  </div>
</nav>

<div class="container py-5">
  <h2>Upload Log</h2>
  <table class="table table-dark table-bordered table-striped">
    <thead><tr><th>Date</th><th>User</th><th>Type</th><th>Path</th><th>MIME</th></tr></thead>
    <tbody>
    <?php if (empty($logs)): ?>
        <tr><td colspan="5" class="text-center">No image upload logs.</td></tr>
    <?php else: ?>
        <?php foreach ($logs as $l): ?>
          <tr>
            <td><?= $l["time"] ?></td>
            <td><?= $_SESSION["user"] ?></td> <td><?= $l["type"] ?></td>
            <td><?= $l["name"] ?></td> <td><?= $l["mime"] ?></td>
          </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
  </table>
</div></body></html>