<?php 
session_start();
unset($_SESSION['admin_login']);
unset($_SESSION['email']);
unset($_SESSION['admin_data']);
session_destroy();
header("Location: " . $config->admin_url . "login.php");

?>