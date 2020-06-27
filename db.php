<?php
define('HOSTNAME', 'localhost');
define("USERNAME", 'root');
define('PASSWORD', '');
define('DBNAME', 'munworld');

$database_connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
?>