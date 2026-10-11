<?php
session_start();
session_destroy();               // remove the login
header("Location: login.php");   // go back to the login page
exit();
?>
