<?php
include('db.php');

session_start();


mysql_select_db("baza1", $connect);

$sql="INSERT INTO  (imie, nazwisko)VALUES(‚$_POST[imie]’,’$_POST[nazwisko]’)";

if (!mysql_query($sql,$con))
{
die(‚Blad: ‚ . mysql_error());
}
echo "Dodano wpis!";

mysql_close($con)
?>