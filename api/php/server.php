<?php
session_start();
require("db.php");

$errors = array(); 


  if (isset($_POST['register'])) {
    // receive all input values from the form
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

  if (empty($login)) { array_push($errors, "Email jest wymagany"); }
  if (empty($password)) { array_push($errors, "Hasło jest wymagane"); }
  if ($password != $password2) {
	array_push($errors, "Hasła się różnią");
}
  $user_check_query = "SELECT * FROM users WHERE email='$login' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['email'] === $login) {
      array_push($errors, "Użytkownik z takim emailem jest już w bazie.");
    }
  }

  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO users (email, password) 
              VALUES('$login', '$password')";
    mysqli_query($db, $query);
    $_SESSION['email'] = $login;
    $_SESSION['success'] = "You are now logged in";
    header('location: /projekt/api/profile.php');

}}


if (isset($_POST['login_user'])) {
    $login = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($login)) {
        array_push($errors, "Email jest wymagany");
    }
    if (empty($password)) {
        array_push($errors, "Hasło jest wymagane");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$login' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $login;
          $_SESSION['success'] = "You are now logged in";
          header('location: /projekt/api/profile.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
header("Location: http://localhost/projekt/api/profile.php");      
?>