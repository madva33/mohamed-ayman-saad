<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html><html><head><title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
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
  <h1>Welcome to your dashboard, <?= $_SESSION["user"] ?>!</h1>
</div>
</body></html>