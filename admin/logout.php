<?php

session_start();


// Remove all session data

$_SESSION = [];


// Destroy session

session_destroy();


// Go back to login

header("Location: login.php");

exit;

?>