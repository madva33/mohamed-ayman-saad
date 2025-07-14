<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      text-align: center;
      padding: 40px;
    }

    nav {
            background-color: rgb(12, 28, 28);
            padding: 15px;
            border-radius: 8px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20 px;
            justify-content: center;
            margin: 0px;
            padding: 0px;
        }

        nav ul li a {
            color: antiquewhite;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        nav ul li a:hover {
            background-color: lightskyblue;
        }
        
 table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 15px;
}

 th, td {
    border: 1px solid #222020;
    padding: 8px;
    text-align: right;
}

th {
    background-color: #f2f2f2;
    color: #333;
}
    input {
      padding: 10px;
      margin-top: 10px;
    }
    #message {
      margin-top: 20px;
      font-size: 1.2em;
      color: green;
    }
  </style>
</head>
<body>

  <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Skills</a></li>
            <li><a href="#">Content</a></li>
        </ul>
    </nav>

  <h1 id="welcomeText">Welcome!</h1>

  <form onsubmit="return showMessage()">
    <label for="name">Enter your name:</label><br>
    <input type="text" id="name" required>
    <br><br>
    <input type="submit" value="Submit">
  </form>

  <div id="message"></div>

     <table>
        <thead>
            <tr>
                <td>id</td>
                <td>Name</td>
                <td>Fav lang</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Ahmed</td>
                <td>C++</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mohamed</td>
                <td>Java</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Ayman</td>
                <td>Python</td>
            </tr>
        </tbody>
        
    </table>
  <script>
    function showMessage() {
      const name = document.getElementById("name").value;
      const message = `Welcome, ${name}! .`;
      document.getElementById("message").innerText = message;
      document.getElementById("welcomeText").innerText = `Welcome, ${name}!`;
      return false; 
    }
  </script>

</body>
</html>
