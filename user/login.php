<?php session_start();
$config = include('../config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $config->assets_url . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= $config->assets_url . 'custom.css' ?>">
    <title>Liquid Quiz</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="card" style="width: 30rem;">
                <!-- <img src="<? //=$config->assets_url.'uploads/images/default_qiuz.jpeg'
                                ?>" class="card-img-top" alt="..."> -->
                <div class="card-body text-primary">
                    <h5 class="card-title text-center">Liquid Quiz</h5>
                    <form id="test-login-form" method="post" action="quiz-test.php">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email your email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" />
                            <div id="error-email"></div>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="passcode">Passcode</label>
                            <input type="text" id="passcode" name="passcode" class="form-control" placeholder="Enter passcode" />
                            <div id="error-passcode"></div>
                        </div>
                        <button class="btn btn-primary btn-block mb-4" id="submit-test-login-form" type="submit">
                            <i class="fas fa-spinner fa-spin" style="display:block;"></i>
                            <span class="btn-text">Submit</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= $config->assets_url . 'custom.js' ?>"></script>
    <script type="text/javascript">
        const onConfirmRefresh = function(event) {
            event.preventDefault();
            return event.returnValue = "Are you sure you want to leave the page?";
        }

        window.addEventListener("beforeunload", onConfirmRefresh, {
            capture: true
        });
    </script>

</body>

</html>