<?php
session_start();
unset($_SESSION['user']);
session_destroy();
header("Location: https://projekt-wine.vercel.app/api/index.php");