<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>PHP Task 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-center p-5">


    <div class="container mt-4">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>PHP_SELF</td>
                    <td><?= $_SERVER['PHP_SELF']; ?></td>
                </tr>
                <tr>
                    <td>SERVER_NAME</td>
                    <td><?= $_SERVER['SERVER_NAME']; ?></td>
                </tr>
                <tr>
                    <td>HTTP_HOST</td>
                    <td><?= $_SERVER['HTTP_HOST']; ?></td>
                </tr>
                <tr>
                    <td>USER_AGENT</td>
                    <td><?= $_SERVER['HTTP_USER_AGENT']; ?></td>
                </tr>
                <tr>
                    <td>REQUEST_METHOD</td>
                    <td><?= $_SERVER['REQUEST_METHOD']; ?></td>
                </tr>
                <tr>
                    <td>REMOTE_ADDR</td>
                    <td><?= $_SERVER['REMOTE_ADDR']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
