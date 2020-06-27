<?php
 require_once './frontend/front_header.php';
 require_once './db.php';

// pagination page fetching by GET method and calculations
$page = $_GET['page'];
if($page == "" || $page == "1"){
    $page1 = 0;
}else{
    $page1 = ($page *9)-9; 
}

//Query for pagination 
$pagination_query = mysqli_query($database_connection, "SELECT * FROM events") ;
$count = mysqli_num_rows($pagination_query);
$a = ceil($count/9);
$limit = 9;

?>
<div class="Loader"></div>
<div class="wrapper">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-fixed navbar-light white bootsnav">

        <div class="container">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <img src="frontend/assets/img/logo.png" class="logo logo-scrolled" alt="">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="active"><input type="text" class="form-control" placeholder="Find Freelancer"></li>
                    <li class="dropdown">
                        <a href="login.html" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                        <ul class="dropdown-menu animated fadeOutUp">
                            <li><a href="index.html">Home Page 1</a></li>
                            <li><a href="index-2.html">Home Page 2</a></li>
                            <li><a href="index-3.html">Home Page 3</a></li>
                            <li><a href="index-4.html">Home Page 4</a></li>
                            <li><a href="index-5.html">Home Page 5</a></li>
                            <li><a href="index-6.html">Home Page 6</a></li>
                            <li><a href="freelancing.html">Freelancing</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="login.html" class="dropdown-toggle" data-toggle="dropdown">Jobs</a>
                        <ul class="dropdown-menu animated fadeOutUp">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Job Listing</a>
                                <ul class="dropdown-menu animated fadeOutUp">
                                    <li><a href="browse-jobs.html">Browse Jobs</a></li>
                                    <li><a href="browse-jobs-list.html">Browse Jobs With Sidebar</a></li>
                                    <li><a href="browse-jobs-grid.html">Job In Grid</a></li>
                                    <li><a href="search-new.html">Search Job</a></li>
                                    <li><a href="popular-jobs.html">Popular Jobs</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Job Detail</a>
                                <ul class="dropdown-menu animated fadeOutUp">
                                    <li><a href="job-detail-1.html">Job Detail 1</a></li>
                                    <li><a href="job-detail-2.html">Job Detail 2</a></li>
                                    <li><a href="job-detail-3.html">Job Detail 3</a></li>
                                    <li><a href="advance-search.html">Advance Search Job</a></li>
                                    <li><a href="advance-search-2.html">Advance Search Job 2</a></li>
                                </ul>
                            </li>

                            <li><a href="job-with-map.html">Job With Map</a></li>
                            <li><a href="register.html">SignUp Page</a></li>
                            <li><a href="dashboard/index.html">Dashboard</a></li>
                        </ul>
                    </li>

                    <li class="dropdown megamenu-fw"><a href="#" class="dropdown-toggle"
                            data-toggle="dropdown">Brows</a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row">
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Main Pages</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="login.html">New Login</a></li>
                                                <li><a href="signin-signup.html">Sign In / Sign Up</a></li>
                                                <li><a href="search-job.html">Search Job</a></li>
                                                <li><a href="accordion.html">Accordion</a></li>
                                                <li><a href="tab.html">Tab Style</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="pricing.html">Pricing</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">For Candidate</h6>
                                        <div class="content">
                                            <ul class="menu-col">


                                                <li><a href="browse-candidate-list.html">Browse Candidates</a></li>
                                                <li><a href="manage-candidate.html">Browse Candidate</a></li>
                                                <li><a href="top-candidate.html">Top candidate</a></li>
                                                <li><a href="candidate-profile.html">Candidate Detail</a></li>
                                                <li><a href="candidate-detail.html">New Candidate Detail</a></li>
                                                <li><a href="browse-resume-grid.html">Browse Candidate Grid</a></li>
                                                <li><a href="browse-candidate-map.html">Browse Candidate With
                                                        Map</a></li>
                                                <li><a href="browse-resume.html">Browse Resume</a></li>

                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">For Employer</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="browse-employer-list.html">Employer With Sidebar</a>
                                                </li>
                                                <li><a href="browse-company.html">Browse Companies</a></li>
                                                <li><a href="company-detail.html">Company Detail</a></li>
                                                <li><a href="create-job.html">Create Job</a></li>
                                                <li><a href="create-company.html">Create Company</a></li>
                                                <li><a href="manage-company.html">Manage Company</a></li>
                                                <li><a href="manage-employee.html">Manage Employee</a></li>
                                                <li><a href="employer-profile.html">Employer Profile</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Extra Pages <span class="new-offer">New</span></h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="top-candidate-detail.html">Top Candidate detail</a>
                                                </li>
                                                <li><a href="payment-methode.html">Payment Methode</a></li>
                                                <li><a href="new-login-signup.html">New LogIn / SignUp</a></li>
                                                <li><a href="top-candidate-2.html">Top candidate 2</a></li>
                                                <li><a href="premium-candidate.html">Premium Candidate</a></li>
                                                <li><a href="premium-candidate-detail.html">Premium Candidate
                                                        Detail</a></li>
                                                <li><a href="contact.html">Get in Touch</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                </div><!-- end row -->
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="register.html"><i class="fa fa-sign-in"></i>Sign Up</a></li>
                    <li class="left-br"><a href="javascript:void(0)" data-toggle="modal" data-target="#signup"
                            class="signin">Sign In Now</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <!-- End Navigation -->
    <div class="clearfix"></div>

    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url(http://via.placeholder.com/1920x850);">
        <div class="container">
            <h1>Browse Jobs</h1>
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
                    <form>
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
                            <a href="" type="submit" class="btn btn-primary full-width">Filter</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Company Searrch Filter End -->

            <!--Browse Job In Grid-->
            <div class="row extra-mrg">
                <?php 
					$select_events = "SELECT * FROM events LIMIT $page1, $limit";
					$events_from_db = mysqli_query($database_connection, $select_events);
					while($row = mysqli_fetch_assoc($events_from_db)):
				?>
                <div class="col-md-4 col-sm-6">
                    <div class="top-candidate-wrap style-2">
                        <div class="top-candidate-box">
                            <div class="tp-candidate-inner-box">
                                <div class="top-candidate-box-thumb">
                                    <img src="/mun/uploads/events/<?=$row['image']?>" class="img-responsive img-circle"
                                        alt="" />
                                </div>
                                <div class="top-candidate-box-detail">
                                    <h4><?=$row['title']?></h4>
                                    <span class="location"><?=$row['country']?></span>
                                </div>
                                <div class="rattings">
                                    <span class="location"><?=$row['state']?></span>
                                </div>
                            </div>
                            <div class="top-candidate-box-extra">
                                <p><?=$row['description']?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile ;?>
            </div>
            <!--/.Browse Job In Grid-->

            <div class="row">
                <ul class="pagination">
                    <!-- <li><a href="#"><i class="ti-arrow-left"></i></a></li> -->
                    <!-- pagination links -->
                    <?php 
                    	for($b = 1; $b <= $a; $b++){
					?>
                    <li class="active"><a href="event-all.php?page=<?= $b; ?>"><?=$b. " "?></a></li>
                    <?php }?>
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