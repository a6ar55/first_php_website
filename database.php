<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$database_name = "emails";
$conn = mysqli_connect($server_name, $db_username, $db_password, $database_name);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



if (isset($_POST['submit'])) {
  $error = array();
  if($_POST['username']=='admin' && $_POST['password']=='admin'){
    header('Location: admin.php');
    exit;
  }

  if (empty($_POST['username'])) {
    $error[] = "Username is required";
  } else {
    $username = $_POST['username'];
  }

  if (empty($_POST['password'])) {
    $error[] = "Password is required";
  } else {
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
  }

  if (empty($_POST['email'])) {
    $error[] = "Email is required";
  } else {
    $email = $_POST['email'];
  }

  $check_mail = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($conn, $check_mail);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['email'] === $email) {
      $error[] = "Email already exists. TRY AGAIN!!!";
    }
  }

  $check_username = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($conn, $check_username);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if ($user['username'] === $username) {
      $error[] = "Username already exists. TRY AGAIN!!!";
    }
  }

  if (count($error) == 0) {
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $email = mysqli_real_escape_string($conn, $email);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $_SESSION['email']=$email;
    $_SESSION['username']=$username;
    if (mysqli_query($conn, $sql)) {
      echo "Successful registration";
      header('Location: welcome.php');
      exit;
    } else {
      echo "Error occurred: " . mysqli_error($conn);
    }
  } else {
    foreach ($error as $e) {
      echo $e . "<br>";
    }
  }
}
?>
