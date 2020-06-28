<?php
session_start();
require_once '../db.php';

if(isset($_POST['login'])){
    $user_email = $_POST['user_email'];
    $user_password = md5($_POST['user_password']);

    // checking if the fields are empty or not
    if(empty($user_email) || empty($user_password)){
        $_SESSION['required'] = 'Field Must Not Be Empty';
    }else{
        // code for checking if the email and password exist in database or not
        $data_check = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'";
        $data_from_db = mysqli_query($database_connection, $data_check) or die(mysqli_error($database_connection));

        // This chunk of code runs depending upon if the email and password exist in database or not
        if($data_from_db->num_rows == 1){
            $_SESSION['login'] = 'Login Successful!';
            $_SESSION['login_success'] = 'Login Successfully';
            header('location: dashboard.php');
        }else{
            $_SESSION['wrong'] = 'Your email or password is wrong!';
        }
    }
}

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

    <title>MUN</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="css/starlight.css">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">MUN <span class="tx-info tx-normal">World</span>
            </div>
            <div class="tx-center mg-b-60"> Admin Dashboard</div>
            <!-- Successfull register session -->
            <?php if(isset($_SESSION['register_success'])):?>
            <div class="alert alert-success text-center">
                <?= $_SESSION['register_success']?>
            </div>
            <?php endif;
                unset($_SESSION['register_success'])
            ?>

            <!-- field Empty Session -->
            <?php if(isset($_SESSION['required'])):?>
            <div class="alert alert-danger">
                <?= $_SESSION['required']?>
            </div>
            <?php endif;
                unset($_SESSION['required'])
            ?>

            <!-- Email Password error session -->
            <?php if(isset($_SESSION['wrong'])):?>
            <div class="alert alert-danger">
                <?= $_SESSION['wrong']?>
            </div>
            <?php endif;
                unset($_SESSION['wrong'])
            ?>

            <!-- Auth session -->
            <?php if(isset($_SESSION['auth'])):?>
            <div class="alert alert-danger">
                <?= $_SESSION['auth']?>
            </div>
            <?php endif;
                unset($_SESSION['auth'])
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your email" name="user_email">
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Enter your password" name="user_password">

                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block" name="login">Sign In</button>
            </form>
            <div class="mg-t-60 tx-center">Not yet a member? <a href="register.php" class="tx-info">Sign Up</a>
            </div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>

</body>

</html>