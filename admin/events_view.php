<?php 
session_start();
require_once '../auth.php';
$title = 'Events';
require_once './assets/header.php';
require_once './assets/sidebar.php';
require_once '../db.php';

// pagination page fetching by GET method and calculations
$page = $_GET['page'];
if($page == "" || $page == "1"){
    $page1 = 0;
}else{
    $page1 = ($page *6)-6; 
}

//Query for pagination 
$pagination_query = mysqli_query($database_connection, "SELECT * FROM events") ;
$count = mysqli_num_rows($pagination_query);
$a = ceil($count/6);
$limit = 6;

// fetching data from database to view on the table
if(isset($_POST['search'])){
    $searchKey = $_POST['search'];
    $select_data = "SELECT * FROM events ORDER BY id DESC LIMIT $page1 , $limit WHERE country LIKE %$searchKey%";
}else{
    $select_data = "SELECT * FROM events ORDER BY id DESC LIMIT $page1 , $limit ";
}
$from_db = mysqli_query($database_connection, $select_data) or die(mysqli_error($database_connection));


?>

<div class="container">
    <div class="sl-pagebody">
        <div class="row row-sm mt-5 ml-5">
            <div class="col-xl-12 text-center">
                <h1 class=" mt-2">Events</h1>
                <hr class="mb-5">
                <!-- file empty session -->
                <?php if(isset($_SESSION['file_empty'])):?>
                <div class="alert alert-danger"><?=$_SESSION['file_empty']?></div>
                <?php endif;
                    unset($_SESSION['file_empty']);
                ?>

                <!-- file error session -->
                <?php if(isset($_SESSION['file_error'])):?>
                <div class="alert alert-danger"><?=$_SESSION['file_error']?></div>
                <?php endif;
                    unset($_SESSION['file_error']);
                ?>

                <!-- size error session -->
                <?php if(isset($_SESSION['size_error'])):?>
                <div class="alert alert-danger"><?=$_SESSION['size_error']?></div>
                <?php endif;
                    unset($_SESSION['size_error']);
                ?>

                <!-- data add session -->
                <?php if(isset($_SESSION['event_success'])):?>
                <div class="alert alert-success"><?=$_SESSION['event_success']?></div>
                <?php endif;
                    unset($_SESSION['event_success']);
                ?>

                <!-- data update session -->
                <?php if(isset($_SESSION['update'])):?>
                <div class="alert alert-success"><?=$_SESSION['update']?></div>
                <?php endif;
                    unset($_SESSION['update']);
                ?>
            </div>

            <div class="col-sm-6 col-xl-8 m-auto mg-t-20 mg-sm-t-0">
                <form action="events_post.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">MUN Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Country</label>
                            <input type="text" class="form-control" name="country">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">State</label>
                        <input type="text" class="form-control" name="state">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea type="text" class="form-control" rows="8" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <br>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-12">
                <!-- <form action="" method="post">
                    <input type="text" name="search" class="form-control col-md-3 mb-2"
                        style="border-radius:6px;float:right;" placeholder="search by country">
                </form> -->
                <table class="table" id="event_table">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Serial</th>
                            <th scope="col">Id</th> -->
                            <th scope="col">Title</th>
                            <th scope="col">Country</th>
                            <th scope="col">State</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serial = 1 ;
                            foreach($from_db as $event):?>
                        <tr>
                            <!-- <td><?=$serial++?></td>
                            <td><?=$event['id']?></td> -->
                            <td><?=ucwords($event['title'])?></td>
                            <td><?=ucwords($event['country'])?></td>
                            <td><?=ucwords($event['state'])?></td>
                            <td style="width:250px;">
                                <?php echo substr(ucwords($event['description']), 0 , 80);
                                if(strlen($event['description']) >= 80){
                                    echo '...';
                                }
                            ?>
                            </td>
                            <td>
                                <img src="../uploads/events/<?=$event['image']?>" alt="<?=$event['image']?>"
                                    style="height:30px;width:30px; border-radius:50%;">
                            </td>
                            <td>
                                <!-- Code for active/deactive button of service view page -->
                                <?php if($event['status'] == 1):?>
                                <a href="events_status_change.php?event_id=<?=$event['id']?>&btn=active"
                                    class="btn btn-dark btn-sm">Active</a>
                                <?php endif;?>
                                <?php if($event['status'] == 2):?>
                                <a href="events_status_change.php?event_id=<?=$event['id']?>&btn=deactive"
                                    class="btn btn-warning btn-sm">Deactive</a>
                                <?php endif;?>
                                <!-- End -->
                                <a href="events_edit.php?event_id=<?=$event['id']?>"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm delete_btn"
                                    value="events_delete.php?event_id=<?=$event['id']?>">Delete</button>

                            </td>
                        <tr>
                            <?php endforeach;?>
                    </tbody>
                </table>
                <br>

                <?php if($from_db->num_rows == 0):?>
                <div class="alert alert-danger">
                    <h4>Nothing To Show!</h4>
                </div>
                <?php endif;?>

                <!-- pagination links -->
                <?php 
                    for($b = 1; $b <= $a; $b++){
                ?>
                <a href="events_view.php?page=<?= $b; ?>" style="text-decoration:none" class="btn btn-primary btn-sm ">
                    <?=$b. " "?></a>
                <?php }?>
            </div><!-- col-3 -->
        </div>
    </div><!-- sl-pagebody -->
</div>
<?php require_once './assets/footer.php';?>
<script>
$('#event_table').DataTable();

$(document).ready(function() {


    $('.delete_btn').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var link_to_go = $(this).val();
                window.location.href = link_to_go;
            }
        })
    })
});
</script>