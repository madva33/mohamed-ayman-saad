<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
        
        .form-container {
            display: flex;
            flex-direction: column;

            align-items: center;
            
            height: 100vh;
        }

        form {
            width: 80%;
            border: 1px solid #ccc;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(142, 147, 218, 0.1);
            background-color: #f9f9f9;
        }
        .btn {
            width: 100%;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Courses</a></li>
            <li><a href="#">Content</a></li>
        </ul>
    </nav>
    <h2>Form</h2>
    <form>
        Name: <input type="text" name="name"><br><br>
        Email: <input type="email" name="email"><br><br>
        Password: <input type="password" name="password"><br><br>
        Gender:
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>
        About You:<br>
        <textarea rows="5" cols="30"></textarea><br><br>
        <input type="submit" value="Send Data" class="btn">
    </form>


</body>

</html>