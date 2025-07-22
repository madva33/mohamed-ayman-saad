<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
       
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        $allowed_mime = ['image/jpeg', 'image/png', 'image/gif'];

       
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = mime_content_type($file_tmp);
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

       
        if (!in_array($file_ext, $allowed_ext) || !in_array($file_type, $allowed_mime)) {
            echo '<div style="color: #fff; background: #black; padding: 10px;">invalid type of image check it out!</div>';
            exit;
        }

        $upload_dir = "uploads/" . date('Y-m-d');
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);   
        }

       
        $new_name = uniqid("img_", true) . "." . $file_ext;
        $destination = $upload_dir . "/" . $new_name;

    
        if (move_uploaded_file($file_tmp, $destination)) {
            echo '<div style="color: #fff; background: black; padding: 10px;">Uploaded to ' . htmlspecialchars($destination) . '</div>';
        } else {
            echo '<div style="color: #fff; background: black; padding: 10px;">Failed to upload!</div>';
        }
    } else {
        echo '<div style="color: #fff; background: black; padding: 10px;">No file uploaded or error occurred.</div>';
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <h3>Secure Image Upload</h3>
    <input type="file" name="image" required>
    <button type="submit">send</button>
</form>
