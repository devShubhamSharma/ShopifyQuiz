<?php
include('../user/UserCRUD.php');
if(!isset($_SESSION['login']))   {
    header('Location:login.php');
} 
echo"<pre>"; print_r($_SESSION);echo "</pre>";
$config = include("../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $config->assets_url . 'custom.css' ?>">
    <link rel="stylesheet" href="<?= $config->assets_url . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= $config->assets_url . 'content-styles.css' ?>" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
    <title>Quiz</title>
</head>

<body>