<?php
session_start();
session_unset();
setcookie(session_name(), '', 100);
//session_destroy();
//$_SESSION = array();
header("Location:index.php");
?>