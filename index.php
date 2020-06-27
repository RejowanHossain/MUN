<?php
    require_once './frontend/front_header.php';
    require_once './db.php';
?>

<!-- Main Banner Section Start -->
<div class="banner trans" style="background-image:url(http://via.placeholder.com/1920x850);" data-overlay="6">
    <div class="container">
        <div class="banner-caption">
            <div class="col-md-12 col-sm-12 banner-text">
                <h1>7,000+ Browse Jobs</h1>
                <div class="full-search-2 eclip-search italian-search hero-search-radius">
                    <div class="hero-search-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 small-padd">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="text" name="title" class="form-control b-r"
                                            placeholder="Search Title">
                                        <i class="ti-search"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 small-padd">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <select id="country" id="country" class="form-control">
                                            <option>Country</option>
                                            <?php 
                                                        $select_country = "SELECT * FROM countries";
                                                        $query = mysqli_query($database_connection, $select_country) or die(mysqli_error($database_connection));
                                                        while($row = mysqli_fetch_array($query)):
                                                    ?>
                                            <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                            <?php endwhile;?>
                                        </select>
                                        <i class="ti-layers"></i>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 small-padd">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <select id="state" name="state" class="form-control">
                                            <option>Choose State</option>
                                        </select>
                                        <i class="ti-layers"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-12 small-padd">
                                <div class="form-group">
                                    <div class="form-group">
                                        <a href="./event-all.php?page=" class="btn btn-primary search-btn">Search
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="clearfix"></div>
<!-- Main Banner Section End -->

<!-- Company Brand Start -->
<div class="company-brand">
    <div class="container">
        <div id="company-brands">
            <div class="brand-img">
                <img src="frontend/assets/img/microsoft-home-dark.png" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
                <img src="frontend/assets/img/img-home-dark.png" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
                <img src="frontend/assets/img/mothercare-hom-darke.png" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
                <img src="frontend/assets/img/paypal-home-dark.png" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
                <img src="frontend/assets/img/serv-home-dark.png" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
                <img src="frontend/assets/img/xerox-home-dark.png" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
                <img src="frontend/assets/img/yahoo-home-dark.png" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
                <img src="frontend/assets/img/mothercare-hom-darke.png" class="img-responsive" alt="" />
            </div>
        </div>
    </div>
</div>
<!-- Company Brand End -->

<!-- Job List-->
<section class="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-heading">
                    <p>Events of The Year</p>
                    <h2>MUN <span>Events</span></h2>
                </div>
            </div>
        </div>
        <!--/row-->

        <div class="row">

            <!-- codes for showing the datas from database -->
            <?php 
                        $select_events = "SELECT * FROM events WHERE status = 2";
                        $events_from_db = mysqli_query($database_connection, $select_events) or die(mysqli_error($database_connection));

                        foreach($events_from_db as $event_view):
                    ?>
            <div class="col-md-4 col-sm-6">
                <div class="top-candidate-wrap style-2">
                    <div class="top-candidate-box">
                        <div class="tp-candidate-inner-box">
                            <div class="top-candidate-box-thumb">
                                <img src="/mun/uploads/events/<?=$event_view['image']?>"
                                    class="img-responsive img-circle" alt="" />
                            </div>
                            <div class="top-candidate-box-detail">
                                <h4><?=$event_view['title']?></h4>
                                <span class="location"><?=$event_view['country']?></span>
                            </div>
                            <div class="rattings">
                                <span class="location"><?=$event_view['state']?></span>
                            </div>
                        </div>
                        <div class="top-candidate-box-extra">
                            <p>
                                <?php echo substr(ucwords($event_view['description']), 0 , 100);
                                            if(strlen($event_view['description']) >= 100){
                                                echo '...';
                                            }
                                        ?>
                            </p>

                        </div>
                        <a href="" class="btn btn-candidate-two bg-default">View
                            Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <!-- Single Freelancer Style 2 -->
            <!-- <div class="col-md-4 col-sm-6">
                        <div class="top-candidate-wrap style-2">
                            <div class="top-candidate-box">
                                <div class="tp-candidate-inner-box">
                                    <div class="top-candidate-box-thumb">
                                        <img src="frontend/assets/img/can-5.jpg" class="img-responsive img-circle"
                                            alt="" />
                                    </div>
                                    <div class="top-candidate-box-detail">
                                        <h4>MUN Title</h4>
                                        <span class="location">Country</span>
                                    </div>
                                    <div class="rattings">
                                        <span>States</span>
                                    </div>
                                </div>
                                <div class="top-candidate-box-extra">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                                </div>
                                <a href="job-detail-3.html" class="btn btn-candidate-two bg-default">View
                                    Detail</a>
                            </div>
                        </div>
                    </div> -->

        </div>

        <!-- Single Freelancer -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="text-center">
                    <a href="./event-all.php?page=" class="btn btn-primary">View All</a>
                </div>
            </div>
        </div>

    </div>
</section>
<div class="clearfix"></div>
<!-- Latest Job End-->

<!-- video section Start -->
<section class="video-sec dark" id="video" style="background-image:url(http://via.placeholder.com/1920x850);">
    <div class="container">
        <div class="row">
            <div class="main-heading">
                <p>Best For Your Projects</p>
                <h2>Watch Our <span>video</span></h2>
            </div>
        </div>
        <!--/row-->
        <div class="video-part">
            <a href="#" data-toggle="modal" data-target="#my-video" class="video-btn"><i class="fa fa-play"></i></a>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!-- video section Start -->

<!-- ====================== How It Work ================= -->
<section class="how-it-works">
    <div class="container">

        <div class="row" data-aos="fade-up">
            <div class="col-md-12">
                <div class="main-heading">
                    <p>Working Process</p>
                    <h2>How It <span>Works</span></h2>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4 col-sm-4">
                <div class="working-process">
                    <span class="process-img">
                        <img src="frontend/assets/img/step-1.png" class="img-responsive" alt="" />
                        <span class="process-num">01</span>
                    </span>
                    <h4>Create An Account</h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right
                        freelancers find place best.</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="working-process">
                    <span class="process-img">
                        <img src="frontend/assets/img/step-2.png" class="img-responsive" alt="" />
                        <span class="process-num">02</span>
                    </span>
                    <h4>Search Jobs</h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right
                        freelancers find place best.</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="working-process">
                    <span class="process-img">
                        <img src="frontend/assets/img/step-3.png" class="img-responsive" alt="" />
                        <span class="process-num">03</span>
                    </span>
                    <h4>Save & Apply</h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right
                        freelancers find place best.</p>
                </div>
            </div>

        </div>

    </div>
</section>
<div class="clearfix"></div>

<!-- Candidate Section Start -->
<section class="call-to-act">
    <div class="container-fluid">
        <div class="col-md-6 col-sm-6 no-padd bl-dark">
            <div class="call-to-act-caption">
                <h2>We Are Expert In Web design and development</h2>
                <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                    laudantium, totam rem aperiam, eaque ipsa quae ab illo</h3>
                <a href="#" class="btn bat-call-to-act">Hire Us</a>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 no-padd gr-dark">
            <div class="call-to-act-caption">
                <h2>We Are Expert In Web design and development</h2>
                <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                    laudantium, totam rem aperiam, eaque ipsa quae ab illo</h3>
                <a href="#" class="btn bat-call-to-act">Join Us</a>
            </div>
        </div>

    </div>
</section>
<!-- End Candidate Section -->

<!-- testimonial section Start -->
<section class="testimonial" id="testimonial">
    <div class="container">
        <div class="row">
            <div class="main-heading">
                <p>What Say Our Client</p>
                <h2>Our <span>Ambassadors</span></h2>
            </div>
        </div>
        <!--/row-->
        <div class="row">
            <div id="client-testimonial-slider" class="owl-carousel">
                <div class="client-testimonial">
                    <div class="pic">
                        <img src="http://via.placeholder.com/150x150" alt="">
                    </div>
                    <p class="client-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore
                        magna aliqua.
                    </p>
                    <h3 class="client-testimonial-title">Lacky Mole</h3>
                </div>

                <div class="client-testimonial">
                    <div class="pic">
                        <img src="http://via.placeholder.com/150x150" alt="">
                    </div>
                    <p class="client-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore
                        magna aliqua.
                    </p>
                    <h3 class="client-testimonial-title">Karan Wessi</h3>
                </div>

                <div class="client-testimonial">
                    <div class="pic">
                        <img src="http://via.placeholder.com/150x150" alt="">
                    </div>
                    <p class="client-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore
                        magna aliqua.
                    </p>
                    <h3 class="client-testimonial-title">Roul Pinchai</h3>
                </div>

                <div class="client-testimonial">
                    <div class="pic">
                        <img src="http://via.placeholder.com/150x150" alt="">
                    </div>
                    <p class="client-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore
                        magna aliqua.
                    </p>
                    <h3 class="client-testimonial-title">Adam Jinna</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial section End -->

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
        require_once './frontend/front_footer.php';
    ?>

<script>
$(document).ready(function() {
    $("#country").on('change', function() {
        var countryId = $(this).val();
        $.ajax({
            method: "POST",
            url: "ajax.php",
            data: {
                id: countryId
            },
            dataType: "html",
            success: function(data) {
                $("#state").html(data);
            }
        })
    });
});
</script>