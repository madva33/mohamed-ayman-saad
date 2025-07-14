<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>first task</title>
  <style>
    body {
      background-color: #eee;
      font-family: Arial, sans-serif;
    }

    .Firstdiv {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 50px;
    }

    .box {
      background-color: limegreen;
      width: 300px;
      padding: 20px;
      border: 4px solid white;
    }

    .box h2 {
      text-transform: lowercase;
    }

    .image-placeholder {
      background-color: #ccc;
      width: 100%;
      height: 150px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 10px 0;
    }

    .image-placeholder span {
      font-size: 18px;
      color: #333;
    }

    .box input[type="text"],
    .box input[type="password"] {
      width: 100%;
      padding: 5px;
      margin: 5px 0 10px 0;
    }

    .box a {
      display: block;
      margin-top: 10px;
      color: blue;
      text-decoration: underline;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="Firstdiv">
    <div class="box">
      <h2>first div</h2>
      <p>image without title and link without target</p>
      <p>your img & link</p>
      <a href="#">simple link to facebook without outer target</a>
      <div class="image-placeholder">
        <span>1500 × 770</span>
      </div>
      <label>username</label>
      <input type="text">
      <label>password</label>
      <input type="password">
      <a href="#">link go to second div</a>
    </div>

    <div class="box">
      <h2>second div</h2>
      <p>image with title and link with target</p>
      <p>your img & link</p>
      <a href="#" target="_blank">simple link to facebook with outer target</a>
      <div class="image-placeholder">
        <span>1500 × 770</span>
      </div>
      <label>username</label>
      <input type="text" value="username">
      <label>password</label>
      <input type="password" value="password">
      <a href="#">link go to first div</a>
    </div>
  </div>

</body>
</html>
