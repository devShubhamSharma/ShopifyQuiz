<?php
include('../user/UserCRUD.php');
if(!isset($_SESSION['login']) && !isset($_SESSION['email']))   {
    header('Location:login.php');
} 

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
    <script>
                window.settings = {
                        'host': `<?= $config->host ?>`,
                        'base_url': `<?= $config->base_url ?>`,
                        'root_url': `<?= $config->root_url ?>`,
                        'assets_url': `<?= $config->assets_url ?>`,
                        'admin_assets_url': `<?= $config->admin_assets_url ?>`,
                        'admin_url': `<?= $config->admin_url ?>`,
                }
        </script>
</head>

<body>