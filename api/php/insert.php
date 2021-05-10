<?php

//insert.php

include('db.php');

session_start();

$form_data = json_decode(file_get_contents("php://input"));

$validation_error = '';

if(empty($form_data->survey_title))
{
 $error[] = 'Nazwa jest wymagana';
}
else

if(empty($form_data->survey_opis))
{
 $error[] = 'Opis jest wymagany';
}

if(empty($error))
{
 $query = "
 INSERT INTO ankieta (a_temat, a_opis) VALUES (:survey_title, :survey_opis)
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