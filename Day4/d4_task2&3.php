<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task 2&3</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
$person = [
"Name" => "Mohamed",
"Job Title" => "Full Stack Developer",
"Department" => " UI/UX",
"Salary" => "10,000 EGP " 
];
?>
<div class="container mt-5">
<ul class="list-group">
<?php foreach ($person as $key => $value): ?>
<li class="list-group-item">
<strong><?= $key ?>:</strong> <?= $value ?>
</li>
<?php endforeach; ?>
</ul>
</div>

    <script src="bootstrap.bundle.js"></script>
</body>
</html>