<?php
session_start();
require '../db.php';


$event_id = $_GET['event_id'];

if($_GET['btn'] == 'active'){
        $update_event_query = "UPDATE events SET status = 2 WHERE id = $event_id";
}else{
    $update_event_query = "UPDATE events SET status = 1 WHERE id = $event_id";
}
mysqli_query($database_connection, $update_event_query) or die(mysqli_error($database_connection));
header("location: events_view.php");

?>