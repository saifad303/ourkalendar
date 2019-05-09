<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Document</title>
        <meta name="description" content="Loading Effects for Grid Items with CSS Animations" />
        <meta name="keywords" content="css animation, loading effect, google plus, grid items, masonry" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>public/frontEndDesign/../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/frontEndDesign/css/default.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/frontEndDesign/css/component.css" />
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/modernizr.custom.js"></script>
        <!-- #######  GOOGLE-FONTS link  #######-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,600,700" rel="stylesheet">
        <!-- #######  BOOTSTRAP css link  #######-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/bootstrap.min.css">
        <!-- #######  FONT-AWESOME css link  #######-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/font-awesome.min.css">
        <!-- #######  MYSTYLE css link  #######-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/style.css">
        <!-- #######  RESPONSIVE css link  #######-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/responsive.css">

    </head>
    <body>

        <!-- ++++++++++++++++++++ Start header Section ++++++++++++++++++++ -->

        <header id="header">
            <nav class="navbar navbar-default">
                <div id="catch-container" class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>public/frontEndDesign/index.html"><img src="<?php echo base_url(); ?>public/frontEndDesign/images/logo.png" alt="image of logo"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo base_url(); ?>public/frontEndDesign/event-details.html">Events</a></li>
                            <li><a href="<?php echo base_url(); ?>public/frontEndDesign/browse.html">Browse</a></li>
                            <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">Submit</a></li>
                            <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">About</a></li>
                            <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">Join</a></li>
                        </ul>
                        <ul class="navbar-right list-unstyled list-inline">
                            <li><a class="btn btn-default" href="<?php echo base_url(); ?>public/frontEndDesign/#" role="button">Sign in</a></li>
                            <li><a class="btn btn-default" href="<?php echo base_url(); ?>public/frontEndDesign/#" role="button">Sign up</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="row">
                <div class="header-content">
                    <h1>Explore <span>topics,</span><br>find your <span>next event.</span></h1>
                </div><!-- /.header-content -->
            </div> <!-- End /.row -->
        </header> <!-- End #header -->

        <!-- ++++++++++++++++++++ Start Page Main Content Section ++++++++++++++++++++ -->


        <section id="page-main-content">
            <div id="catch-another-container" class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-lg-3">
                        <!-- ++++++++++++++++++++ Start left sidebar ++++++++++++++++++++ -->
                        <div class="left-sidebar">
                            <div class="lss">
                                <div class="widget city-widget">
                                    <h4 class="widget-title">City</h4>
                                    <div class="search-filter">
                                        <div class="text-right">
                                            <div class="city filter">

                                                <form action="<?php echo base_url("Home"); ?>" method="get">
                                                    <select name="cityid">
                                                        <option disabled selected>Select City</option>
                                                        <?php
                                                        foreach ($allCityList as $ctlist)
                                                        {
                                                            if ($ctlist->id == $cityid)
                                                            {
                                                                ?>

                                                                <option selected value="<?php echo $ctlist->id; ?>"><?php echo $ctlist->city_name; ?></option>

                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        <?php
                                                        foreach ($allCityList as $ctlist)
                                                        {
                                                            if ($ctlist->id != $cityid && $ctlist->id != 7)
                                                            {
                                                                ?>

                                                                <option value="<?php echo $ctlist->id; ?>"><?php echo $ctlist->city_name; ?></option>

                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="all-button">
                                                        <a class="btn btn-default" href="#">
                                                            <button type="submit">Go</button>
                                                        </a>
                                                    </div>
                                                </form>

                                            </div>									
                                        </div>
                                    </div><!-- End /.search-filter -->
                                </div><!-- /.search-widget -->






                                <div class="widget search-widget">
                                    <form action="<?php echo base_url("Event_Management/search"); ?>" method="post">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Search for...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </form>
                                </div><!-- /.search-widget -->




                                <div class="collapse-filter-widget  collapse-widget">
                                    <button class="btn collapse-btn  hidden-sm hidden-lg hidden-md" type="button" data-toggle="collapse" data-target="#collapse-filter-widget" aria-expanded="false" aria-controls="collapse-filter-widget">
                                        <ul class="list-inline">
                                            <li><span class="glyphicon glyphicon-plus"></span></li>
                                            <li><h4 class="widget-title">Filter</h4></li>
                                        </ul>
                                    </button>



                                    <div class="collapse" id="collapse-filter-widget">
                                        <div class="widget filter-widget">
                                            <h4 class="widget-title">Filter</h4>



                                            <div class="search-filter">




                                                <form action="<?php echo base_url("Event_Management/filter"); ?>" method="get">
                                                    <div class="text-right">

                                                        <div class="Purpose filter">
                                                            <select name="purpose">
                                                                <option disabled selected>Event Purpose</option>


                                                                <?php
                                                                foreach ($allEventPurposeList as $purposelist)
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo $purposelist->id; ?>"><?php echo $purposelist->purpose_type; ?></option>

                                                                    <?php
                                                                }
                                                                ?>



                                                            </select>
                                                        </div>




                                                        <div class="all-event filter">
                                                            <select name="category">
                                                                <option disabled selected>Event Types</option>



                                                                <?php
                                                                foreach ($allCategoryList as $catlist)
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo $catlist->id; ?>"><?php echo $catlist->category_name; ?></option>

                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>




                                                        <div class="all-countries filter">
                                                            <select name="venue">
                                                                <option disabled selected>Venue Type</option>


                                                                <?php
                                                                foreach ($allVenueList as $venuelist)
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo $venuelist->id; ?>"><?php echo $venuelist->venue_type; ?></option>

                                                                    <?php
                                                                }
                                                                ?>



                                                            </select>
                                                        </div>



                                                        <div class="all-date filter">
                                                            <select id="all-event" name="price">
                                                                <option disabled selected>Purchase Types</option>
                                                                <option value="1">Paid</option>
                                                                <option value="2">Free</option>
                                                            </select>
                                                        </div>
                                                        <div class="all-button">
                                                            <a class="btn btn-default" href="#">
                                                                <button type="submit">Go</button>
                                                            </a>
                                                        </div>


                                                        <div class="reset text-center">
                                                            <button type="reset">Reset</button>
                                                        </div>

                                                    </div>

                                                </form>

                                            </div>
                                        </div><!-- /.search-widget -->
                                    </div><!-- /#collapse-filter-widget -->
                                </div><!-- /.collapse-filter-widget -->
                            </div>
                        </div> <!-- /.left-sidebar -->	
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-6 col-sm-6 col-lg-6">
                        <!-- ++++++++++++++++++++ Start all-events ++++++++++++++++++++ -->
                        <div class="all-events">
                            <h4>Tropics</h4>
                            <div class="row">

                                <div id="wrapper">
                                    <ul class="grid effect-2" id="grid">
                                        <?php
                                        $count = 0;
                                        if ($allEventList)
                                        {
                                            foreach ($allEventList as $list)
                                            {
                                                if ($list->activation == 1 && $list->editActivation == 1 && $list->activeorinactive == 1)
                                                {
                                                    ?> 

                                                    <li>
                                                        <a href="<?php echo base_url(); ?>public/frontEndDesign/http://drbl.in/fWMM">
                                                            <img src="<?php echo base_url("public/eventImagesForHome/event_" . $list->id . "." . $list->picture); ?>">
                                                            <p><?php echo WC_Count($list->title, 10, 25) ?>...</p>
                                                        </a>
                                                    </li>

                                                    <?php
                                                    $count++;
                                                    if ($count == 9)
                                                    {
                                                        break;
                                                    }
                                                }
                                            }
                                            $count = 0;
                                        }
//                        else
//                        {
//                            for ($i = 0; $i < 6; $i++)
//                            {
                                        ?>  
                                    </ul>
                                </div>


                            </div><!-- End /.row -->
                        </div><!-- End /.all-events -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-3 col-sm-3 col-lg-3">
                        <!-- ++++++++++++++++++++ Start right-sidebar ++++++++++++++++++++ -->
                        <div class="right-sidebar">
                            <div class="widget ad top-ad">
                                <a href="<?php echo base_url(); ?>public/frontEndDesign/#"><img src="<?php echo base_url(); ?>public/frontEndDesign/images/right-middle-ad.jpg" alt="advertisement" class="img-responsive"></a>
                            </div>
                            <div class="widget facebook-widget">
                                <h4 class="widget-title">Facebook</h4>
                                <iframe id="add" src="<?php echo base_url(); ?>public/frontEndDesign/https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftechnocrews&tabs=timeline&width=280&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="280" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            </div>





                        </div><!-- /.right-sidebar -->
                    </div><!-- /.col-md-3 -->	
                </div><!-- End /.row -->
            </div><!-- /.container-fluid -->
        </section><!-- End #page-main-content -->

        <!-- ++++++++++++++++++++ Start footer Section ++++++++++++++++++++ -->

        <footer id="footer">
            <div class="container">
                <p>&copy; 2018 Our Calender <br><span style="font-size:11px; color:#666;">Terms of Service | Privacy Policy | Cookie Policy</span></p>
            </div><!-- /.container -->
        </footer><!-- End #footer -->	





        <!-- #######  MAIN JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/jquery-2.2.4.min.js"></script>
        <!-- #######  BOOTSTRAP JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/bootstrap.min.js"></script>
        <!-- #######  CUSTOM JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/custom.js"></script>

        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/masonry.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/imagesloaded.js"></script>
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/classie.js"></script>
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/AnimOnScroll.js"></script>
        <script>
            new AnimOnScroll(document.getElementById('grid'), {
                minDuration: 0.4,
                maxDuration: 0.7,
                viewportFactor: 0.2
            });
        </script>
    </body>
</html>