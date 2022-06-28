<?php session_start();
$config = include('../config.php');
$aa = explode("/", $_SERVER['PHP_SELF']);
if ($aa[count($aa) - 1] === 'index.php') {
        header("Location: login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Simpla Admin</title>
        <link rel="stylesheet" href="<?= $config->admin_assets_url . 'css/reset.css' ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?= $config->admin_assets_url . 'css/style.css' ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?= $config->admin_assets_url . 'css/invalid.css' ?>" type="text/css" media="screen" />
        <script type="text/javascript" src="<?= $config->admin_assets_url . 'scripts/jquery-1.3.2.min.js' ?>"></script>
        <script type="text/javascript" src="<?= $config->admin_assets_url . 'scripts/simpla.jquery.configuration.js' ?>"></script>
        <script type="text/javascript" src="<?= $config->admin_assets_url . 'scripts/facebox.js' ?>"></script>
        <script type="text/javascript" src="<?= $config->admin_assets_url . 'scripts/jquery.wysiwyg.js' ?>"></script>
        <script type="text/javascript" src="<?= $config->admin_assets_url . 'scripts/jquery.datePicker.js' ?>"></script>
        <script type="text/javascript" src="<?= $config->admin_assets_url . 'scripts/jquery.date.js' ?>"></script>
</head>

<body>
        <div id="body-wrapper">