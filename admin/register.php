<?php
session_start();
require_once '../db.php';

if(isset($_POST['submit'])){
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = md5($_POST['user_password']);
    $confirm_password = md5($_POST['confirm_password']);

    // validating the fieald if it's empty or not
    if(empty($user_name) || empty($user_email) || empty($user_password) || empty($confirm_password)){
        $_SESSION['required'] = 'Field Must Not Be Empty';
    }else{
        // Checking if the same email exists or 
        // query to check if the same email exists in the database or not
        $email_check = "SELECT * FROM users WHERE user_email = '$user_email'";
        $data_from_db = mysqli_query($database_connection, $email_check) or die(mysqli_error($database_connection));

        if($data_from_db->num_rows == 1){
            $_SESSION['email_exist'] = "This Email Already Exists";
        }else{
            // Confirm password validation
            if($user_password === $confirm_password){
                // Insert data into database after checking password match and similar email in database
                $insert_users = "INSERT INTO users(user_name, user_email, user_password) VALUES('$user_name', '$user_email', '$user_password')";
                mysqli_query($database_connection, $insert_users) or die(mysqli_error($database_connection));
                header("location: login.php");
                $_SESSION['register_success'] = "Registered Successfully! <br> Enter Email And Password To Login";
            }else{
                $_SESSION['password_error'] = "Password Doesn't Match!";
            }
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
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="css/starlight.css">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">MUN <span class="tx-info tx-normal">World</span>
            </div>
            <div class="tx-center mg-b-60"> Admin Dashboard</div>
            <!-- field Empty Session -->
            <?php if(isset($_SESSION['required'])):?>
            <div class="alert alert-danger">
                <?= $_SESSION['required']?>
            </div>
            <?php endif;
                unset($_SESSION['required'])
            ?>

            <!-- Email Validate Session -->
            <?php if(isset($_SESSION['email_exist'])):?>
            <div class="alert alert-danger">
                <?= $_SESSION['email_exist']?>
            </div>
            <?php endif;
                unset($_SESSION['email_exist'])
            ?>

            <!-- Password match session -->
            <?php if(isset($_SESSION['password_error'])):?>
            <div class="alert alert-danger">
                <?= $_SESSION['password_error']?>
            </div>
            <?php endif;
                unset($_SESSION['password_error'])
            ?>

            <form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your name" name="user_name">
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your email" name="user_email">
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Enter your password" name="user_password">
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                </div><!-- form-group -->
                <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and
                    terms of use of our website.</div>
                <button type="submit" class="btn btn-info btn-block" name="submit">Sign Up</button>
            </form>

            <div class="mg-t-40 tx-center">Already have an account? <a href="login.php" class="tx-info">Sign
                    In</a></div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
    <script>
    $(function() {
        'use strict';

        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });
    });
    </script>

</body>

</html>