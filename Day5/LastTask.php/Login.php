<?php
session_start();
$correct_email = "admin@example.com";
$correct_password = "123456";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email === $correct_email && $password === $correct_password) {
        $_SESSION["logged_in"] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Email or password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="bootstrap.css" rel="stylesheet">
</head>
<body class="bg-primary d-flex justify-content-center align-items-center vh-100 bg-dark">

  <div class="card p-4 shadow w-100 bg-dark " style="max-width: 800px;">
    <h3 class="text-center mb-4">Login</h3>
    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label text-light">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label text-light">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100 ">Login</button>
    </form>
    <div class="text-center  small mt-3 text-light">
      Email: <strong>admin@example.com</strong><br>
      Password: <strong>123456</strong>
    </div>
  </div>
      <script src="bootstrap.bundle.js"></script>
</body>
</html>
