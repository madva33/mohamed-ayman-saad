<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="bootstrap.css" rel="stylesheet">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

  <div class="card p-4 shadow bg-dark text-white" style="min-width: 800px;">
    
    <div class="alert alert-success text-center mb-4  " role="alert">
      ✅ Welcome, Admin (Admin)
    </div>
    
       <div class="row text-center">
      <div class="col-md-4 mb-2">
        <a href="products.php" class="btn btn-primary w-100">Products</a>
      </div>
      <div class="col-md-4 mb-2">
        <a href="logout.php" class="btn btn-primary w-100">Logout</a>
      </div>
      <div class="col-md-4 mb-2">
        <a href="create_account.php" class="btn btn-primary w-100">Create Account</a>
      </div>
    </div>
    
  </div> 
      <script src="bootstrap.bundle.js"></script>
</body>
</html>
