<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$db = mysqli_connect("localhost","root","","baza");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>