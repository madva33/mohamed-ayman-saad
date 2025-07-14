<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MohamedAyman_my Fifth page</title>
    <style>
         body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ccc;

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
        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            width: 80%;
            background-color: white;
        }
        table th{
           background: lightgreen;
            padding: 10px;
        }
        table td{
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }
         
        ul,ol{
        background: #fff;
        padding:  15px 15px 15px 50px;
        border: 2px solid #222;
        border-radius: 10px;
        width: 80%;
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


    <h3>Frontend Technologies to Learn:</h3>
    <ol class="first-ol">
        <li>HTML</li>
        <li>CSS</li>
        <li>JavaScript</li>
    </ol>

    <ol class="second-ol">
        <li>HTML</li>
        <li>CSS</li>
        <li>JavaScript</li>
    </ol>

    <h3>Shopping List:</h3>
    <ul class="first-ul">
        <li>Milk</li>
        <li>Bread</li>
        <li>Eggs</li>
    </ul>

    <ul class="second-ul">
        <li>Milk</li>
        <li>Bread</li>
        <li>Eggs</li>
    </ul>

    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>Name</td>
                <td>Subject</td>
                <td>Grade</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Ahmed</td>
                <td>Math</td>
                <td>95</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Salma</td>
                <td>Science</td>
                <td>88</td>
            </tr>
            <tr>
                <td>3</td>
                <td>sami</td>
                <td>geography</td>
                <td>75</td>
            </tr>
        </tbody>
        
    </table>
</body>

</html>