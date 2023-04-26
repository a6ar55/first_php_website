<?php
session_start();

?>
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
      
      input[type="text"], input[type="email"], input[type="password"] {
        text-align: center;
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 50px;
        border: none;
        border-radius: 10px;
        box-shadow: 0px 2px 5px #ccc;
        font-size: 20px;
        font-family:Arial;
        
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
    <h1>Registration Form</h1>
    <form method="post" action="database.php">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required placeholder="walter white">
      <label for="email">Email address:</label>
      <input type="email" name="email" id="email" required placeholder="walterwhite@newmexico.us">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required placeholder="**********">
      <input type="submit" name="submit" value="Register now">
      <input type="button" value="Login" onclick="window.location.href='logout.php'" />
    </form>
  </body>
</html>

