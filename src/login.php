<?php
include 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  $username = $conn->real_escape_string($_POST['username']);
  $password = $conn->real_escape_string($_POST['password']);

  switch (true) {
    case empty(trim($username)):
      echo "Username cannot be empty";
      exit;
    case empty(trim($password)):
      echo "Password cannot be empty";
      exit;
    default:
      $check_user_query = "SELECT * FROM useraccount WHERE username = '$username'" . " AND password = '$password'";
      $check_user_result = mysqli_query($conn, $check_user_query);
      if (mysqli_num_rows($check_user_result) > 0) {
        echo "Login successful";
      } else {
        echo "Invalid username or password";
      }
  }
}
