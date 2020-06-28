<?php
require '../db.php';

$event_delete_id = $_GET['event_delete_id'];
$delete_query = "DELETE FROM events WHERE id = $event_delete_id";
mysqli_query($database_connection, $delete_query);
header("location: events_view.php");
?>