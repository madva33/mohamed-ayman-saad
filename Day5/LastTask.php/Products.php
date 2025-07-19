<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$uploadedImages = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productName = $_POST["product_name"];
    $productDesc = $_POST["product_desc"];
    $images = $_FILES["product_images"];

    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) mkdir($uploadDir);

    for ($i = 0; $i < count($images["name"]); $i++) {
        $tmpName = $images["tmp_name"][$i];
        $originalName = $images["name"][$i];
        $type = $images["type"][$i];

        if (strpos($type, "image/") === 0) {
            $uniqueName = time() . '_' . $originalName;
            $filePath = $uploadDir . $uniqueName;
            move_uploaded_file($tmpName, $filePath);
            $uploadedImages[] = $filePath;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Products - Multiple Upload</title>
  <link href="bootstrap.css" rel="stylesheet">
</head>
<body class="bg-dark py-5">

<div class="container">
  <div class="card shadow p-4 mx-auto bg-dark" style="max-width: 700px;">
    <h3 class="text-center mb-4"> Add Product</h3>
    
    <form method="POST" enctype="multipart/form-data" >
      <div class="mb-2 ">
        <label class="form-label text-light">Product Name</label>
        <input type="text" name="product_name" class="form-control" required>
      </div>
      <div class="mb-2 ">
        <label class="form-label text-light">Description</label>
        <textarea name="product_desc" class="form-control" required></textarea>
      </div>
      <div class="mb-4">
        <label class="form-label text-light">Upload Images</label>
        <input type="file" name="product_images[]" class="form-control" accept="image/*" multiple required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Upload Product</button>
    </form>

    <?php if (!empty($uploadedImages)): ?>
      <div class="mt-4">
        <h5 class="text-center">Uploaded Images:</h5>
        <div class="row g-3 mt-2">
          <?php foreach ($uploadedImages as $img): ?>
            <div class="col-6 col-md-4">
              <img src="<?= $img ?>" class="img-fluid rounded shadow-sm border">
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
            <script src="bootstrap.bundle.js"></script>
</body>
</html>
