 <?php

$uploadDir = 'uploads/';
$maxFileSize = 3 * 1024 * 1024; 
$allowed = ["png","jpg","jpeg"];

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    header("Location: index.php?msg=  fail to upload the img .&type=error");
    exit;
}

$fileTmp  = $_FILES['image']['tmp_name'];
$fileSize = $_FILES['image']['size'];
$fileType = mime_content_type($fileTmp);
$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);


if (in_array($fileType, $allowed)) {
    header("Location: index.php?msg=  this type is not supported .&type=error");
    exit;
}


if ($fileSize > $maxFileSize) {
    header("Location: index.php?msg= the max size is 3MB.&type=error");
    exit;
}


$newName = uniqid('img_', true) . '.' . $extension;

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if (move_uploaded_file($fileTmp, $uploadDir . $newName)) {
    header("Location: index.php?msg=   img uploaded successfully!&type=success&file=" . urlencode($newName));
    exit;
} else {
    header("Location: index.php?msg=    img is not uploaded .&type=error");
    exit;
} 
?>
