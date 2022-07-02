<?php session_start();
session_destroy();
$config = include('../config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $config->assets_url . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= $config->assets_url . 'custom.css' ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>admin Login | Liquid Quiz</title>
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
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="card" style="width: 30rem;">
                <!-- <img src="<? //=$config->assets_url.'uploads/images/default_qiuz.jpeg'
                                ?>" class="card-img-top" alt="..."> -->
                <div class="card-body text-primary">
                    <h5 class="card-title text-center">Liquid Quiz | Admin Login</h5>
                    <form id="admin_login_form" method="post">
                        <input type="hidden" name="action" value="admin/login">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email your email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" />
                            <div id="error-email"></div>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="text" id="password" name="password" class="form-control" placeholder="Enter password" />
                            <div id="error-password"></div>
                        </div>
                        <button class="btn btn-primary btn-block mb-4" id="submit_admin_login_form" type="submit">
                            <span class="btn-text">Submit</span>
                        </button>
                        <div class="alert alert-danger login-error d-none">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= $config->admin_assets_url . 'js/admin.js' ?>"></script>
    <script type="text/javascript">
        // const onConfirmRefresh = function(event) {
        //     event.preventDefault();
        //     return event.returnValue = "Are you sure you want to leave the page?";
        // }
        //  window.addEventListener("beforeunload", onConfirmRefresh, {
        //     capture: true
        // });
    </script>

</body>

</html>