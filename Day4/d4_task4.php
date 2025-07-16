<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1-.0">
    <title>PHP Task 4</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body class="bg-success">
    <?php
    $Devices = [
    ["name" => "Laptop", "Price" => 15000  ,"Quantity" => 3],
    ["name" => "Phone", "Price" => 8000 ,"Quantity" => 5],
    ["name" => "Tablet", "Price" => 6000  ,"Quantity" => 2],
    ];
    ?>
<div class="container mt-5">
    <table class="table table-bordered bg-success">
        <thead class="table-light">
        <tr>
            <th>Name</th>
            <th>Price(EGP)</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($Devices as $Devices): ?>
            <?php if ($Devices["Price"] > 10000): ?>
            <tr>
            <td><?= $Devices["name"] ?></td>
            <td><?= $Devices["Price"] ?></td>
            <td><?= $Devices["Quantity"] ?></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="bootstrap.bundle.js"></script>
</body>     
</html>