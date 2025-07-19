<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>PHP task 4</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.css" rel="stylesheet">
</head>
<body class="bg-dark">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <h3 class="text-center mb-4">upload a img </h3>

        <?php if (isset($_GET['msg'])): ?>
          <div class="alert alert-<?php echo $_GET['type'] === 'success' ? 'success' : 'danger'; ?> text-center">
            <?php echo htmlspecialchars($_GET['msg']); ?>
          </div>
        <?php endif; ?>

        <form action="upload.php" method="POST" enctype="multipart/form-data" class="border p-4 rounded bg-white shadow-sm">
          <div class="mb-3">
            <label for="image" class="form-label">chosse a img </label>
            <input type="file" class="form-control" name="image" id="image" accept="image/jpeg, image/png" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">upload</button>
        </form>

        <?php if (isset($_GET['file'])): ?>
          <div class="text-center mt-4">
            <img src="uploads/<?php echo htmlspecialchars($_GET['file']); ?>" class="img-fluid rounded shadow" style="max-width: 100%; max-height: 400px;" alt="">
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>

  
</body>
</html>
