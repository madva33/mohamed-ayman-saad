<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$uploaded = false;
$imagePath = '';
$name = '';
$email = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $image = $_FILES["profile_image"];

    if ($image["error"] === 0 && strpos($image["type"], "image/") === 0) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) mkdir($uploadDir);
        $imagePath = $uploadDir . time() . '_' . basename($image["name"]);
        move_uploaded_file($image["tmp_name"], $imagePath);
        $uploaded = true;
    } else {
        $error = "Please upload a valid image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Account</title>
  <link href="bootstrap.css" rel="stylesheet">
</head>
<body class="bg-dark py-5">

<div class="container">

  <div class="card shadow p-4 mx-auto bg-dark text-white" style="max-width: 600px;">
    <h3 class="text-center mb-4">Create Account</h3>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($uploaded): ?>
      <div class="alert alert-success text-center">✅ Account Created Successfully</div>

      <div class="card mx-auto text-center" style="width: 18rem;">
        <img src="<?= $imagePath ?>" class="card-img-top" alt="Profile Image" style="height: 250px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title text-capitalize"><?= $name ?></h5>
          <p class="card-text text-muted"><?= $email ?></p>
          <a href="products.php" class="btn btn-primary">Go to Products</a>
        </div>
      </div>

    <?php else: ?>
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Profile Picture</label>
          <input type="file" name="profile_image" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-info w-100">Create Account</button>
      </form>
    <?php endif; ?>
  </div>

</div>
      <script src="bootstrap.bundle.js"></script>
</body>
</html>
