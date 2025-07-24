<?php
session_start();
include 'db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // تحقق هل البريد مسجل مسبقًا
    $check = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");

    if (mysqli_num_rows($check) > 0) {
        $message = '<div class="alert alert-danger">هذا البريد مسجل بالفعل!</div>';
    } else {
        // تشفير الباسورد
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert = mysqli_query($conn, "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')");

        if ($insert) {
            $message = '<div class="alert alert-success">تم التسجيل بنجاح!</div>';
        } else {
            $message = '<div class="alert alert-danger">حدث خطأ أثناء التسجيل.</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>تسجيل حساب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>تسجيل حساب جديد</h2>
    <?= $message ?>
    <form method="POST">
        <input type="text" name="name" class="form-control mb-3" placeholder="الاسم" required>
        <input type="email" name="email" class="form-control mb-3" placeholder="البريد الإلكتروني" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="كلمة المرور" required>
        <button class="btn btn-success">تسجيل</button>
    </form>
</body>
</html>
