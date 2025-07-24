<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>



<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

  <div class="card p-4 shadow bg-dark text-white text-center" style="min-width: 800px;">
    

    <div class="alert alert-success mb-4" role="alert">
       Welcome, Admin 
    </div>
    

    <div class="row text-center">
      <div class="col-md-4 mb-2">
        <a href="products.php?logged_in=true&email=<?= urlencode($email) ?>" class="btn btn-success w-100">Products</a>
      </div>
      <div class="col-md-4 mb-2">
        <a href="logout.php" class="btn btn-primary w-100">Logout</a>
      </div>
      <div class="col-md-4 mb-2">
        <a href="create_account.php?logged_in=true&email=<?= urlencode($email) ?>" class="btn btn-info w-100">Create Account</a>
      </div>
    </div>

  </div>

  <script src="bootstrap.bundle.js"></script>
</body>
</html>
