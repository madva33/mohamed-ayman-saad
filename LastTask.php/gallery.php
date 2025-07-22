<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: index.php");
  exit();
}

if (isset($_GET["delete"]) && is_numeric($_GET["delete"])) {
    $index = (int)$_GET["delete"];
    if (isset($_SESSION["uploads"][$index])) {
        array_splice($_SESSION["uploads"], $index, 1);
        header("Location: gallery.php");
        exit();
    }
}

$images = $_SESSION["uploads"] ?? [];
?>
<!DOCTYPE html><html><head><title>Gallery</title>
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
  <h2>Gallery</h2>
  <table class="table table-dark table-bordered table-striped">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Type</th>
        <th>Size</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($images)): ?>
        <tr><td colspan="5" class="text-center">No images uploaded yet.</td></tr>
      <?php else: ?>
        <?php foreach($images as $index => $img): ?>
          <tr>
            <td>
              <?php
              if (isset($img['mime']) && isset($img['data'])) {
                  echo '<img src="data:' . $img['mime'] . ';base64,' . $img['data'] . '" style="width: 50px; height: 50px; object-fit: cover;" class="rounded">';
              } else {
                  echo 'No Image Data';
              }
              ?>
            </td>
            <td><?= $img['name'] ?? 'N/A' ?></td>
            <td><?= $img['type'] ?? 'N/A' ?></td>
            <td><?= isset($img['size']) ? round($img['size']/1024, 2) . ' KB' : 'N/A' ?></td>
            <td><a href="gallery.php?delete=<?= $index ?>" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
  <div class="mt-3">
    <a href="dashboard.php">Back to Dashboard</a> | <a href="upload.php">Upload</a> | <a href="logout.php">Logout</a>
  </div>
</div></body></html>