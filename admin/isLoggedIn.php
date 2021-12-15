<?php
session_start();
if (!isset($_SESSION['admin_id'])) { 
    header('Location: login.php'); 
}
if($_SESSION['type'] != 'admin'){
    header('Location: login.php'); 
}

?>