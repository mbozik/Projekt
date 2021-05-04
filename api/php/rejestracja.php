<?php
session_start();
require("db.php");


// initializing variables
$username = "";
$email    = "";
$errors = array(); 


  if (isset($_POST['register'])) {
    // receive all input values from the form
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($email)) { array_push($errors, "Email jest wymagany"); }
  if (empty($password)) { array_push($errors, "Hasło jest wymagane"); }
  if ($password != $password2) {
	array_push($errors, "Hasła się różnią");
}
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Użytkownik z takim emailem jest już w bazie.");
    }
  }

  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (email, password) 
              VALUES('$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    $_SESSION['success'] = "You are now logged in";
    header('location: */index.php');

}}
?>