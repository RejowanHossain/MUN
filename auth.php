<?php
if(!isset($_SESSION['login'])){
    $_SESSION['auth'] = 'Enter Email Password To Login';
    header('location: login.php');
}
?>