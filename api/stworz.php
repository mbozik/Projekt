<?php

include('php/db.php');

session_start();

$form_data = json_decode(file_get_contents("php://input"));

$validation_error = '';

if(empty($form_data->a_temat))
{
 $error[] = 'Nazwa jest wymagana';
}
else
 {
  $data[':a_temat'] = $form_data->a_temat;
 }

 if(empty($form_data->a_opis))
{
 $error[] = 'Opis jest wymagany';
}
else
 {
  $data[':a_opis'] = $form_data->a_opis;
 }


if(empty($error))
{
 $query = "
 INSERT INTO ankieta (a_temat, a_opis) VALUES (:a_temat, :a_opis)
 ";
 $statement = $connect->prepare($query);
 if($statement->execute($data))
 {
  $message = 'Ankieta stworzona';
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