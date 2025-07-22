<!DOCTYPE html>
<html>
<head>
    <title>php task 2</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body class=" bg-dark" >


<form method="POST" class="card shadow p-4 mx-auto bg-dark">
    
   
        <label for="sentence">Enter a sentence:</label><br>
        <input type="text" name="sentence" id="sentence" required><br><br>
        <input type="submit" value="Sumbit">
</form>

<div class="card shadow p-4 mx-auto bg-dark" >
    <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sentence = $_POST["sentence"];


    $length = strlen($sentence);


    $replace = str_replace("bad", "***", $sentence);


    $firstTen = substr($sentence, 0, 10);


    $ucfirst = ucfirst(strtolower($sentence)); 


    $upper = strtoupper($sentence);

    echo "<h3>Results:</h3>";
    echo "Original Sentence: $sentence<br>";
    echo "Length: $length <br>";
    echo "Replace (bad => ***): $replace<br>";
    echo "First 10 characters: $firstTen<br>";
    echo "ucfirst: $ucfirst<br>";
    echo "strtoupper: $upper<br>";
}
?>
</div>

</body>
</html>
