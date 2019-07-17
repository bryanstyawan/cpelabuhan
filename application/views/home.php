<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SISFORKLINA | </title>
	<!-- core CSS -->
    <link href="<?php echo base_url();?>assets_home/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_home/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_home/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_home/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_home/css/owl.transitions.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_home/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_home/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_home/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets_home/js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>assets_home/js/respond.min.js"></script>
    <![endif]-->


    <!-- 
        Favicon
        <link rel="shortcut icon" href="<?php echo base_url();?>assets_home/logo.png"> 
    -->

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>assets_home/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>assets_home/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>assets_home/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assets_home/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container" style="width:95%;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url();?>"><img src="<?php echo base_url();?>assets_home/dummy-logo.png" alt="logo" style="height: 58px;width: 140px;"></a>
                    <!-- <a class="navbar-brand" href="tel:0213450038">
                        <label class="col-lg-6" style="cursor: pointer;">Kontak</label>
                        <label class="col-lg-8" style="cursor: pointer;color: #fee328;"><i class="fa fa-phone"></i>&nbsp; (021) 3450038</label>
                    </a>
                    <a class="navbar-brand" href="tel:0213450038">
                        <label class="col-lg-6" style="cursor: pointer;">Layanan</label>
                        <label class="col-lg-9" style="cursor: pointer;color: #fee328;"><i class="glyphicon glyphicon-envelope"></i>&nbsp; sisforklina@gmail.com</label>
                    </a> -->
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Home</a></li>
                        <li class="scroll"><a href="#about">Tentang Sisforklina</a></li>                        
                        <li class="scroll"><a href="#">Informasi</a></li>
                        <li class="scroll"><a href="#">Helpdesk</a></li>                                                
                        <li class="scroll">
                            <a href="<?=base_url().'auth';?>">
                                <?php
                                    if ($this->session->userdata('session_login')) {
                                        // code...
                                        echo "<b>Sisforklina</b>";
                                    }
                                    else {
                                        // code...
                                        echo "Masuk";
                                    }
                                ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->


    <section id="main-slider">
        <div class="owl-carousel">
            <div class="item" style="background-image: url(<?php echo base_url();?>assets_home/slider/1900x900.jpg);background-size: 100% 100%;height: 555px;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(<?php echo base_url();?>assets_home/slider/1900x900medic.jpg);background-size: 100% 100%;height: 555px;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(<?php echo base_url();?>assets_home/slider/1900x900.jpg);background-size: 100% 100%;height: 555px;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(<?php echo base_url();?>assets_home/slider/1900x900.jpg);background-size: 100% 100%;height: 555px;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(<?php echo base_url();?>assets_home/slider/1900x900.jpg);background-size: 100% 100%;height: 555px;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(<?php echo base_url();?>assets_home/slider/1900x900.jpg);background-size: 100% 100%;height: 555px;">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->

    <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Tentang Sisforklina</h2>
                <p class="text-center wow fadeInDown">Qui ut enim aute consequat et. Aliqua reprehenderit esse non ipsum elit irure incididunt fugiat incididunt cillum adipisicing id ullamco ea. Culpa ut pariatur cupidatat qui sit consectetur labore deserunt sunt proident reprehenderit ex ipsum magna..</p>
            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <h3 class="column-title">Video Intro</h3>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="420" height="315" src="https://www.youtube.com/embed/mef2" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Deskripsi Umum Aplikasi</h3>
                    <p style="text-align: justify;">Mollit et ut consectetur ex quis proident eiusmod esse ullamco. Nostrud laboris laboris veniam duis in consequat Lorem ea irure sit consequat consequat labore. Est minim voluptate culpa amet irure cupidatat culpa proident nisi. Et fugiat commodo tempor tempor. Anim sint irure ipsum dolore. Esse nulla aliqua sint proident pariatur ut pariatur sunt pariatur et pariatur ea Lorem. Tempor pariatur ea laboris veniam exercitation do et veniam amet laborum.
                    Nulla ipsum fugiat nulla laborum. Consectetur voluptate aliqua incididunt non reprehenderit occaecat veniam ad pariatur nulla nostrud est. Eu labore esse fugiat aliqua dolor aliqua non minim voluptate eiusmod quis nulla amet commodo..</p>

                    <!-- <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="nostyle">
                                <li><i class="fa fa-check-square"></i> Ipsum is simply dummy</li>
                                <li><i class="fa fa-check-square"></i> When an unknown</li>
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <ul class="nostyle">
                                <li><i class="fa fa-check-square"></i> The printing and typesetting</li>
                                <li><i class="fa fa-check-square"></i> Lorem Ipsum has been</li>
                            </ul>
                        </div>
                    </div> -->

                    <a href="<?=base_url().'/admin';?>" class="btn btn-primary" href="#">Masuk</a>

                </div>
            </div>
        </div>
    </section><!--/#about-->

    <section id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Fungsi Utama Sisforklina</h2>
                <!-- <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="<?php echo base_url();?>assets_home/images/main-featureas.png" alt="">
                </div>
                <div class="col-sm-6">
                    <!-- <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-line-chart"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">User Friendly</h4>
                            <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
                        </div>
                    </div> -->

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Test 1</h4>
                            <p style="text-align: justify;">Do amet aliquip laboris ipsum nisi aliqua dolore ex labore mollit qui. Magna enim ad tempor consequat labore voluptate voluptate pariatur voluptate non dolore. Ex voluptate do dolor veniam dolor est magna ullamco non velit est aliquip voluptate..</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-pie-chart"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Test 2</h4>
                            <p style="text-align: justify;">Sint ex esse non in. Consequat nisi ut adipisicing incididunt do aliqua culpa culpa excepteur laborum est culpa quis. Culpa ullamco Lorem ut incididunt qui commodo occaecat proident Lorem. Laborum occaecat eiusmod magna non est minim dolor ad nisi culpa do mollit reprehenderit velit. Quis quis quis elit aliqua aute id esse tempor deserunt aliqua ad culpa commodo aliqua. In tempor anim est in quis ex culpa cillum ut commodo proident. Mollit aute ut irure exercitation enim quis occaecat ea incididunt.</p>
                            <p style="text-align: justify;">Nulla commodo nostrud eu ullamco velit exercitation. Dolore ex ea ipsum aliquip do ut eiusmod occaecat irure non. Est qui ad pariatur sit est eiusmod mollit esse ad velit. Labore duis ex tempor veniam sit qui. Reprehenderit occaecat sunt eu nulla voluptate eiusmod.</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-pie-chart"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Test 3</h4>
                            <p style="text-align: justify;">Commodo et velit aliquip duis sint. Aliquip proident voluptate adipisicing officia fugiat nulla mollit occaecat do. Magna laboris eiusmod deserunt Lorem enim quis culpa anim dolore Lorem id amet. Laborum elit occaecat aliquip ut. Reprehenderit velit nisi ut exercitation magna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">EQUAL WORK DESERVES EQUAL PAY</h2>
            </div>
        </div>
    </section> -->
    <!--/#get-in-touch-->

    <section class="cta3" style="padding-top: 10px;padding-bottom: 10px;">
        <div class="container">
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contact-form">
                            <h1 style="color: #fff;">HELP DESK</h1>
                            <address>
                              <strong>RSU Adhyaksa</strong><br>
                              Nisi exercitation laboris ad dolore in occaecat cupidatat id proident. Dolore veniam dolore ea esse velit adipisicing velit aliquip. Ut nisi do Lorem voluptate cillum ea magna occaecat in ut pariatur. Ad ipsum minim adipisicing dolore tempor ullamco do aliquip adipisicing irure. Anim eiusmod aute aute enim commodo laborum sit elit anim ad. Qui qui eiusmod exercitation nisi et id laboris duis anim dolore ipsum dolore pariatur ullamco. Excepteur nisi veniam id tempor mollit.<br>
                              Daerah Khusus Ibukota Jakarta<br>
                              <abbr title="Phone">Telp:</abbr> (021) 3450038 <abbr title="Phone">Ext:</abbr> 2349 & 2355
                              Email : sisforklina@gmail.com
                            </address>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6">
                        <div class="contact-form">
                            <h1 style="color: #fff;">HELP DESK</h1>
                            <address>
                              <strong>Kementerian Dalam Negeri, Biro Kepegawaian, Lt 3 Gedung D</strong><br>
                              Jl. Medan Merdeka Utara No. 7, RT. 5/RW. 2, Gambir, Kota Jakarta Pusat<br>
                              Daerah Khusus Ibukota Jakarta<br>
                              <abbr title="Phone">Telp:</abbr> (021) 3450038 <abbr title="Phone">Ext:</abbr> 2349 & 2355
                              Email : sikerja@kemendagri.go.id
                            </address>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    &copy; 2019 Pre Build. V.1.0.0-Alpha
                </div>
                <div class="col-sm-7 text-center">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
                        <!-- <li><a href="#"><i class="fa fa-behance"></i></a></li> -->
                        <!-- <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li> -->
                        <!-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="<?php echo base_url();?>assets_home/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets_home/js/bootstrap.min.js"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> -->
    <script src="<?php echo base_url();?>assets_home/js/owl.carousel.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets_home/js/mousescroll.js"></script> -->
    <!-- <script src="<?php echo base_url();?>assets_home/js/smoothscroll.js"></script> -->
    <script src="<?php echo base_url();?>assets_home/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>assets_home/js/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url();?>assets_home/js/jquery.inview.min.js"></script>
    <script src="<?php echo base_url();?>assets_home/js/wow.min.js"></script>
    <script src="<?php echo base_url();?>assets_home/js/main.js"></script>
</body>
</html>
