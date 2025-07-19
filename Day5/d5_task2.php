<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>PHP Task 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-center p-5">
    
<?php
if ($_SERVER['REMOTE_ADDR'] === '127.0.0.1') {
    header("Location: denied.php");
    exit();
}
?>
    <div class="alert alert-info">
        <p><strong>طريقة الطلب:</strong> <?= $_SERVER['REQUEST_METHOD']; ?></p>
        <p><strong>عنوان IP:</strong> <?= $_SERVER['REMOTE_ADDR']; ?></p>
    </div>

</body>
</html>
