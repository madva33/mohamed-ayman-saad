<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_input = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    $allowed_full_username = "mohamed336699as55@gmail.com";
    $allowed_password = "123456";
    $display_name = "mohamed"; 

    if ($username_input === $allowed_full_username && $password === $allowed_password) {
        $_SESSION["user"] = $display_name; 
        $_SESSION["login_log"][] = [date("Y-m-d H:i:s"), $username_input, "SUCCESS"]; 
        header("Location: dashboard.php");
        exit();
    } else {

        $_SESSION["login_log"][] = [date("Y-m-d H:i:s"), $username_input, "FAIL"]; 
        $error_message = "Invalid username or password."; 
    }
}
?>
<!DOCTYPE html>
<html><head><title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white d-flex justify-content-center align-items-center vh-100">
<form method="POST" class="bg-black p-4 rounded shadow w-100" style="max-width:400px">
  <h3 class="text-center mb-3">Login</h3>
  <?php if (isset($error_message)): ?>
    <div class="alert alert-danger text-center"><?= $error_message ?></div>
  <?php endif; ?>
  <input name="username" class="form-control mb-3 bg-dark text-white" placeholder="Username" required>
  <input name="password" type="password" class="form-control mb-3 bg-dark text-white" placeholder="Password" required>
  <button class="btn btn-primary w-100">Login</button>
</form>
</body></html>