<?php
session_start();
require_once '../db.php';

if($_FILES['image']['name']){
    // code for getting the file extension
    $file_name = $_FILES['image']['name'];
    $after_explode = explode(".", $file_name);
    $file_extension = end($after_explode);

    // accepted file type
    $accepted_files = array('jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG');
    
    // code for checking if the file extension exists or not
    if(in_array($file_extension, $accepted_files)){
        // checking the size of the image
        if($_FILES['image']['size'] <= 1000000){
            // inserting datas into database
            $title = htmlentities(ucwords($_POST['title']), ENT_QUOTES);
            $country = htmlentities(ucwords($_POST['country']), ENT_QUOTES);
            $state = htmlentities(ucwords($_POST['state']), ENT_QUOTES);
            $description = htmlentities($_POST['description'], ENT_QUOTES);

            $insert = "INSERT INTO events(title, country, state, description) VALUES('$title', '$country', '$state', '$description')";
            mysqli_query($database_connection, $insert) or die(mysqli_error($database_connection));

            // fetching the id number fromdatabase
            $last_id = mysqli_insert_id($database_connection);

            // creating a new name for image based on id
            $new_file_name = $last_id.".".$file_extension;

            // code for moving the uploaded image from tmp path to project folder
            $old_location = $_FILES['image']['tmp_name'];
            $new_location ="../uploads/events/".$new_file_name;
            move_uploaded_file($old_location, $new_location);

            
            // Final database update with new image name and extension
            $events_update_query = "UPDATE events SET image = '$new_file_name' WHERE id = $last_id";
            mysqli_query($database_connection, $events_update_query)  or die(mysqli_error($database_connection));
            $_SESSION['event_success'] = 'Data Has Been Successfully Added';
            header("location: events_view.php");
            

        }else{
            $_SESSION['size_error'] = 'Image size is bigger';
            header("location: events_view.php");
        }
    }else{
        $_SESSION['file_error'] = 'File format is not supported';
        header("location: events_view.php");
    }
}else{
    $_SESSION['file_empty'] = 'Please Attach a Photo';
    header("location: events_view.php");
}
?>