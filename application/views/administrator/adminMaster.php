<?php
$count = 0;
$countNotification = 0;
$countEditRequest = 0;
$countReport = 0;

foreach ($allEventList as $list)
{
    if ($list->activation == 0)
    {
        $count++;
        $countNotification++;
    }

    if ($list->editActivation == 0)
    {
        $count++;
        $countEditRequest++;
    }
}

foreach ($reportAlert as $reports)
{
    $count++;
    $countReport++;
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ourKalender</title>
        <meta name="description" content="Sufee Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>public/administratorDesign/apple-icon.png">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>public/administratorDesign/favicon.ico">

        <link rel="stylesheet" href="<?php echo base_url(); ?>public/administratorDesign/assets/css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/administratorDesign/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/administratorDesign/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/administratorDesign/assets/css/themify-icons.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/administratorDesign/assets/css/flag-icon.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/administratorDesign/assets/css/cs-skin-elastic.css">
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>public/administratorDesign/assets/css/bootstrap-select.less"> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/administratorDesign/assets/scss/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/administratorDesign/assets/css/lib/chosen/chosen.min.css">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <style>
            .header-left .dropdown .dropdown-toggle .count {
                border-radius: 50%;
                color: #fff;
                font-size: 11px;
                height: 15px;
                width: 15px;
                line-height: 15px;
                right: 0;
                top: 0;
                position: absolute;
                margin-right: 26px;
            }


            a, button {
                color: black;
                padding-left: 2px;
            }

            .ti-email:before {
                content: "\e75a";
                margin-right: 24px;
            }
        </style>


    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>public/administratorDesign/https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    </head>
    <body>
        <!-- Left Panel -->

        <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">

                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url() ?>Home/dashboard"><img src="<?php echo base_url(); ?>public/administratorDesign/images/logo.png" alt="Logo"></a>
                </div>

                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">

                        <!--Dashboard-->
                        <li>
                            <a href="<?php echo base_url() ?>Home/dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        </li>





                        <!--User Panel satrt-->
                        <h3 class="menu-title">User Panel</h3><!-- /.menu-title -->



                        <li class="menu-item-has-children dropdown">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>User</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>administrator/UserInfo_Management/allUserList">All User List</a></li>

                            </ul>
                        </li>
                        <li class="menu-item-has-children active dropdown">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Business</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url(); ?>administrator/BusinessAccInfo_Management/allBusinessAccList">All Business Account List</a></li>

                            </ul>
                        </li>


                        <!--User Panel end-->




                        <!--Type panel satrt-->
                        <h3 class="menu-title">Types Panel</h3><!-- /.menu-title -->



                        <li class="menu-item-has-children dropdown">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Event type</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>administrator/EventCategory_Management">Insert</a></li>
                                <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>administrator/EventCategory_Management/viewCategoryList">View</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children active dropdown">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Business Types</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url(); ?>administrator/BusinessType_Management">Insert</a></li>
                                <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url(); ?>administrator/BusinessType_Management/viewTypeList">View</a></li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children active dropdown">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Business Subtypes</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url(); ?>administrator/BusinessSubtype_Management">Insert</a></li>
                                <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url(); ?>administrator/BusinessSubtype_Management/viewSubtypeList">View</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Event Purpose</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>administrator/EventPurpose_Management">Insert</a></li>
                                <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>administrator/EventPurpose_Management/viewPurposeList">View</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Event venue</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>administrator/Venue_Management">Insert</a></li>
                                <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>administrator/Venue_Management/viewVenueList">View</a></li>
                            </ul>
                        </li>


                        <!--Types panel end-->








                        <!--Country and cities Panel satrts-->


                        <h3 class="menu-title">Country & Cities</h3><!-- /.menu-title -->



                        <li class="menu-item-has-children dropdown">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Countries</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>administrator/CountryInfo_Management">Insert</a></li>
                                <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>administrator/CountryInfo_Management/viewCountryList">View</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children active dropdown">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Cities</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url(); ?>administrator/CityInfo_Management">Insert</a></li>
                                <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url(); ?>administrator/CityInfo_Management/viewCityList">View</a></li>
                            </ul>
                        </li>


                        <!--Country and cities panel ends-->





                        <!--Events Panel satrts-->


                        <h3 class="menu-title">My Event Panel</h3><!-- /.menu-title -->



                        <li class="menu-item-has-children dropdown">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Events</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>Event_Management/allEventList">Check All Events</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children active dropdown">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Subscribers</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url(); ?>public/administratorDesign/forms-basic.html">Basic Form</a></li>
                                <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url(); ?>public/administratorDesign/forms-advanced.html">Advanced Form</a></li>
                            </ul>
                        </li>


                        <!--Events panel ends-->

                    </ul>

                </div><!-- /.navbar-collapse -->
            </nav>
        </aside><!-- /#left-panel -->

        <!-- Left Panel -->

        <!-- Right Panel -->

        <div id="right-panel" class="right-panel">




            <!-- Header-->
            <header id="header" class="header">

                <div class="header-menu">

                    <div class="col-sm-7">
                        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                        <div class="header-left">

                            <?php
                            if ($allEventListSearch == 1)
                            {
                                ?>

                                <button class="search-trigger"><i class="fa fa-search"></i></button>
                                <div class="form-inline">
                                    <form class="search-form" method="post" action="<?php echo base_url("Event_Management/eventSearch"); ?>">
                                        <input class="form-control mr-sm-2" name="esearch" type="text" placeholder="Search for events ..." aria-label="Search">
                                        <input class="btn-secondary" type="submit" placeholder="Search">
                                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                                    </form>
                                </div>

                                <?php
                            }
                            else if ($allUserListSearch == 1)
                            {
                                ?>

                                <button class="search-trigger"><i class="fa fa-search"></i></button>
                                <div class="form-inline">
                                    <form class="search-form" method="post" action="<?php echo base_url("Event_Management/userSearch"); ?>">
                                        <input class="form-control mr-sm-2" name="usearch" type="text" placeholder="Search ..." aria-label="Search">
                                        <input class="btn-secondary" type="submit" placeholder="Search">
                                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                                    </form>
                                </div>

                                <?php
                            }
                            else if ($allBusinessListSearch == 1)
                            {
                                ?>

                                <button class="search-trigger"><i class="fa fa-search"></i></button>
                                <div class="form-inline">
                                    <form class="search-form" method="post" action="<?php echo base_url("Event_Management/businessSearch"); ?>">
                                        <input class="form-control mr-sm-2" name="bsearch" type="text" placeholder="Search ..." aria-label="Search">
                                        <input class="btn-secondary" type="submit" placeholder="Search">
                                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                                    </form>
                                </div>

                                <?php
                            }
                            ?>




                            <div class="dropdown for-notification">



                                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <?php
                                    if ($count)
                                    {
                                        ?>
                                        <span class="count bg-danger"></span>
                                        <?php
                                    }
                                    ?>
                                </button>


                                <a href="<?php echo base_url(); ?>"><i style="color: black;" class="fa fa-home"></i></a>

                                <div class="dropdown-menu" aria-labelledby="notification">

                                    <p class="red">Notifications</p>



                                    <a class="dropdown-item media bg-flat-color-1" href="<?php echo base_url() . "Event_Management/pandingEventList"; ?>">
                                        <i class="fa fa-check"></i>
                                        <p><?php echo $countNotification; ?> new event post request.</p>
                                    </a>


                                    <a class="dropdown-item media bg-flat-color-5" href="<?php echo base_url() . "Event_Management/pandingEditEventList"; ?>">
                                        <i class="fa fa-warning"></i>
                                        <p><?php echo $countEditRequest; ?> edit event request.</p>
                                    </a>


                                    <a class="dropdown-item media bg-flat-color-4" href="<?php echo base_url("Event_Management/showReportList"); ?>">
                                        <i class="fa fa-info"></i>
                                        <p><?php echo $countReport; ?> New report.</p>
                                    </a>





                                </div>




                            </div>






                            <div class="dropdown for-message">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="message"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-email"></i>
                                    <span class="count bg-primary">9</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="message">
                                    <p class="red">You have 4 Mails</p>
                                    <a class="dropdown-item media bg-flat-color-1" href="<?php echo base_url(); ?>public/administratorDesign/#">
                                        <span class="photo media-left"><img alt="avatar" src="<?php echo base_url(); ?>public/administratorDesign/images/avatar/1.jpg"></span>
                                        <span class="message media-body">
                                            <span class="name float-left">Jonathan Smith</span>
                                            <span class="time float-right">Just now</span>
                                            <p>Hello, this is an example msg</p>
                                        </span>
                                    </a>
                                    <a class="dropdown-item media bg-flat-color-4" href="<?php echo base_url(); ?>public/administratorDesign/#">
                                        <span class="photo media-left"><img alt="avatar" src="<?php echo base_url(); ?>public/administratorDesign/images/avatar/2.jpg"></span>
                                        <span class="message media-body">
                                            <span class="name float-left">Jack Sanders</span>
                                            <span class="time float-right">5 minutes ago</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                                        </span>
                                    </a>
                                    <a class="dropdown-item media bg-flat-color-5" href="<?php echo base_url(); ?>public/administratorDesign/#">
                                        <span class="photo media-left"><img alt="avatar" src="<?php echo base_url(); ?>public/administratorDesign/images/avatar/3.jpg"></span>
                                        <span class="message media-body">
                                            <span class="name float-left">Cheryl Wheeler</span>
                                            <span class="time float-right">10 minutes ago</span>
                                            <p>Hello, this is an example msg</p>
                                        </span>
                                    </a>
                                    <a class="dropdown-item media bg-flat-color-3" href="<?php echo base_url(); ?>public/administratorDesign/#">
                                        <span class="photo media-left"><img alt="avatar" src="<?php echo base_url(); ?>public/administratorDesign/images/avatar/4.jpg"></span>
                                        <span class="message media-body">
                                            <span class="name float-left">Rachel Santos</span>
                                            <span class="time float-right">15 minutes ago</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="user-area dropdown float-right">
                            <a href="<?php echo base_url(); ?>public/administratorDesign/#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="<?php echo base_url(); ?>public/administratorDesign/images/admin.jpg" alt="User Avatar">
                            </a>

                            <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="<?php echo base_url(); ?>Event_Management/eventInsertPage"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="<?php echo base_url("administrator/UserInfo_Management/logout"); ?>"><i class="fa fa-power -off"></i>Logout</a>
                            </div>
                        </div>

                        <div class="language-select dropdown" id="language-select">
                            <a class="dropdown-toggle" href="<?php echo base_url(); ?>public/administratorDesign/#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                                <!--<i class="flag-icon flag-icon-us"></i>-->
                            </a>
                            <div class="dropdown-menu" aria-labelledby="language" >
                                <div class="dropdown-item">
                                    <span class="flag-icon flag-icon-fr"></span>
                                </div>
                                <div class="dropdown-item">
                                    <i class="flag-icon flag-icon-es"></i>
                                </div>
                                <div class="dropdown-item">
                                    <!--<i class="flag-icon flag-icon-us"></i>-->
                                </div>
                                <div class="dropdown-item">
                                    <i class="flag-icon flag-icon-it"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </header>




            <!-- /header -->
            <!-- Header-->



            <!-- .content -->


            <?php
            if (isset($content))
            {
                echo $content;
            }
            ?>



            <!-- .content -->


        </div><!-- /#right-panel -->

        <!-- Right Panel -->


        <script src="<?php echo base_url(); ?>public/administratorDesign/assets/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url(); ?>public/administratorDesign/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>public/administratorDesign/assets/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>public/administratorDesign/assets/js/main.js"></script>
        <script src="<?php echo base_url(); ?>public/administratorDesign/assets/js/lib/chosen/chosen.jquery.min.js"></script>

        <script>
            jQuery(document).ready(function () {
                jQuery(".standardSelect").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });
        </script>



    </body>

    <?php
//    echo '<pre>';
//    print_r($allEventList);
//    echo '</pre>';
//    $count = 0;
//
//    $date = date("Y-m-d");
//    foreach ($allEventList as $list)
//    {
//        if ($list->startDate > $date)
//        {
//            $count++;
//        }
//    }
//
//    echo $count;
//    echo '<br>';
//    echo date("Y-m-d");
    ?>
</html>
