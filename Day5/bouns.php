<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Upload</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-center text-primary"> Upload Images</h2>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $allowedExtensions = ['jpg', 'jpeg'];
            $maxSize = 4 * 1024 * 1024; 
            $allowedMimeTypes = ['image/', 'wave/'];

            $files = $_FILES['images'];
            $errors = [];
            $uploadedFiles = [];

            foreach ($files['name'] as $i => $name) {
                $tmpName = $files['tmp_name'][$i];
                $size = $files['size'][$i];
                $error = $files['error'][$i];
                $type = mime_content_type($tmpName);
                $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

                if ($error !== UPLOAD_ERR_OK) {
                    $errors[] = " File $name had an upload error.";
                    break;
                }

                if (!in_array($ext, $allowedExtensions)) {
                    $errors[] = " File $name has an unsupported extension ($ext).";
                    break;
                }

                if ($size > $maxSize) {
                    $errors[] = " File $name is larger than 4MB.";
                    break;
                }

                $validMime = false;
                foreach ($allowedMimeTypes as $mime) {
                    if (strpos($type, $mime) === 0) {
                        $validMime = true;
                        break;
                    }
                }

                if (!$validMime) {
                    $errors[] = " File $name has an invalid MIME type ($type).";
                    break;
                }

                $uploadedFiles[] = $name;
            }

            if (empty($errors)) {
                if (!is_dir('uploads')) {
                    mkdir('uploads', 0777, true);
                }

                foreach ($files['name'] as $i => $name) {
                    move_uploaded_file($files['tmp_name'][$i], 'uploads/' . basename($name));
                }

                echo '<div class="alert alert-success text-center"> Images uploaded successfully!</div>';
                echo "<pre class='bg-light border p-3 rounded'>";
                print_r($uploadedFiles);
                echo "</pre>";
            } else {
                echo '<div class="alert alert-danger">';
                foreach ($errors as $e) {
                    echo "<p>$e</p>";
                }
                echo '</div>';
            }
        }
        ?>

        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="images" class="form-label">Choose Images:</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>
            <button type="submit" class="btn btn-primary w-100">Upload</button>
        </form>
    </div>
</div>

</body>
</html>
