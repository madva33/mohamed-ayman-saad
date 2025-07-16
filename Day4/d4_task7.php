<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task 7</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="bg-dark">
 <?php
$products = ["Monitor" => 1200, "Chair" => 1000, "Headset" => 400, "Keyboard"=> 300 , "Mouse"=> 150];

arsort($products);
?>
<div class="container mt-4">
    <h4 class="text-danger">Product Prices</h4>
    <ul class="list-group">
        <?php foreach ($products as $product => $price): ?>
            <li class="list-group-item d-flex justify-content-between">
                <span><?= htmlspecialchars($product) ?></span>
                <span class="badge bg-dark rounded-pill"><?= $price ?> Products</span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>


<script src="bootstrap.bundle.js"></script>
</body>
</html>