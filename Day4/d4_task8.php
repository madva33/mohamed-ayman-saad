<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Task 8</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="bg-dark text-light">

<div class="container mt-5">
    <h3 class="text-info mb-4">High Salary Employees</h3>

    <?php

    $employees = [
        "Mohamed" => 6000,
        "Ayman" => 7000,
        "Mariam" => 5500,
        "Ahmed" => 4800,
        "Ali" => 4500
    ];

    
    $highSalary = array_filter($employees, function($salary) {
        return $salary > 5000;
    });

    
    $count = count($highSalary);
    ?>


    <h5 class="text-warning">List View</h5>
    <ul class="list-group mb-4">
        <?php foreach ($highSalary as $name => $salary): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= htmlspecialchars($name) ?>
                <span class="badge bg-dark rounded-pill"><?= $salary ?> EGP</span>
            </li>
        <?php endforeach; ?>
    </ul>


    <h5 class="text-warning">Table View</h5>
    <table class="table table-bordered table-hover table-striped text-light">
        <thead class="table-info text-dark">
            <tr>
                <th>Name</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($highSalary as $name => $salary): ?>
                <tr>
                    <td><?= htmlspecialchars($name) ?></td>
                    <td><?= $salary ?> EGP</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <div class="alert alert-success mt-4 text-center">
               Total High Salary Employees is : <strong><?= $count ?></strong>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
