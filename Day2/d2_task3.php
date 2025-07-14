<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MohamedAyman_my Third page </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .form-container {
            display: flex;
            flex-direction: column;

            align-items: center;

            height: 100vh;
        }

        form {
            border: 1px solid #ccc;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        ol {
            list-style-type: armenian;
        }

        ul {
            list-style-type: square;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #000;
            padding: 8px 12px;
        }

        .btn {
            width: 100%;
        }
    </style>
</head>

<body>

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
        <input type="submit" value= "Send Data" class="btn">
    </form>


    <h2>Student Table</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Grade</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Ahmed</td>
            <td>Computer Science</td>
            <td>90</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Mona</td>
            <td>Science</td>
            <td>85</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Sarah</td>
            <td>Engineering</td>
            <td>92</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Ali</td>
            <td>Medicine</td>
            <td>88</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Mohamed</td>
            <td>Media</td>
            <td>80</td>
        </tr>
    </table>


    <h2>Frontend technology to learn</h2>
    <ol>
        <li>Html</li>
        <li>Css</li>
        <li>Js</li>
    </ol>

    <ul>
        <li>Html</li>
        <li>Css</li>
        <li>Js</li>
    </ul>

    <h2>Shopping List</h2>
    <ol>
        <li>Milk</li>
        <li>Bread</li>
        <li>Juice</li>
    </ol>

    <ul>
        <li>Milk</li>
        <li>Bread</li>
        <li>Juice</li>
    </ul>
</body>

</html>