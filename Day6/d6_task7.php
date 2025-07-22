<?php
$folder = 'uploads/';
$images = [];
$alert = '';


if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $maxSize = 4 * 1024 * 1024;
        $messages = [];

        for ($i = 0; $i < count($files['name']); $i++) {
            if ($files['error'][$i] === UPLOAD_ERR_OK) {
                $fileTmp = $files['tmp_name'][$i];
                $fileName = basename($files['name'][$i]);
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (!in_array($fileExt, $allowed)) {
                    $messages[] = " <strong>$fileName:</strong> Invalid file type.";
                } elseif ($files['size'][$i] > $maxSize) {
                    $messages[] = " <strong>$fileName:</strong> File too large (max 4MB).";
                } else {
                    $target = $folder . uniqid() . '_' . $fileName;
                    if (move_uploaded_file($fileTmp, $target)) {
                        $messages[] = " <strong>$fileName:</strong> Uploaded successfully.";
                    } else {
                        $messages[] = " <strong>$fileName:</strong> Failed to upload.";
                    }
                }
            } else {
                $messages[] = " <strong>{$files['name'][$i]}:</strong> Upload error.";
            }
        }

        $alert = '<div class="alert alert-info">' . implode('<br>', $messages) . '</div>';
    }
}


if (isset($_GET['delete'])) {
    $deletePath = $_GET['delete'];
    if (file_exists($deletePath)) {
        if (unlink($deletePath)) {
            $alert = "<div class='alert alert-success'> Image deleted successfully.</div>";
        } else {
            $alert = "<div class='alert alert-danger'> Error deleting image.</div>";
        }
    } else {
        $alert = "<div class='alert alert-warning'> File not found.</div>";
    }
}


$files = scandir($folder);
foreach ($files as $file) {
    if ($file !== '.' && $file !== '..' && preg_match('/\.(jpg|jpeg)$/i', $file)) {
        $images[] = $file;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP TASK 7 </title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">

    <?= $alert ?>


    <form method="post" enctype="multipart/form-data" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <input type="file" name="images[]" multiple class="form-control">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Upload All</button>
            </div>
        </div>
    </form>


    <?php if (count($images) > 0): ?>
        <table class="table table-bordered table-dark table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Preview</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $img): ?>
                    <tr>
                        <td><?= htmlspecialchars($img) ?></td>
                        <td><img src="<?= $folder . $img ?>" width="100" height="100"></td>
                        <td>
                            <a href="?delete=<?= urlencode($folder . $img) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this image?');">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning"> No images found.</div>
    <?php endif; ?>
</div>

</body>
</html>
