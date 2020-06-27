<?php 
session_start();
require_once '../auth.php';
$title = 'Events Edit';
require_once './assets/header.php';
require_once './assets/sidebar.php';
require_once '../db.php';

// fetching data from database to view on the table
$event_id = $_GET['event_id'];
$select_datas = "SELECT * FROM events WHERE id = $event_id";
$from_db = mysqli_query($database_connection, $select_datas) or die(mysqli_error($database_connection));
$after_assoc = mysqli_fetch_assoc($from_db);
?>

<div class="container">
    <div class="sl-pagebody">
        <div class="row row-sm mt-5 ml-5">
            <div class="col-xl-12 text-center">
                <h1 class=" mt-2">Events Edit</h1>
                <hr class="mb-5">
            </div>
            <div class="col-sm-4 col-xl-4 m-auto">
                <form action="events_edit_post.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="event_id" value="<?=$event_id?>">

                        <label for="exampleInputEmail1">MUN Title</label>
                        <input type="text" class="form-control" name="title" value="<?=$after_assoc['title']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Country</label>
                        <input type="text" class="form-control" name="country" value="<?=$after_assoc['country']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">State</label>
                        <input type="text" class="form-control" name="state" value="<?=$after_assoc['state']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea type="text" class="form-control" rows="8"
                            name="description"><?=$after_assoc['description']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Old Event Image</label>
                        <img class=" img-fluid" src="../uploads/events/<?=$after_assoc['image']?>" alt="not found">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div><!-- col-3 -->
        </div>
    </div><!-- sl-pagebody -->
</div>