<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $age   = htmlspecialchars($_POST['age']);
    $city  = htmlspecialchars($_POST['city']);
} else {
    header("Location: form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success d-flex justify-content-center align-items-center vh-100">

    <div class="bg-white p-4 rounded shadow w-25">
        <h4 class="text-center mb-3">User Profile</h4>

        <div class="alert alert-success text-center">
            Welcome, <?= $name ?>
        </div>

        <div class="card p-3">
            <p><strong>Full Name:</strong> <?= $name ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
            <p><strong>Age:</strong> <?= $age ?></p>
            <p><strong>City:</strong> <?= $city ?></p>
        </div>

        <a href="form.php" class="btn btn-primary mt-3 w-100">Back to Form</a>
    </div>

</body>
</html>
