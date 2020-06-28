<?php
require_once './frontend/front_header.php';
require_once './db.php';

$event_detail_id = $_GET['event_detail_id'];
// Get all the event details

$get_query = "SELECT * FROM events WHERE id = $event_detail_id";
$from_db = mysqli_query($database_connection, $get_query);
$assoc_event = mysqli_fetch_assoc($from_db);
?>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(http://via.placeholder.com/1920x850);">
    <div class="container">
        <h1>Job Detail</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Candidate Detail Start -->
<section class="detail-desc">
    <div class="container">

        <div class="ur-detail-wrap top-lay">

            <div class="ur-detail-box">

                <div class="ur-thumb">
                    <img src="/mun/uploads/events/<?=$assoc_event['image']?>" class=" img-responsive" alt="" />
                </div>
                <div class="ur-caption">
                    <h4 class="ur-title">Software Development</h4>
                    <p class="ur-location"><i class="ti-location-pin mrg-r-5"></i>232, New Sleewar, Canada</p>
                    <span class="ur-designation"><i class="ti-home mrg-r-5"></i>Doodle Infotech</span>
                </div>

            </div>

            <div class="ur-detail-btn">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job"
                    class="btn btn-warning mrg-bot-10 full-width"><i class="ti-star mrg-r-5"></i>Apply This
                    Job</a><br>
                <a href="#" class="btn btn-info full-width"><i class="ti-linkedin mrg-r-5"></i>Apply With
                    Linkedin</a>
            </div>

        </div>

    </div>
</section>

<!-- Job full detail Start -->
<section class="full-detail-description full-detail">
    <div class="container">
        <!-- Job Description -->
        <div class="col-md-8 col-sm-12">
            <div class="full-card">

                <!-- <div class="row row-bottom mrg-0">
                    <h2 class="detail-title">Event Detail</h2>
                    <ul class="job-detail-des">
                        <li><span>Title:</span>$10,000 - $12,000 P.A.</li>
                        <li><span>Details:</span>IT-Software / Software Services</li>
                        <li><span>Role Category:</span>Programming & Design</li>
                        <li><span>Role:</span>Product Designer</li>
                        <li><span>Job Type:</span>Full Time</li>
                    </ul>
                </div> -->

                <div class="row row-bottom mrg-0">
                    <h2 class="detail-title">Event Details</h2>
                    <ul class="job-detail-des">
                        <li><span>Title:</span><?=$assoc_event['title']?></li>
                        <li><span>Country:</span><?=$assoc_event['country']?></li>
                        <li><span>State:</span><?=$assoc_event['state']?></li>
                        <!-- <li><span>City:</span>India</li>
                        <li><span>Zip:</span>520 548</li>
                        <li><span>Telephone:</span>+91 123 456 7854</li>
                        <li><span>Fax:</span>(622) 123 456</li>
                        <li><span>Email:</span>youremail@gmail.com</li>
						 -->
                    </ul>
                </div>

                <div class="row row-bottom mrg-0">
                    <h2 class="detail-title">Event Description</h2>
                    <p><?=$assoc_event['description']?></p>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
                </div>

                <!-- <div class="row row-bottom mrg-0">
                    <h2 class="detail-title">Skill Requirement</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua.</p>
                    <ul class="detail-list">
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                    </ul>
                </div> -->

                <div class="row row-bottom mrg-0">
                    <h2 class="detail-title">Map Location</h2>
                    <div id="map_full_width_one" class="full-width" style="height:400px;"></div>
                </div>

            </div>

        </div>
        <!-- End Job Description -->

        <!-- Start Sidebar -->
        <div class="col-md-4 col-sm-12">
            <div class="sidebar right-sidebar">
                <!-- Job Alert -->
                <a href="javascript:void(0)" class="btn btn-info full-width mrg-bot-20" data-toggle="modal"
                    data-target="#job-alert">Get Job Alert!</a>
                <!-- /Job Alert -->

                <div class="side-widget">
                    <h2 class="side-widget-title">Advertisment</h2>
                    <div class="widget-text padd-0">
                        <div class="ad-banner">
                            <img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" />
                        </div>
                    </div>
                </div>

                <div class="side-widget">
                    <h2 class="side-widget-title">Job Overview</h2>
                    <div class="widget-text padd-0">
                        <div class="ur-detail-wrap">
                            <div class="ur-detail-wrap-body padd-top-20">
                                <ul class="ove-detail-list">

                                    <li>
                                        <i class="ti-wallet"></i>
                                        <h5>Offerd Salary</h5>
                                        <span>£15,000 - £20,000</span>
                                    </li>

                                    <li>
                                        <i class="ti-user"></i>
                                        <h5>Gender</h5>
                                        <span>Male</span>
                                    </li>

                                    <li>
                                        <i class="ti-ink-pen"></i>
                                        <h5>Career Level</h5>
                                        <span>Excutive</span>
                                    </li>

                                    <li>
                                        <i class="ti-home"></i>
                                        <h5>Industry</h5>
                                        <span>Management</span>
                                    </li>

                                    <li>
                                        <i class="ti-shield"></i>
                                        <h5>Experience</h5>
                                        <span>5 Years</span>
                                    </li>

                                    <li>
                                        <i class="ti-book"></i>
                                        <h5>Qualification</h5>
                                        <span>Master Degree</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="statistic-item flex-middle">
                    <div class="icon text-theme">
                        <i class="ti-time theme-cl"></i>
                    </div>
                    <span class="text"><span class="number">2 months</span> ago</span>
                </div>

                <div class="statistic-item flex-middle">
                    <div class="icon text-theme">
                        <i class="ti-zoom-in theme-cl"></i>
                    </div>
                    <span class="text"><span class="number">1742</span> Views</span>
                </div>

                <div class="statistic-item flex-middle">
                    <div class="icon text-theme">
                        <i class="ti-write theme-cl"></i>
                    </div>
                    <span class="text"><span class="number">17</span> Applicants</span>
                </div>

                <!-- Say Hello -->
                <div class="sidebar-widgets">

                    <div class="ur-detail-wrap">
                        <div class="ur-detail-wrap-header">
                            <h4>Get In Touch</h4>
                        </div>
                        <div class="ur-detail-wrap-body">
                            <form action="">
                                <!-- <div class="form-group">
												<label>Name</label>
												<input type="email" class="form-control">
											</div>
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control">
											</div>
											<div class="form-group">
												<label>Message</label>
												<textarea class="form-control"></textarea>
											</div> -->
                                <a href="#" type="submit" class="btn btn-primary">Apply</a>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /Say Hello -->

            </div>
        </div>
        <!-- End Sidebar -->
    </div>
</section>
<!-- Job full detail End -->

<!-- More Jobs -->
<section class="padd-top-20">
    <div class="container">

        <div class="row mrg-0">
            <div class="col-md-12 col-sm-12">
                <h3>Related Events</h3>
            </div>
        </div>
        <!--Browse Job In Grid-->
        <?php 
			$select_related_events = "SELECT * FROM events LIMIT 3";
			$query = mysqli_query($database_connection, $select_related_events);
			// $related_assoc = mysqli_fetch_assoc($query);

			foreach($query as $rel_event):
			?>
        <div class="row mrg-0">
            <a href="">
                <div class="col-md-4 col-sm-6">

                    <div class="grid-view brows-job-list">
                        <div class="brows-job-company-img">
                            <img src="uploads/events/<?=$rel_event['image']?>" class="img-responsive" alt="" />
                        </div>
                        <div class="brows-job-position">
                            <h3><a href="job-detail-2.html"><?=$rel_event['title']?></a></h3>
                            <p><span><?=$rel_event['country']?></span></p>
                            <p><span><?=$rel_event['state']?></span></p>
                            <p><span><?=$rel_event['description']?></span></p>
                        </div>
                    </div>
            </a>
        </div>
        <?php endforeach;?>


    </div>
    <!--/.Browse Job In Grid-->

    </div>
</section>
<!-- More Jobs End -->

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

<!-- ============================ Before Footer ================================== -->

<?php require_once './frontend/front_footer.php';?>
<!-- Google-map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiJjq5DIg_K9fv6RE72OY__p9jz0YTMI"></script>
<script type="text/javascript">
$('#map_full_width_one').gmap3({
    map: {
        options: {
            zoom: 5,
            center: [41.785091, -73.968285],
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            mapTypeId: "style1",
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, "style1"]
            },
            navigationControl: true,
            scrollwheel: false,
            streetViewControl: true
        }
    },
    marker: {
        latLng: [40.785091, -73.968285],
        options: {
            animation: google.maps.Animation.BOUNCE,
            icon: 'assets/img/marker.png'
        }
    },
    styledmaptype: {
        id: "style1",
        options: {
            name: "Style 1"
        },

    }
});
</script>
</div>
</body>

</html>