<?php
session_start();
if (!isset($_SESSION['customer_id'])) { 
    header('Location: login.php'); 
}
if($_SESSION['type'] != 'customer'){
    header('Location: login.php'); 
}

?>