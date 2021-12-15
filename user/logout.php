<?php
// Starting session
session_start();
 
// Removing session data
session_destroy();
header('Location: login.php'); 
?>