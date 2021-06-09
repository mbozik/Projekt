<?php

/**
 * Plik odpowiada za wylogowanie użytkownika z witryny
 */

session_start();

session_destroy();

header("location:../index.php");
