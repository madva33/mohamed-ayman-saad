<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Task 9</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="bg-dark text-light">

<div class="container mt-4">
    <h3 class="text-info">Students Grades</h3>

    <?php 
    $students = [
        [
            "name" => "Mohamed",
            "course" => "Java",
            "grade" => 95,
        ],
        [
            "name" => "Ayman",
            "course" => "JS",
            "grade" => 61,
        ],
        [
            "name" => "Ali",
            "course" => "PHP",
            "grade" => 44,
        ],
        [
            "name" => "Saad",
            "course" => "SQL",
            "grade" => 77,
        ]
    ];
    ?>

    <table class="table table-bordered table-hover table-striped text-light">
        <thead class=" text-dark">
            <tr>
                 <th>Name</th>
                <th>Course</th>
                <th>Grade</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $index => $student): ?>
                <?php
                $status = $student['grade'] >= 60 ? 'Passed' : 'Failed';
                $badgeColor = $student['grade'] >= 60 ? 'success' : 'danger';
                $rowClass = $student['grade'] >= 60 ? 'table-success' : 'table-danger';
                ?>
                <tr class="<?= $rowClass ?>">
                    <td><?= htmlspecialchars($student['name']) ?></td>
                    <td><?= htmlspecialchars($student['course']) ?></td>
                    <td>
                        <span class="badge bg-<?= $badgeColor ?>">
                            <?= $student['grade'] ?>%
                        </span>
                    </td>
                    <td><?= $status ?></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $index ?>">
                            View
                        </button>

                        <div class="modal fade text-center" id="modal<?= $index ?>" tabindex="-1" aria-labelledby="modalLabel<?= $index ?>" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-center text-success" id="modalLabel<?= $index ?>">Student Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p><strong>Name:</strong> <?= htmlspecialchars($student['name']) ?></p>
                                <p><strong>Course:</strong> <?= htmlspecialchars($student['course']) ?></p>
                                <p><strong>Grade:</strong> <?= $student['grade'] ?>%</p>
                                <p><strong>Status:</strong> <?= $status ?></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="bootstrap.bundle.js"></script>
</html>
