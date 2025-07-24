<?php
session_start();
include 'db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);


        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['name'];
            $_SESSION['login_time'] = date("Y-m-d H:i:s");

            header("Location: dashboard.php");
            exit();
        } else {
            $message = " password is incorrect ";
        }
    } else {
        $message = "  Email is incorrect";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>log in </title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>log in </h2>

    <?php if ($message): ?>
        <div class="alert alert-danger"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" class="form-control mb-3" placeholder=" Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder=" password" required>
        <button class="btn btn-primary">login</button>
    </form>
      <div class="text-center small mt-3 text-dark">
      Email: <strong>admin@example.com</strong> / Password: <strong>123456</strong><br>
      Email: <strong>test@example.com</strong> / Password: <strong>78910</strong>
    </div>
</body>
</html>
