<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}


 include '../db.php';
 include 'navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-3">Add New Student</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="dob" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Student</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name  = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dob   = $_POST['dob'];

        $q = "INSERT INTO students (name, email, phone, date_of_birth)
              VALUES ('$name', '$email', '$phone', '$dob')";
              
        if (mysqli_query($conn, $q)) {
            echo "<div class='alert alert-success mt-3'>Student added successfully.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . mysqli_error($conn) . "</div>";
        }
    }
    ?>
</div>
</body>
</html>
