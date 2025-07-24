<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, name, role, password FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $name, $role, $db_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if ($password === $db_password) {
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $name;
            $_SESSION["role"] = $role;

            if ($role === "admin") {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            echo "password is incorrect";
        }
    } else {
        echo " Email is incorrect";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white d-flex align-items-center justify-content-center vh-100">
    <div class="card bg-secondary p-4" style="min-width: 400px;">
        <h2 class="text-center"> Log In</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Email </label>
                <input type="email" name="email" class="form-control" required/>
            </div>
            <div class="mb-3">
                <label> password</label>
                <input type="password" name="password" class="form-control" required/>
            </div>
            <button type="submit" class="btn btn-light w-100">Submit</button>
        </form>
    </div>
</body>
</html>
