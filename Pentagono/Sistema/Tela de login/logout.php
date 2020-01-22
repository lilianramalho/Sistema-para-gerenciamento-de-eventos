<?php

session_start();

unset($_SESSION['email-login']);
unset($_SESSION['cod-login']);
unset($_SESSION['senha-login']);

session_destroy();

header("Location:login.php"); 

?>