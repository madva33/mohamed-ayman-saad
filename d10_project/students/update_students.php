<?php 
include '../db.php'; 
include 'navbar.php'; 
?>

<?php

$id = $_GET['id'];


$q = "SELECT * FROM students WHERE id = $id";
$res = mysqli_query($conn, $q);
$student = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-3">Edit Student</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="<?= $student['name'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="<?= $student['email'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="<?= $student['phone'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="dob" value="<?= $student['date_of_birth'] ?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Student</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $name  = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dob   = $_POST['dob'];

        $q = "UPDATE students 
              SET name='$name', email='$email', phone='$phone', date_of_birth='$dob'
              WHERE id=$id";

        if (mysqli_query($conn, $q)) {
            echo "<div class='alert alert-success mt-3'>Student updated successfully.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . mysqli_error($conn) . "</div>";
        }
    }
    ?>
</div>
</body>
</html>
