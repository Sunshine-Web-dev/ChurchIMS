<?php include_once(ACTION_PATH . 'login.php');?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="description" content="A fully featured Church Administration Software Tool for small to medium sized churches.">

<meta name="author" content="Coderthemes">

<link rel="shortcut icon" href="<?php echo SITE_URL;?>images/favicon.ico">

<title>zFlex Church Information Management System</title>



<!-- Google Fonts -->

<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">



<!-- Bootstrap core CSS -->

<link href="<?php echo SITE_URL;?>css/bootstrap.min.css" rel="stylesheet">



<!-- Owl Carousel CSS -->

<link href="<?php echo SITE_URL;?>css/owl.carousel.css" rel="stylesheet">

<link href="<?php echo SITE_URL;?>css/owl.theme.default.min.css" rel="stylesheet">



<!-- Icon CSS -->

<link href="<?php echo SITE_URL;?>css/font-awesome.min.css" rel="stylesheet">



<!-- Custom styles for this template -->

<link href="<?php echo SITE_URL;?>css/style.css" rel="stylesheet">



<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->

<!--[if lt IE 9]>

<script src="<?php echo SITE_URL;?>js/html5shiv.js"></script>

<script src="<?php echo SITE_URL;?>js/respond.min.js"></script>

<![endif]-->



</head>



<body data-spy="scroll" data-target="#navbar-menu">

<?php

//print_r($vResult);

?>



<!-- Navbar -->

<nav class="navbar navbar-custom navbar-expand-lg navbar-light">

  <div class="container"> <a class="navbar-brand logo" href="#">zFlex Church Information Management System</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsMenu" aria-controls="navbarsMenu" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>

    <div class="collapse navbar-collapse" id="navbarsMenu">

      <ul class="navbar-nav ml-auto">

        <li class="nav-item active"> <a class="nav-link" href="#home">Home</a> </li>

        <li class="nav-item"> <a class="nav-link" href="#features">Features</a> </li>

        <li class="nav-item"> <a class="nav-link" href="#pricing">Pricing</a> </li>

        <li class="nav-item"> <a class="nav-link" href="#clients">Clients</a> </li>

        <li class="nav-item"> <a class="nav-link" href="#">Login</a> </li>

        <li class="nav-item"> <a href="" class="btn btn-custom navbar-btn">Try for Free</a> </li>

      </ul>

    </div>

  </div>

</nav>

<!-- End navbar-custom --> 

<!-- HOME -->

<section class="home bg-img-1" id="home">

  <div class="bg-overlay"></div>

  <div class="container">

    <div class="row">

      <div class="col-sm-12">

        <div class="home-fullscreen">

          <div class="full-screen">

            <div class="home-wrapper-1 home-wrapper-alt">

              <div class="wrapper-page">

                <div class="card-box">

                  <div class="panel-heading">

                    <h4 class="text-center"> Sign In to <strong>zFlex Church Information Management System</strong></h4>

                  </div>

                  <div class="p-20">

                  <?php if($vResult["invalid_login"]!=''){?>

                  <span style="color:#F00;"><?php echo $vResult["invalid_login"];?></span>

                  <?php } ?>

                  <?php if($vResult["member_email"]!=''){?>

                  <span style="color:#F00;"><?php echo $vResult["member_email"];?></span>

                  <?php } ?>

                  <?php if($vResult["member_pass"]!=''){?>

                  <span style="color:#F00;"><?php echo $vResult["member_pass"];?></span>

                  <?php } ?>

                    <form class="form-horizontal m-t-20" method="post" action="">

                      <div class="form-group-custom">

                        <input type="email" id="user-name" name="member_email" required/>

                        <label class="control-label text-right" for="user-name">Email Address</label>

                        <i class="bar"></i> </div>

                      <div class="form-group-custom">

                        <input type="password" id="user-password" name="member_pass" required/>

                        <label class="control-label text-right" for="user-password">Password</label>

                        <i class="bar"></i> </div>

                      <div class="form-group ">

                        <div class="col-12">

                          <div class="checkbox checkbox-primary remember_me">

                            <input id="checkbox-signup" type="checkbox">

                            <label for="checkbox-signup"> Remember me </label>

                          </div>

                        </div>

                      </div>

                      <div class="form-group text-center m-t-40">

                        <div class="col-12">

                          <button class="btn btn-success btn-block text-uppercase waves-effect waves-light"

                                    type="submit">Log In </button>

                        </div>

                      </div>

                      <div class="form-group m-t-30 m-b-0">

                        <div class="col-12" style="text-align:left; color:#FFF;"> <a href="#" class="text-light"><i class="fa fa-lock m-r-5"></i> Forgot

                          your password?</a> </div>

                      </div>

                    </form>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- END HOME --> 



<!-- Features -->

<section class="section" id="features">

  <div class="container">

    <div class="row">

      <div class="col-sm-12 text-center">

        <h3 class="title">The zFlex Church Information Management System is fully responsive and easy to use.</h3>

        <p class="text-muted sub-title">The clean and well commented code allows easy customization of the theme.It's <br/>

          designed for describing your app, agency or business.</p>

      </div>

    </div>

    <!-- end row -->

    

    <div class="row">

      <div class="col-sm-4">

        <div class="features-box"> <i class="fa fa-diamond"></i>

          <h6 class="m-t-20">Contribution Management</h6>

          <p class="text-muted">It is a long established fact that tracking contributions is key to all Churches and it's ability to sustain to report on those givings.  We make it easy with our forms and reporting tools.</p>

        </div>

      </div>

      <div class="col-sm-4">

        <div class="features-box"> <i class="fa fa-bicycle"></i>

          <h6 class="m-t-20">Budgeting Tools</h6>

          <p class="text-muted">Generally for any type of expense and contribution of funds, there is a budgeting process. With the zFlex Church IMS, we leverage the past reports and history to create and build a pre-formated Budget Report for your church!</p>

        </div>

      </div>

      <div class="col-sm-4">

        <div class="features-box"> <i class="fa fa-signal"></i>

          <h6 class="m-t-20">Creative Design</h6>

          <p class="text-muted">Our Church Information Management System is designed to be very User Friendly and easy to manage Staff members and Congregation Membership along with simple Input and update screens.  Not to mention quick graphs and reports with a couple of simple clicks.</p>

        </div>

      </div>

      

      <div class="col-sm-4">

        <div class="features-box"> <i class="fa fa-signal"></i>

          <h6 class="m-t-20">Expense Management</h6>

          <p class="text-muted">Get easy to read Charts and Views of the Expenses of the Church with a simple click. Fast and simple to understand.</p>

        </div>

      </div>

      

      <div class="col-sm-4">

        <div class="features-box"> <i class="fa fa-signal"></i>

          <h6 class="m-t-20">Church Reporting</h6>

          <p class="text-muted">Easily create the reports you need to track your donation activity, contributions and expenses. zFlex Church IMS also provides listings of ACTIVE verses IN-ACTIVE members and staff.</p>

        </div>

      </div>

      

      <div class="col-sm-4">

        <div class="features-box"> <i class="fa fa-signal"></i>

          <h6 class="m-t-20">Cloud Based</h6>

          <p class="text-muted">Online access on any device with automatic data backup. zFlex cloud based church administration software enables users to access and update information — membership, online giving, safe check-in, events, volunteers and guest speakers — from anywhere.</p>

        </div>

      </div>

      

    </div>

    <!-- end row --> 

    

  </div>

  <!-- end container --> 

</section>



<!-- end Features --> 



<!-- Features Alt -->

<section class="section p-t-0">

  <div class="container">

    <div class="row">

      <div class="col-sm-5">

        <div class="feat-description m-t-20">

          <h4>Presenting the Online Software solution for Small to Large Churches Everywhere!</h4>

          <p class="text-muted">Your ministry team will love zFlex's cloud-based church accounting software! Our full solution is designed just for churches and nonprofits, and manages everything from Contributions to Expenses to Membership and user profile information.   to reporting and compliance.



And more, zFlex Finance Management System is reliable and simple to use, and comes with our promise of top-notch customer support. Start today to streamline your management of church finances with our intuitive church administration and management software! </p>

          <a href="" class="btn btn-custom">Learn More</a> </div>

      </div>

      <div class="col-sm-6 ml-auto"> <img src="<?php echo SITE_URL;?>images/mac_1.png" alt="img" class="img-fluid m-t-20"> </div>

    </div>

    <!-- end row --> 

    

  </div>

  <!-- end container --> 

</section>

<!-- end features alt --> 



<!-- Features Alt -->

<section class="section">

  <div class="container">

    <div class="row">

      <div class="col-sm-6"> <img src="<?php echo SITE_URL;?>images/mac_2.png" alt="img" class="img-fluid"> </div>

      <div class="col-sm-5 ml-auto">

        <div class="feat-description">

          <h4>Contributions and Expenses.</h4>

          <p class="text-muted">zFlex CIMS system makes it very easy to track and update member and staff contributions and also the church expenses by categories.  Record contributions and even pledes from individuals and groups (departments).  zFlex CIMS can also create, print or email quarterly or annual statements to members.

          </p>

          <p class="text-muted">For church expenses, zFlex CIMS can easily show the last week or month expenses.  Easy to enter and easy to export.  See by category which how much expenses where paid out for events, musicians or staff.  You have the option to create your own category if not available.  ZFlex CIMS will handle it all!!

 </p>

          <a href="" class="btn btn-custom">Learn More</a> </div>

      </div>

    </div>

    <!-- end row --> 

    

  </div>

  <!-- end container --> 

</section>

<!-- end features alt --> 



<!-- Features Alt -->

<section class="section">

  <div class="container">

    <div class="row">

      <div class="col-sm-5">

        <div class="feat-description">

          <h4>Member Management.</h4>

          <p class="text-muted">Manage your church congregation with ease.  Using zFlex CIMS Member management features, it takes less than a minute to add a new member!  The form and layout is simple.  You can track members attendence and see what times of the season/month/year that attendence is down.  Chart and graph for easy distribution and viewing/presentations. </p>

          <p class="text-muted">And yes, there is more, zFlex CIMS has new options to let the user/members have a portal to view their own contributions and can print or email a report to themselves or others.  Self management and reduce some of the bruden on the staff! </p>

          

          <a href="" class="btn btn-custom">Learn More</a> </div>

      </div>

      <div class="col-sm-6 ml-auto"> <img src="<?php echo SITE_URL;?>images/mac_3.png" alt="img" class="img-fluid"> </div>

    </div>

    <!-- end row --> 

    

  </div>

  <!-- end container --> 

</section>

<!-- end features alt --> 



<!-- Testimonials section -->

<section class="section bg-img-1">

  <div class="bg-overlay"></div>

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-sm-10 col-md-8">

        <div class="owl-carousel text-center">

          <div class="item">

            <div class="testimonial-box">

              <h4>Excellent support for a tricky issue related to our customization of the template. Author kept us updated as he made progress on the issue and emailed us a patch when he was done.</h4>

              <img src="<?php echo SITE_URL;?>images/user.jpg" class="testi-user rounded-circle" alt="testimonials-user">

              <p>- Ubold User</p>

            </div>

          </div>

          <div class="item">

            <div class="testimonial-box">

              <h4>Flexible, Everything is in, Suuuuuper light, even for the code is much easier to cut and make it a theme for a productive app..</h4>

              <img src="<?php echo SITE_URL;?>images/user2.jpg" class="testi-user rounded-circle" alt="testimonials-user">

              <p>- Ubold User</p>

            </div>

          </div>

          <div class="item">

            <div class="testimonial-box">

              <h4>Not only the code, design and support are awesome, but they also update it constantly the template with new content, new plugins. I will buy surely another coderthemes template!</h4>

              <img src="<?php echo SITE_URL;?>images/user3.jpg" class="testi-user rounded-circle" alt="testimonials-user">

              <p>- Ubold User</p>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>



<!-- End Testimonials section --> 



<!-- PRICING -->

<section class="section" id="pricing">

  <div class="container">

    <div class="row">

      <div class="col-sm-12 text-center">

        <h3 class="title">Pricing</h3>

        <p class="text-muted sub-title">The clean and well commented code allows easy customization of the theme.It's <br>

          designed for describing your app, agency or business.</p>

      </div>

    </div>

    <!-- end row -->

    

    <div class="row justify-content-center">

      <div class="col-lg-10">

        <div class="row"> 

          

          <!--Pricing Column-->

          <article class="pricing-column col-lg-4 col-md-4">

            <div class="inner-box">

              <div class="plan-header text-center">

                <h3 class="plan-title">Small Seeds</h3>

                <h2 class="plan-price">$24</h2>

                <div class="plan-duration">Per License</div>

              </div>

              <ul class="plan-stats list-unstyled">

                <li> <i class="pe-7s-server"></i>Size of Membership <b>Less than 100</b></li>

                <li> <i class="pe-7s-graph"></i>Customer support</li>

                <li> <i class="pe-7s-mail-open"></i>Free Updates</li>

                <li> <i class="pe-7s-tools"></i>24x7 Support</li>

              </ul>

              <div class="text-center"> <a href="#" class="btn btn-sm btn-custom">Purchase Now</a> </div>

            </div>

          </article>

          

          <!--Pricing Column-->

          <article class="pricing-column col-lg-4 col-md-4">

            <div class="inner-box active">

              <div class="plan-header text-center">

                <h3 class="plan-title">Medium Plan</h3>

                <h2 class="plan-price">$120</h2>

                <div class="plan-duration">Per License</div>

              </div>

              <ul class="plan-stats list-unstyled">

                <li> <i class="pe-7s-server"></i>Size of Membership <b>300-1000</b></li>

                <li> <i class="pe-7s-graph"></i>Customer support</li>

                <li> <i class="pe-7s-mail-open"></i>Free Updates</li>

                <li> <i class="pe-7s-tools"></i>24x7 Support</li>

              </ul>

              <div class="text-center"> <a href="#" class="btn btn-sm btn-custom">Purchase Now</a> </div>

            </div>

          </article>

          

          <!--Pricing Column-->

          <article class="pricing-column col-lg-4 col-md-4">

            <div class="inner-box">

              <div class="plan-header text-center">

                <h3 class="plan-title">Mega-Plan</h3>

                <h2 class="plan-price">$999</h2>

                <div class="plan-duration">Per License</div>

              </div>

              <ul class="plan-stats list-unstyled">

                <li> <i class="pe-7s-server"></i>Size of Membership <b>1000+</b></li>

                <li> <i class="pe-7s-graph"></i>Customer support</li>

                <li> <i class="pe-7s-mail-open"></i>Free Updates</li>

                <li> <i class="pe-7s-tools"></i>24x7 Support</li>

              </ul>

              <div class="text-center"> <a href="#" class="btn btn-sm btn-custom">Purchase Now</a> </div>

            </div>

          </article>

        </div>

      </div>

      <!-- end col --> 

    </div>

    <!-- end row --> 

    

  </div>

  <!-- end container --> 

</section>

<!-- End Pricing --> 



<!-- Clients -->

<section class="section p-t-0" id="clients">

  <div class="container">

    <div class="row">

      <div class="col-sm-12 text-center">

        <h3 class="title">Trusted by Hundreds</h3>

        <p class="text-muted sub-title">The clean and well designed software system that is specifically for churches of various sizes. It's <br/>

          designed for Administrators and Staff of God's Church at a budget that is feasiable.</p>

      </div>

    </div>

    <!-- end row -->

    

    <div class="row text-center">

      <div class="col-sm-12">

        <ul class="list-inline client-list">

          <li class="list-inline-item"><a href="" title="Microsoft"><img src="<?php echo SITE_URL;?>images/clients/microsoft.png" alt="clients"></a></li>

          <li class="list-inline-item"><a href="" title="Google"><img src="<?php echo SITE_URL;?>images/clients/google.png" alt="clients"></a></li>

          <li class="list-inline-item"><a href="" title="Instagram"><img src="<?php echo SITE_URL;?>images/clients/instagram.png" alt="clients"></a></li>

          <li class="list-inline-item"><a href="" title="Converse"><img src="<?php echo SITE_URL;?>images/clients/converse.png" alt="clients"></a></li>

        </ul>

      </div>

      <!-- end Col --> 

      

    </div>

    <!-- end row --> 

    

  </div>

</section>

<!--End  Clients --> 



<!-- FOOTER -->

<footer class="footer">

  <div class="container">

    <div class="row">

      <div class="col-md-6">

        <p class="text-muted copyright">© 2016 - <?php echo date("Y");?>. All rights reserved. zFlex Software, LLC</p>

      </div>

      <div class="col-md-3 ml-auto">

        <ul class="social-icons text-md-right">

          <li><a href="#"><i class="fa fa-facebook"></i></a></li>

          <li><a href="#"><i class="fa fa-twitter"></i></a></li>

          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>

        </ul>

      </div>

    </div>

    <!-- end row --> 

  </div>

  <!-- end container --> 

</footer>

<!-- End Footer --> 



<!-- Back to top --> 

<a href="#" class="back-to-top" id="back-to-top"> <i class="fa fa-angle-up"></i> </a> 



<!-- js placed at the end of the document so the pages load faster --> 

<script src="<?php echo SITE_URL;?>js/jquery.min.js"></script> 

<script src="<?php echo SITE_URL;?>js/popper.min.js"></script> 

<script src="<?php echo SITE_URL;?>js/bootstrap.min.js"></script> 



<!-- Jquery easing --> 

<script type="text/javascript" src="<?php echo SITE_URL;?>js/jquery.easing.1.3.min.js"></script> 

<!-- Owl Carousel --> 

<script type="text/javascript" src="<?php echo SITE_URL;?>js/owl.carousel.min.js"></script> 

<!--common script for all pages--> 

<script src="<?php echo SITE_URL;?>js/jquery.app.js"></script> 

<script type="text/javascript">

            $('.owl-carousel').owlCarousel({

                loop:true,

                margin:10,

                nav:false,

                autoplay: true,

                autoplayTimeout: 4000,

                responsive:{

                    0:{

                        items:1

                    }

                }

            })

        </script>

</body>

</html>