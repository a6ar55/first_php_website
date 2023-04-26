<?php

session_start();
echo $_SESSION['email'];
$abcd=$_SESSION['email'];


$email=$_SESSION['email'];

if(isset($_POST['logout_only'])){
    session_destroy();
    header("Location: logout.php");
    exit();
}
$username = $_SESSION['username'];
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$database_name = "emails";
$conn = mysqli_connect($server_name, $db_username, $db_password, $database_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['change_mail'])){
    $change_mail = $_POST['new_email'];
    $username = $_SESSION['username'];
    $sql = "UPDATE users SET email='$change_mail' WHERE username='$username'";
    $query = mysqli_query($conn, $sql);
    mysqli_commit($conn);
    if($query) {
        echo "   updated successfully! to   \n",$change_mail;
    } else {
        echo "Error updating email: " . mysqli_error($conn);
    }
}
if(isset($_POST['logout_only'])){
  header('Location:logout.php');
}

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <style>
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }


      body {
        background-color: transparent;
        font-family: Arial, sans-serif;

      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
      }

      h1 {
        text-align: center;
        color: #333;
        font-size: 36px;
        margin-bottom: 30px;
      }

      form {
        max-width: 500px;
        margin: 0 auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0px 2px 5px #333;
      }

      label {
        display: block;
        margin-bottom: 10px;
        color: #666;
        font-size: 18px;
        font-weight: bold;
      }

      input[type="email"] {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        width: 100%;
        margin-bottom: 20px;
        font-size: 16px;
      }

      input[type="submit"] {
        background-color: #3399FF;
        color: #fff;
        padding: 10px 20px;
        border-style: outset;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      input[type="submit"]:hover {
        background-color: #1a8cff;
      }

    </style>
  </head>
  <body>
    <div class="container">
      <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
      <form method="post" action="">
        <label for="email">New Email Address:</label>
        <input type="email" name="new_email" id="email" >
        <br>
        <input type="submit" name="change_mail" value="Change Email Address">
        <input type="submit" name="logout_only" value="Logout">
      </form>
    </div>
  </body>
</html>
