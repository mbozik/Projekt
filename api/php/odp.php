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

  
  
  $zapytanie = "SELECT a_temat FROM ankieta INNER JOIN ankieta WHERE mail.m_a_id=ankieta.a_id and mail='bozik.kizob@gmail.com'";
  $result2 = mysqli_query($connect,$zapytanie);

  if(mysqli_num_rows($result2)>0)
  {
    while($row = mysqli_fetch_array($result2)){
        echo "Temat :".$row['a_temat']."<br>";}

  }
 

?>

