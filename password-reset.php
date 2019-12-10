<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="assets/fonts/feather/feather.min.css">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- Theme CSS -->

    <link rel="stylesheet" href="assets/css/theme.min.css" id="stylesheetLight">

    <!-- Custom -->
    <link rel="stylesheet" href="assets/css/custom.css" id="stylesheetLight2">
    <link rel="stylesheet" href="./assets/css/custom-inner.css">
    <style>
        body {
            display: none;
        }
    </style>


    <title>Gradecity - Reset Password</title>
</head>

<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-4 my-5">

                <div class="text-center">
                    <a href="user-dashboard.php">
                        <img class="img-fluid form-logo" src="./assets/img/logo.png" />
                    </a>
                </div>

                <!-- Heading -->
                <h3 class="display-4 text-center">
                    Send Password Reset Link
                </h3>

                <p class="text-muted text-center mb-5">
                    Enter your email to get a password reset link.
                </p>
                <div class="show_result"></div>
                <div class="result_message"></div>
                <!-- Form -->
                <form method="post" action="mail/reset-mail.php" id="reset_password_form">

                    <!-- Email address -->
                    <div class="form-group">

                        <!-- Label -->
                        <label>Email Address</label>

                        <!-- Input -->
                        <input type="email" name="reset_password_email" id="reset_password_email" class="form-control" placeholder="name@address.com">

                    </div>


                    <!-- Submit -->
                    <button type="submit" id="reset_password_btn" name="reset_email_btn" class="btn btn-lg btn-block btn-primary mb-3">
                        Send Link
                    </button>

                    <!-- Link -->
                    <div class="text-center">
                        <small class="text-muted text-center">
                            Remember your password? <a href="index.php">Log in</a>.
                        </small>
                    </div>

                </form>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->

    <!-- JAVASCRIPT
    ================================================== -->
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.min.js"></script>
    <script type="text/javascript" src="assets/js/user.js"></script>

</body>

</html>