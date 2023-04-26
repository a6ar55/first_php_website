
<!DOCTYPE html>
<html>
  <head>
    <title>REGISTRATION PORTAL</title>
    <style>
     body{
         text-align:left;
         color:#333;
     }
      
      h1 {
        text-align: center;
        color: #333;
      }
      
      form {
      font:courier;
        max-width: 500px;
        margin: 0 auto;
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 35px;
        box-shadow: 0px 2px 5px #333;
      }
      
      label {
        display: block;
        margin-bottom: 10px;
        color: #666;
      }
      input[type="submit"] {
        background-color: #3399FF;
        text-align:center;
        color: #fff;
        padding: 10px 20px;
        border-style: outset;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
      }
            input[type="login"] {
        background-color: #3399FF;
        text-align:center;
        color: #fff;
        padding: 10px 20px;
        border-style: outset;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
      }
      
      input[type="submit"]:hover {
        background-color: #333;
      }
    </style>
  </head>
  <body>
    <h1>LOGIN NOW !!!</h1>
    <form method="post" action="sigin.php">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
      <input type="submit" name="login" value="Login">
    </form>

