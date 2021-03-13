<?php
require_once './includes/dataBase.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="./assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="./assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="./assets/css/starlight.css">
</head>

<body>

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span
                    class="tx-info tx-normal">admin</span></div>
        <form action="loginResponse.php" method="post">
            <div class="form-group">
                <label for="l-email">EMAIL:</label>
                <input type="text" id="l-email" class="form-control" name="email" placeholder="Enter your password">
                <?php
                if (isset($_SESSION['EmailError'])) {
                    ?>
                    <div class="alert alert-danger text-center text-uppercase">
                        <?php echo $_SESSION['EmailError'];
                        unset($_SESSION['EmailError']);
                        ?>
                    </div>
                <?php } ?>


                <label for="l-password">PASSWORD:</label>
                <input type="password" id="l-password" class="form-control" placeholder="Enter your password"
                       name="password">
                <?php
                if (isset($_SESSION['passwordError'])) {
                    ?>
                    <div class="alert alert-danger text-center text-uppercase">
                        <?php echo $_SESSION['passwordError'];
                        unset($_SESSION['passwordError']);
                        ?>

                    </div>
                <?php } ?>
                <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Sign In</button>

            <div class="mg-t-60 tx-center">Not yet a member? <a href="register.php" class="tx-info">Sign Up</a>
            </div>
        </form>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->

<script src="./assets/lib/jquery/jquery.js"></script>
<script src="./assets/lib/popper.js/popper.js"></script>
<script src="./assets/lib/bootstrap/bootstrap.js"></script>

</body>
</html>
