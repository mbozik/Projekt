<?php
// include('testowe.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";
// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);
   // $a=$tab[0];
  $validation_error = '';

  
  $test ="SELECT odpowiedz FROM mail INNER JOIN ankieta ON mail.m_a_id=ankieta.a_id where mail='bozik.kizob@gmail.com'";
  $result = mysqli_query($connect,$test);
  while($row1 = mysqli_fetch_array($result)){
//   $id=$row1[]
  if($row1['odpowiedz']==NULL){
    $zapytanie = "SELECT a_temat FROM ankieta INNER JOIN mail ON ankieta.a_id=mail.m_a_id where mail='bozik.kizob@gmail.com'";
    $result2 = mysqli_query($connect,$zapytanie);
    while($row = mysqli_fetch_array($result2)){
            if(mysqli_num_rows($result2)>0)
            {
                while($row = mysqli_fetch_array($result2)){
                    echo "Temat :".$row['a_temat']."<br>";}

            }
            }
        } }

//   if(mysqli_num_rows($result2)>0)
//   {
//     while($row = mysqli_fetch_array($result2)){
//         echo "Temat :".$row['a_temat']."<br>";}

//   }
 

?>

