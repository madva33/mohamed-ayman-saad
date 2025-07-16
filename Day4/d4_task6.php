<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task 6</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="bg-success">
  <?php
$Courses = ["HTML", "CSS", "JavaScript", "PHP"];
array_push($Courses, "MySQL");
array_unshift($Courses, "Git");
array_shift($Courses);

?>
    <div class="container mt-4">
        <h3 class="mb-3 text-primary">Available Courses</h3>
        <ul class="list-group">
        <?php foreach ($Courses as $Courses): ?>
        <li class="list-group-item"><?= $Courses ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<script src="bootstrap.bundle.js"></script>
</body>
</html>