<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: index.php");
  exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $file = $_FILES["image"];
    $name = $file["name"];
    $uploaded_mime_type = $file["type"]; 
    $selected_type = $_POST["image_type"]; 
    $size = $file["size"];
    $tmp = $file["tmp_name"];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    if (in_array($ext, ["jpg", "jpeg", "png", "gif"]) && $size <= 10*1024*1024) { 
        $data = base64_encode(file_get_contents($tmp));
       
        $_SESSION["uploads"][] = [
            "name" => $name,
            "type" => $selected_type, 
            "mime" => $uploaded_mime_type, 
            "size" => $size,
            "data" => $data,
            "time" => date("Y-m-d H:i:s")
        ];
    } else {
        $error = "Invalid file type or size. Allowed types: JPG, JPEG, PNG, GIF. Max size: 10MB.";
    }
}
?>
<!DOCTYPE html><html><head><title>Upload Product</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-dark text-white">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="dashboard.php">Dashboard</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav me-auto">
      <li class="nav-item"><a class="nav-link" href="upload.php">Upload Product</a></li>
      <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
      <li class="nav-item"><a class="nav-link" href="image_log.php">Image Log Table</a></li>
      <li class="nav-item"><a class="nav-link" href="login_log.php">Login Log Table</a></li>
    </ul>
    <span class="navbar-text me-3 text-white">Welcome <?= $_SESSION["user"] ?? '' ?></span>
    <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
  </div>
</nav>

<div class="container py-5">
  <h2>Upload Image</h2>
  <?php if (!empty($error)) echo '<div class="alert alert-danger">'.$error.'</div>'; ?>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="imageFile" class="form-label">Choose File</label>
      <input type="file" name="image" id="imageFile" class="form-control bg-dark text-white" required>
    </div>
    <div class="mb-3">
      <label for="imageType" class="form-label">Choose type</label>
      <select name="image_type" id="imageType" class="form-select bg-dark text-white" required>
        <option value="">Select a type</option>
        <option value="avatar">Avatar</option>
        <option value="product">Product</option>
        <option value="cover">Cover</option>
        <option value="other">Other</option>
      </select>
    </div>
    <button class="btn btn-primary">Upload</button>
  </form>
  <div class="mt-3">
    <a href="gallery.php">View Gallery</a> | <a href="logout.php">Logout</a>
  </div>
</div></body></html>