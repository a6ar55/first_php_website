<?php
session_start();

echo '<span style="color:#FF0000;text-align:center;">You are ADMIN!!!</span>';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emails";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>Usernames</th><th>Emails</th><th>Hashed Passwords</th><th>Delete</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<td><form method='post'><input type='hidden' name='username' value='" . $row['username'] . "'><input type='submit' name='delete' value='Delete'></form></td>";
  echo "</tr>";
}
echo "</table>";

if (isset($_POST['delete'])) {
  $username = $_POST['username'];
  $sql = "DELETE FROM users WHERE username='$username'";
  if (mysqli_query($conn, $sql)) {
    echo "User deleted successfully";
  } else {
    echo "Error deleting user: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      body {
        background-color: #000;
        color: #00FF00;
        font-family: 'Courier New', Courier, monospace;
      }

      h1 {
        color: #FF00FF;
        text-align: center;
        text-shadow: 1px 1px #000;
      }


      input[type="submit"] {
        background-color: #FF0000;
        text-align:center;
        color: #500;
        padding: 10px 20px;
        border-style: inset;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        text-shadow: 1px 1px #000;
      }
    </style>
  </head>
  <body>

  </body>
</html>


