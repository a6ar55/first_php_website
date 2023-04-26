<?php
session_start();
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "emails";
$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

  $username = $_POST['username'];
  $password = $_POST['password'];
  if($_POST['username']=='admin' && $_POST['password']=='admin'){
    header('Location:admin.php');
  }
  else{


  $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);


    if (password_verify($password, $user['password'])) {

      header('Location: welcome.php');
      exit;
    } else {

      echo "Wrong password";
    }
  } else {

    echo "User not registered";
  }
}

?>