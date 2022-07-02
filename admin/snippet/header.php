<?php session_start();
$file_self = explode("/", $_SERVER['PHP_SELF']);

if ($file_self[count($file_self) - 1] === 'index.php') {
        header("Location: ".$config->admin_url."login.php");
}
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
        header("Location: ".$config->admin_url."login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Connect Plus</title>
        <!-- plugins:css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= $config->admin_assets_url . 'vendors/mdi/css/materialdesignicons.min.css' ?>">
        <link rel="stylesheet" href="<?= $config->admin_assets_url . 'vendors/flag-icon-css/css/flag-icon.min.css' ?>">
        <link rel="stylesheet" href="<?= $config->admin_assets_url . 'vendors/css/vendor.bundle.base.css' ?>">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="<?= $config->admin_assets_url . 'vendors/font-awesome/css/font-awesome.min.css' ?>" />
        <link rel="stylesheet" href="<?= $config->admin_assets_url . 'vendors/bootstrap-datepicker/bootstrap-datepicker.min.css' ?>">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="<?= $config->admin_assets_url . 'css/style.css' ?>">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="<?= $config->admin_assets_url . 'images/favicon.png' ?>" />
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
        <div class="container-scroller">
                <!-- partial:partials/_navbar.html -->
                <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                                <a class="navbar-brand brand-logo" href="index.html"><img src="<?= $config->admin_assets_url . 'images/logo.svg' ?>" alt="logo" /></a>
                                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= $config->admin_assets_url . 'images/logo-mini.svg' ?>" alt="logo" /></a>
                        </div>
                        <div class="navbar-menu-wrapper d-flex align-items-stretch">
                                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                                        <span class="mdi mdi-menu"></span>
                                </button>
                                <ul class="navbar-nav navbar-nav-right">

                                        <li class="nav-item nav-profile dropdown">
                                                <a class="nav-link" id="profileDropdown" href="#" aria-expanded="false">
                                                        <div class="nav-profile-img">
                                                                <img src="<?= $config->admin_assets_url . 'images/person-icon.png' ?>" alt="image">
                                                        </div>
                                                        <div class="nav-profile-text">
                                                                <p class="mb-1 text-black">Henry Klein</p>
                                                        </div>
                                                </a>

                                        </li>
                                </ul>
                                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                                        <span class="mdi mdi-menu"></span>
                                </button>
                        </div>
                </nav>