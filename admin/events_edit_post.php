<?php
session_start();
require_once '../db.php';

$event_id = $_POST['event_id'];
$title = $_POST['title'];
$country = $_POST['country'];
$state = $_POST['state'];
$description = $_POST['description'];

if($_FILES['image']['name']){
    $photo_from_db = "SELECT image FROM events WHERE id = $event_id";
    $old_photo_name = mysqli_fetch_assoc(mysqli_query($database_connection, $photo_from_db))['image'];
    $old_photo_location = "../uploads/events/".$old_photo_name;
    @unlink($old_photo_location);

    // delete old photo end
    $file_name = $_FILES['image']['name'];
    $explode = explode(".", $file_name);
    $new_file_ext = end($explode);
    $new_file_name = $event_id.'.'.$new_file_ext;
    $new_photo_location = '../uploads/events/'. $new_file_name;
    move_uploaded_file($_FILES['image']['tmp_name'], $new_photo_location);
    // update image in database
    $new_image_update = "UPDATE events SET image = '$new_file_name' WHERE id = $event_id";
    mysqli_query($database_connection, $new_image_update) or die(mysqli_error($database_connection));
    header("location: events_view.php");
}

    // update other infos except image
    $update_event_query = "UPDATE events SET title ='$title', country = '$country', state = '$state', description = '$description' WHERE id = '$event_id'";
    mysqli_query($database_connection, $update_event_query) or die(mysqli_error($database_connection));
    $_SESSION['update'] = 'Data Successfully Updated';
    header("location: events_view.php");
?>