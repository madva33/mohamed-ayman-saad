
<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save'])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        if (!empty($name) && !empty($email)) {
            $_SESSION['users'][] = ['name' => $name, 'email' => $email];
        }
    }

    if (isset($_POST['clear'])) {
        session_unset();       
        session_destroy();     
        header("Location: " . $_SERVER['PHP_SELF']); 
        exit;
    }
    //     if (isset($_POST['clear'])) {
    //         $_SESSION['users'] = [];
    //     }

    if (isset($_POST['remove_last'])) {
        if (!empty($_SESSION['users'])) {
            array_pop($_SESSION['users']);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP TASK 3</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body class="bg-dark">

<div class="container py-5">

    <form method="post" class="bg-dark p-4 rounded text-white">
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Name" required>
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="mb-3">
             <button type="submit" name="save" class="btn btn-success w-100">Save</button>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <button type="submit" name="clear" class="btn btn-danger w-100">clear Session</button>
            </div>
            <div class="col-6">
                <button type="submit" name="remove_last" class="btn btn-warning w-100 text-white">remove last</button>
            </div>
        </div>

        <?php if (empty($_SESSION['users'])): ?>
            <div class="alert alert-danger">No users!</div>
        <?php endif; ?>
    </form>

    <?php if (!empty($_SESSION['users'])): ?>
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped ">
                <thead class="table-dark">
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                    </tr>
                </thead>
                <tbody >
                    <?php foreach ($_SESSION['users'] as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
