<?php
$folder = "uploads/" . date('Y-m-d');
$images = [];

if (is_dir($folder)) {
    $files = scandir($folder);
    foreach ($files as $file) {
        if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif'])) {
            $images[] = $folder . "/" . $file;
        }
    }
}

foreach ($images as $img) {
    echo '
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
      <div class="card">
        <img src="' . htmlspecialchars($img) . '" class="card-img-top img-fluid" alt="image">
      </div>
    </div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Centered Image Cards</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white py-4">

  <div class="container text-center">
    <h2 class="mb-4">Display images in centered cards</h2>

    <div class="row justify-content-center g-3">

      <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <div class="card">
          <img src="uploads/your-image1.png" class="card-img-top img-fluid" alt="...">
        </div>
      </div>

 
      <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <div class="card">
          <img src="uploads/your-image2.png" class="card-img-top img-fluid" alt="...">
        </div>
      </div>

      

    </div>
  </div>

</body>
</html>
