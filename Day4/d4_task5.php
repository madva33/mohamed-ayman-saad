<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task 5</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
   <?php
$Tools = ["VS Code", "Git", "GitHub", "Figma","Postman"];
echo "Tools Count" . count($Tools) . "<br>";
if (in_array("GitHub", $Tools)) {
echo "GitHub is in the list.<br>";
}
echo "All Tools: ";
print_r(array_values($Tools));
?>

<script src="bootstrap.bundle.js"></script>
</body>
</html>