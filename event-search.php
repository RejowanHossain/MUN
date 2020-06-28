<?php
 require_once './frontend/front_header.php';
 require_once './db.php';

// pagination page fetching by GET method and calculations
// $page = $_GET['page'];
// if($page == "" || $page == "1"){
//     $page1 = 0;
// }else{
//     $page1 = ($page *9)-9; 
// }

// //Query for pagination 
// $pagination_query = mysqli_query($database_connection, "SELECT * FROM events") ;
// $count = mysqli_num_rows($pagination_query);
// $a = ceil($count/9);
// $limit = 9;

?>
<div class="Loader"></div>
<div class="wrapper">


    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url(http://via.placeholder.com/1920x850);">
        <div class="container">
            <h1>Searched Events</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- ========== Begin: Brows job ===============  -->
    <section>
        <div class="container">
            <!-- Company Searrch Filter Start -->
            <div class="row extra-mrg">
                <div class="wrap-search-filter">
                    <!-- <form>
                        <div class="col-md-4 col-sm-4">
                            <input type="text" class="form-control" placeholder="Keyword: Name, Tag">
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Location: City, State, Zip">
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <select class="form-control" id="j-category">
                                <option value="">&nbsp;</option>
                                <option value="1">Information Technology</option>
                                <option value="2">Mechanical</option>
                                <option value="3">Hardware</option>
                                <option value="4">Hospitality & Tourism</option>
                                <option value="5">Education & Training</option>
                                <option value="6">Government & Public</option>
                                <option value="7">Architecture</option>
                            </select>

                        </div>
                        <div class="col-md-2 col-sm-2">
                            <a href="eventgrid.php?page=" type="submit" class="btn btn-primary full-width">Filter</a>
                        </div>
                    </form> -->
                </div>
            </div>
            <!-- Company Searrch Filter End -->

            <!--Browse Job In Grid-->
            <div class="row extra-mrg">
                <?php 
                
                    if(isset($_POST['search'])){
                    $search_title = htmlentities(ucwords($_POST['search_title']));
                    $search_country = htmlentities(ucwords($_POST['search_country']));
                    $search_state = htmlentities(ucwords($_POST['search_state']));
                    }

                    $search_query = "SELECT * FROM events WHERE title LIKE '%$search_title%' OR country LIKE '%$search_country%' OR state LIKE '%$search_state%'";
                    $query = mysqli_query($database_connection, $search_query);
                    
                    while($row = mysqli_fetch_assoc($query)):        
                    ?>
                <div class="col-md-4 col-sm-6">
                    <div class="top-candidate-wrap style-2">
                        <div class="top-candidate-box">
                            <div class="tp-candidate-inner-box">
                                <div class="top-candidate-box-thumb">
                                    <img src="uploads/events/<?= $row['image']?>" class="img-responsive img-circle"
                                        alt="" />
                                </div>
                                <div class="top-candidate-box-detail">
                                    <h4><?= $row['title']?></h4>
                                    <span class="location"></span>
                                </div>
                                <div class="rattings">
                                    <span class="location"><?= $row['country']?></span>
                                </div>
                            </div>
                            <div class="top-candidate-box-extra">
                                <p><?= $row['state']?></p>
                            </div>
                            <div class="top-candidate-box-extra">
                                <p><?= $row['description']?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
            <!--/.Browse Job In Grid-->

            <div class="row">
                <ul class="pagination">
                    <!-- <li><a href="#"><i class="ti-arrow-left"></i></a></li> -->
                    <!-- pagination links -->
                    <!-- <?php 
                    	for($b = 1; $b <= $a; $b++){
					?>
                    <li class="active"><a href="eventgrid.php?page=<?= $b; ?>"><?=$b. " "?></a></li>
                    <?php }?> -->
                    <!-- <li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
                    <li><a href="#"><i class="ti-arrow-right"></i></a></li> -->
                </ul>
            </div>

        </div>
    </section>
    <!-- ========== Begin: Brows job Grid End ===============  -->

    <!-- ============================ Call To Action ================================== -->
    <section class="theme-bg call-to-act-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="call-to-act">
                        <div class="call-to-act-head">
                            <h3>Want to Become a Success Employers?</h3>
                            <span>We'll help you to grow your career and growth.</span>
                        </div>
                        <a href="#" class="btn btn-call-to-act">SignUp Today</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Call To Action End ================================== -->

    <?php
 		require_once './frontend/front_footer.php'
	?>