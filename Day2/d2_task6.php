<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">

    <title>MohamedAyman_my sixth page</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    text-align: right; 
}

.container {
    display: flex;
    flex-wrap: wrap;   
    gap: 20px; 
    padding: 20px;
    justify-content: center;
}


.card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 25px;
    width: 300px; 
    box-sizing: border-box; 
    text-align: right;
    

    transition: box-shadow 0.5s ease-in-out, transform 0.5s ease-in-out;
}

.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
    transform: translateY(-5px); 
}

.card h2 {
    color: #333;
    margin-top: 0;
    margin-bottom: 15px;
    font-size: 1.5em;
}

.card p {
    color: #666;
    line-height: 1.6;
}


.card table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 15px;
}

.card th, .card td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: right;
}

.card th {
    background-color: #f2f2f2;
    color: #333;
}


.card form label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

.card form input[type="text"],
.card form input[type="email"] {
    width: calc(100% - 18px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}


.card ul {
    list-style-type: disc; 
    padding-right: 20px; 
    margin-bottom: 15px;
    color: #666;
}

.card ul li {
    margin-bottom: 8px;
}


.btn {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    margin-top: 15px;
    display: inline-block; 
    text-decoration: none;
}
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h2>Form Card</h2>
            <form action="#" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name">
                <br>
                <label for="email">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
                <br>
                <button type="submit" class="btn"> Submit Form</button>
            </form>
            <button class="btn">Button for Card One</button>
        </div>

        <div class="card">
            <h2>List Card</h2>
            <ul>
                <li>First List Item</li>
                <li>Second List Item</li>
                <li>Third List Item</li>
            </ul>
            <button class="btn">Button for Card Two</button>
        </div>

        <div class="card">
            <h2> Table Card </h2>
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
        </div>
    </div>

</body>
</html>