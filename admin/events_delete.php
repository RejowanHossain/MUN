<?php
require '../db.php';

$event_id = $_GET['event_id'];
$delete_query = "DELETE FROM events WHERE id = $event_id";
mysqli_query($database_connection, $delete_query);
header("location: events_view.php");
?>