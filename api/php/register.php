<?php

//register.php

include('db.php');

$form_data = json_decode(file_get_contents("php://input"));

$message = '';
$validation_error = '';

$query1 = "SELECT  users (email, password) VALUES (:email, :password) ";

if(empty($form_data->email))
{
 $error[] = 'Email is Required';
}
else
{
 if(!filter_var($form_data->email, FILTER_VALIDATE_EMAIL))
 {
  $error[] = 'Invalid Email Format';
 }
 else
 {
  $data[':email'] = $form_data->email;
 }
}

if(empty($form_data->password))
{
 $error[] = 'Hasło jest wymagane';
}
else
if(empty($form_data->password2))
{
 $error[] = 'Hasło jest wymagane';
}
else
if($form_data->password2==$form_data->password)
{
 $data[':password'] = password_hash($form_data->password, PASSWORD_DEFAULT);
}
else
{
    $error[] = 'Hasła nie są takie same';
}

if(empty($error))
{
 $query = "
 INSERT INTO users (email, password) VALUES (:email, :password)
 ";
 $statement = $connect->prepare($query);
 if($statement->execute($data))
 {
  $message = 'Registration Completed';
 }
}
else
{
 $validation_error = implode(", ", $error);
}

$output = array(
 'error'  => $validation_error,
 'message' => $message
);

echo json_encode($output);


?>