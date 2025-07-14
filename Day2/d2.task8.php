<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 id="greeting">مرحبا!</h2>
    <button onclick="sayWelcome()">Click Me </button>

    <script>
        function sayWelcome() {
            document.getElementById("greeting").innerHTML =" مرحبا بك في جافا سكريبت";
            document.getElementById("greeting").style.color="1a1";
        }
     </script>
</body>
</html>