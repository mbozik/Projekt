<?php
include('db.php');

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("baza", $con);

session_start();
$user= $_SESSION['name'];

$result = mysql_query("SELECT * FROM ankieta WHERE tworca = '$user'");



 echo '<table><tr><th>Nazwa ankiety</th><th>Opis ankiety</th></tr>';
while($row = mysql_fetch_array($result)) {
    echo "<tr><td>{$row['a_temat']}</td><td>{$row['a_opis']}</td></tr>";
}
echo '</table>';
  

?>