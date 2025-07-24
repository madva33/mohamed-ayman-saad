<?php
session_start();

$valid_user = "admin";


$hashed_password = password_hash("123456", PASSWORD_DEFAULT);


if ($_POST['username'] === $valid_user && password_verify($_POST['password'], $hashed_password)) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['login_time'] = date("Y-m-d H:i:s");
    $_SESSION['message'] = "تم تسجيل الدخول بنجاح";
    header("Location: dashboard.php");
    exit();
} else {
    $_SESSION['message'] = "اسم المستخدم أو كلمة المرور غير صحيحة";
    header("Location: login.php");
    exit();
}
