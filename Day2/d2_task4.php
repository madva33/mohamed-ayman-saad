<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MohamedAyman_my Fourth page</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient( to right, #7FFF00, #ADFF2F);
            font-family: Arial, sans-serif;
        }

        table {
            border-spacing: 2px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }


        th,
        td {
            border: 1px solid black;
            padding: 10px 15px;
            text-align: center;
        }

        th {
            font-weight: bold;
        }
    </style>
</head>

<body>
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
        <tfoot>
            <tr>
                <td>#</td>
                <th>Name</th>
                <th>Subject</th>
                <th>Grade</th>
            </tr>
        </tfoot>

    </table>
</body>

</html>