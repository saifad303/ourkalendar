<?php
//echo $this->input->post("mytype");
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>public/apple-icon.png" />
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/favicon.png" />
        <title>Event form</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- CSS Files -->
        <link href="<?php echo base_url(); ?>public/createEventForm/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>public/createEventForm/assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="<?php echo base_url(); ?>public/createEventForm/assets/css/demo.css" rel="stylesheet" />

        <!-- Fonts and Icons -->
        <link href="<?php echo base_url(); ?>public/createEventForm/http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url(); ?>public/createEventForm/assets/css/themify-icons.css" rel="stylesheet">



        <!--new-->

        <!--        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">-->


        <link href="<?php echo base_url(); ?>public/tagsInput/tagsinput.css" rel="stylesheet" type="text/css">

        <!--/new-->

        <!--Imported-->
        <title>Event Post</title>
        <!-- #######  GOOGLE-FONTS link  #######-->
        <!-- #######  BOOTSTRAP css link  #######-->
        <!-- #######  FONT-AWESOME css link  #######-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/font-awesome.min.css">
        <!-- #######  MYSTYLE css link  #######-->





        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/style.css">
        <!-- #######  RESPONSIVE css link  #######-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/responsive.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




        <!--Imported time-->

        <!-- #######  MAIN JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/jquery-2.2.4.min.js"></script>
        <!-- #######  BOOTSTRAP JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/bootstrap.min.js"></script>
        <!-- #######  CUSTOM JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/custom.js"></script>
        <!-- #######  JQUERY UI JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/jquery-ui.js"></script>
        <style>

            .input-group-btn .btn-default:not(.btn-fill) {
                border-color: yellow;
            }

            .wizard-card .picture {
                margin: 17px auto;
                margin-left: 50px;
            }

            .alert {
                padding: 7px;
            }

        </style>
    </head>

    <body>
        <div class="image-container set-full-height" style="background-image: url('assets/img/paper-1.jpeg')">
            <!--   Creative Tim Branding   -->

            <!--  Made With Paper Kit  -->







            <?php
            $randName = (rand(1, 3));
            ?>
            <header id="header" 
            <?php
            if ($randName == 1)
            {
                ?>
                        style="background-image: url(<?php echo base_url(); ?>public/frontEndDesign/images/banner1.jpg);"
                        <?php
                    }
                    ?>
                    <?php
                    if ($randName == 2)
                    {
                        ?>
                        style="background-image: url(<?php echo base_url(); ?>public/frontEndDesign/images/banner2.jpg);"
                        <?php
                    }
                    ?>
                    <?php
                    if ($randName == 3)
                    {
                        ?>
                        style="background-image: url(<?php echo base_url(); ?>public/frontEndDesign/images/banner4.jpg);"
                        <?php
                    }
                    ?> 
                    >
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
                            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>public/frontEndDesign/images/logo.png" alt="image of logo"></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo base_url(); ?>Event_Management/browseAllEvents">Search</a></li>
                                <li><a href="<?php echo base_url("Home/about"); ?>">About</a></li>
                            </ul>
                            <ul class="navbar-right list-unstyled list-inline">



                                <?php
                                if (!$this->session->userdata('myid'))
                                {
                                    ?>
                                    <li><a class="btn btn-default" href="<?php echo base_url(); ?>Home/signIn" role="button">Login</a></li>
                                    <li><a class="btn btn-default" href="<?php echo base_url(); ?>Home/signUp" role="button">Sign up</a></li>

                                    <?php
                                }
                                ?>




                                <?php
                                if ($this->session->userdata('mytype') == 'u')
                                {
                                    ?>    

                                                                                                                                                                                                                                                                                <!--                                <li><a class="btn btn-default" href="<?php echo base_url("Event_Management/eventInsertPage/" . $this->session->userdata('myid')); ?>" role="button">My Profile</a></li>-->
                                    <li><a class="btn btn-default" href="<?php echo base_url("Event_Management/createEvent/" . $this->session->userdata('myid')); ?>" role="button">Create your events.</a></li>
                                    <li><a class="btn btn-default" href="<?php echo base_url("Event_Management/profile/" . $this->session->userdata('myid')); ?>" role="button">My Profile</a></li>

                                    <?php
                                }
                                ?>

                                <?php
                                if ($this->session->userdata('mytype') == 'b')
                                {
                                    ?>    

                                                                                                                                                                                                                                                                                <!--                                <li><a class="btn btn-default" href="<?php echo base_url("Event_Management/eventInsertPage/" . $this->session->userdata('myid')); ?>" role="button">My Profile</a></li>-->
                                    <li><a class="btn btn-default" href="<?php echo base_url("Event_Management/createEvent/" . $this->session->userdata('myid')); ?>" role="button">Create your events.</a></li>
                                    <li><a class="btn btn-default" href="<?php echo base_url("Event_Management/profile/" . $this->session->userdata('myid')); ?>" role="button">My Profile</a></li>

                                    <?php
                                }
                                ?> 



                                <?php
                                if ($this->session->userdata('mytype') == 'a')
                                {
                                    ?>

                                    <li><a class="btn btn-default" href="<?php echo base_url(); ?>adminpanel/dashboard" role="button">Admin panel</a></li>
                                    <li><a class="btn btn-default" href="<?php echo base_url("Event_Management/eventInsertPage/" . $this->session->userdata('myid')); ?>" role="button">My Profile</a></li>
                                    <li><a class="btn btn-default" href="<?php echo base_url("Event_Management/createEvent/" . $this->session->userdata('myid')); ?>" role="button">Create your events.</a></li>

                                    <?php
                                }
                                ?>


                                <?php
                                if ($this->session->userdata('myid'))
                                {
                                    ?>
                                    <li><a class="btn btn-default" href="<?php echo base_url(); ?>administrator/UserInfo_Management/logout" role="button">Logout</a></li>

                                    <?php
                                }
                                ?>




                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
                <div class="row">
                    <div class="header-content">
                        <h1>Explore <span>topics,</span><br>find your <span>next event.</span></h1>

                        <form action="<?php echo base_url("Event_Management/search"); ?>" method="post">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                                <input type="text" name="search" class="form-control">

                            </div><!-- /input-group -->
                            <?php
                            echo $this->session->userdata('msg');
                            $this->session->unset_userdata('msg');
                            ?>
                        </form>


                    </div><!-- /.header-content -->
                </div> <!-- End /.row -->
            </header>














            <!-- End #header --> <!-- End #header --> <!-- End #header -->
            <!--Content Header-->


            <!--   Big container   -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="orange" id="wizardProfile">
                                <?php
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg')
                                ?>



                                <form action="<?php echo base_url() . "Event_Management/postEvent"; ?>" enctype="multipart/form-data" method="post">

                                    <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->

                                    <?php
                                    if ($validationcheck == 0)
                                    {
                                        ?>

                                        <div class="wizard-header text-center">
                                            <h3 class="wizard-title">Create your event</h3>
                                            <p class="category">This information will let us know more about your event.</p>
                                        </div>

                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="wizard-header text-center">
                                            <h3 class="wizard-title">Your account is deactivated by admin.</h3>
                                            <p class="category"></p>
                                        </div>


                                        <?php
                                    }
                                    ?>
                                    <div class="wizard-navigation">
                                        <div class="progress-with-circle">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#td" data-toggle="tab">
                                                    <div class="icon-circle">
                                                        <i class="ti-pencil"></i>
                                                    </div>
                                                    Introduction
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#catTime" data-toggle="tab">
                                                    <div class="icon-circle">
                                                        <i class="ti-briefcase"></i>
                                                    </div>
                                                    Date and time
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#type" data-toggle="tab">
                                                    <div class="icon-circle">
                                                        <i class="ti-direction-alt"></i>
                                                    </div>
                                                    Types
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#address" data-toggle="tab">
                                                    <div class="icon-circle">
                                                        <i class="ti-map"></i>
                                                    </div>
                                                    Address
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#finalStep" data-toggle="tab">
                                                    <div class="icon-circle">
                                                        <i class="ti-panel"></i>
                                                    </div>
                                                    Photo
                                                </a>
                                            </li>
                                        </ul>
                                    </div>






                                    <div class="tab-content">
                                        <div class="tab-pane" id="td">
                                            <div class="row">
                                                <h5 class="info-text"> Title and description.</h5>
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <label>Title <small>(required)</small></label>
                                                        <input name="title" required minlength="10" maxlength="55" type="text" class="form-control" id="title-input" placeholder="Event Title" <?php echo $validationcheck; ?>>
                                                        <?php echo form_error('title', "<div class='alert alert-danger'>", "</div>"); ?>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <label>Event description <small>(required)</small></label>
                                                        <textarea minlength="50" maxlength="1000" required <?php echo $validationcheck; ?> class="form-control" id="description-input" name="descr" placeholder="Description" rows="9"></textarea>
                                                        <?php echo form_error('descr', "<div class='alert alert-danger'>", "</div>"); ?>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <select required <?php echo $validationcheck; ?> name="purchase" id="pt" class="form-control">
                                                        <option value="" selected disabled>Purchased type.</option>
                                                        <option value="paid">Paid</option>
                                                        <option value="free">Free</option>
                                                    </select>
                                                    <?php echo form_error('purchase', "<div class='alert alert-danger'>", "</div>"); ?>
                                                </div>
                                            </div>

                                            <br>


                                            <!--                                            <div class="row">
                                                                                            <div class="col-sm-10 col-sm-offset-1">
                                                                                                <div class="form-group">
                                                                                                    <label>Price</label>
                                                                                                    <input <?php echo $validationcheck; ?> name="price" type="text" class="form-control" placeholder="$">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>-->


                                            <div id="priceSection">







                                            </div>





                                        </div>

                                        <input class="form-control" name="id" type="hidden" value="<?php echo $this->session->userdata('myid'); ?>" placeholder="Enter event title" />
                                        <input class="form-control" name="utype" type="hidden" value="<?php echo $this->session->userdata('mytype'); ?>" placeholder="Enter event title" />


                                        <!--check box design-->


                                        <div class="tab-pane" id="catTime">


                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h5 class="info-text"> Set date and time </h5>
                                                </div>
                                                <div class="col-sm-10 col-sm-offset-1">


                                                    <div class="">
                                                        <div class="form-group">
                                                            <label>Start time <small>(required)</small></label>
                                                            <input <?php echo $validationcheck; ?> required id="date" id="start-time" class="form-control" name="startTime" type="time">
                                                            <?php echo form_error('startTime', "<div class='alert alert-danger'>", "</div>"); ?>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label>End time <small>(required)</small></label>
                                                            <input required <?php echo $validationcheck; ?> id="date" id="end-time" class="form-control" name="endTime" type="time">
                                                            <?php echo form_error('endTime', "<div class='alert alert-danger'>", "</div>"); ?>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label>Start Date <small>(required)</small></label><br>
                                                            <input required <?php echo $validationcheck; ?> id="date" id="start-date" class="form-control" name="startDate" type="date">
                                                            <?php echo form_error('startDate', "<div class='alert alert-danger'>", "</div>"); ?>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label>End Date <small>(If it is not an one day event.)</small></label><br>
                                                            <input id="date" id="end-date" class="form-control"  name="endDate" type="date">
                                                            <?php echo form_error('endDate', "<div class='alert alert-danger'>", "</div>"); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--check box design ends-->


                                        <div class="tab-pane" id="type">


                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h5 class="info-text"> Set types </h5>
                                                </div>
                                                <div class="col-sm-10 col-sm-offset-1">

                                                    <div class="form-group">
                                                        <select required <?php echo $validationcheck; ?> name="category" id="set-category" class="form-control">


                                                            <option value="" disabled selected>Event type</option>


                                                            <?php
                                                            foreach ($categoryList as $catlist)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $catlist->id; ?>"><?php echo $catlist->category_name; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <?php echo form_error('category', "<div class='alert alert-danger'>", "</div>"); ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <select required <?php echo $validationcheck; ?> name="venue" id="set-venue" class="form-control">


                                                            <option value="" disabled selected>Venue type</option>


                                                            <?php
                                                            foreach ($venueList as $vdt)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $vdt->id; ?>"><?php echo $vdt->venue_type; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <?php echo form_error('venue', "<div class='alert alert-danger'>", "</div>"); ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <select required <?php echo $validationcheck; ?> name="purpose" id="set-purpose" class="form-control">


                                                            <option value="" disabled selected>Event purpose</option>


                                                            <?php
                                                            foreach ($purposeList as $pdt)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $pdt->id; ?>"><?php echo $pdt->purpose_type; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <?php echo form_error('purpose', "<div class='alert alert-danger'>", "</div>"); ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tags <small>(required)</small></label><br>
                                                        <input type="text" data-role="tagsinput" required minlength="10" name="tags">
                                                        <?php echo form_error('purpose', "<div class='alert alert-danger'>", "</div>"); ?>
                                                    </div>




                                                </div>
                                            </div>
                                        </div>



                                        <!--Last-->

                                        <div class="tab-pane" id="address">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h5 class="info-text">Set event location</h5>
                                                </div>
                                                <div class="col-sm-7 col-sm-offset-1">




                                                    <!--                                                    <div class="form-group">
                                                                                                            <label>Select event location by country</label>
                                                                                                            <select required <?php echo $validationcheck; ?> class="form-control" id="set-country" name="country">
                                                                                                                <option value="" disabled selected>Select Country</option>
                                                    <?php
//                                                            foreach ($countryList as $list)
//                                                            {
//                                                                if ($list->id != 16)
//                                                                {
//                                                                    
                                                    ?>
                                                                                                                        <option value="//<?php echo $list->id; ?>"><?php echo $list->country_name; ?></option>
                                                                                                                        //<?php
//                                                                }
//                                                            }
                                                    ?>
                                                                                                            </select>
                                                    <?php // echo form_error('country', "<div class='alert alert-danger'>", "</div>");  ?>
                                                                                                        </div>-->



                                                    <div class="form-group">
                                                        <label>Select event location by city</label>
                                                        <select required <?php echo $validationcheck; ?> class="form-control" id="set-city" name="city">
                                                            <option value="" disabled selected>Select city</option>
                                                            <?php
                                                            foreach ($cityList as $list)
                                                            {
                                                                if ($list->id != 7)
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo $list->id; ?>"><?php echo $list->city_name; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <?php echo form_error('city', "<div class='alert alert-danger'>", "</div>"); ?>
                                                    </div>
                                                </div>





                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <label>Address line 1</label>
                                                        <textarea required maxlength="30" minlength="10" <?php echo $validationcheck; ?> class=" form-control" id="address-l1" name="adrssL1" rows="3" placeholder="Specify event location"></textarea>
                                                        <?php echo form_error('adrssL1', "<div class='alert alert-danger'>", "</div>"); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane" id="finalStep">

                                            <div class="row">
                                                <h5 class="info-text"> Picture </h5>
                                                <div class="col-sm-6 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <div class="col-sm-4 col-sm-offset-1">
                                                            <div class="picture-container">
                                                                <div class="picture">
                                                                    <img src="<?php echo base_url(); ?>public/createEventForm/assets/img/default-avatar.jpg" class="picture-src" id="wizardPicturePreview" title="" />
                                                                    <input id="i_file" required <?php echo $validationcheck; ?> type="file" name="pic" id="wizard-picture">

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Picture formation.</label>
                                                        <p class="description">1)The picture size should under 500KB</p>
                                                        <p class="description">2)Valid picture formations are.</p>
                                                        <p class="description">JPG,JPEG,PNG,TIFF.</p>
                                                    </div>
                                                    <?php
                                                    if ($this->session->userdata("picmsg"))
                                                    {
                                                        ?>
                                                        <div class="alert alert-danger"><p><?php
                                                                echo $this->session->userdata("picmsg");
                                                                $this->session->unset_userdata("picmsg");
                                                                ?></p>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php echo form_error('pic', "<div class='alert alert-danger'>", "</div>"); ?>
                                                    <div class="error-holder">



                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-warning btn-wd bt-next' name='next' value='Next' />
                                            <input type='submit' id="i_submit" class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Finish' />
                                        </div>

                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>


                            </div>

                        </div> <!-- wizard container -->
                    </div>
                </div><!-- end row -->
            </div> <!--  big container -->


        </div><br><br><br><br><br>

        <!-- ++++++++++++++++++++ Start footer Section ++++++++++++++++++++ -->

        <footer id="footer">
            <div class="container">
                <div class="footer-widget-area">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-lg-3">
                            <div class="footer-widget footer-menu">
                                <h4 class="footer-widget-title">Your Account</h4>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">Sign up</a></li>
                                    <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">Sign in</a></li>
                                    <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">Help</a></li>
                                </ul>
                            </div><!-- End /.footer-menu -->
                        </div><!-- End /.col-md-3 -->
                        <div class="col-md-2 col-sm-2 col-lg-2">
                            <div class="footer-widget footer-menu">
                                <h4 class="footer-widget-title">Discover</h4>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">Calendar</a></li>
                                    <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">Tropics</a></li>
                                    <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">Cities</a></li>
                                </ul>
                            </div><!-- End /.footer-menu -->
                        </div><!-- End /.col-md-2 -->
                        <div class="col-md-2 col-sm-2 col-lg-2">
                            <div class="footer-widget footer-menu">
                                <h4 class="footer-widget-title">Browse</h4>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">Country</a></li>
                                    <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">Popular</a></li>
                                    <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#">Citys</a></li>
                                </ul>
                            </div><!-- End /.footer-menu -->
                        </div><!-- End /.col-md-2 -->
                        <div class="col-md-5 col-sm-5 col-lg-5">
                            <div class="footer-widget">
                                <div class="footer-social">
                                    <ul class="list-inline list-unstyed">
                                        <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#"><i class="fa fa-rss"></i></a></li>
                                        <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- End /.footer-social -->
                                <div class="select-language">
                                    <select>
                                        <option selected>English</option>
                                        <option>Bangla</option>
                                        <option>Greek</option>
                                        <option>Spanish</option>
                                    </select>
                                </div><!-- End /.select-language -->
                                <div class="download-option">
                                    <ul class="list-unstyled list-inline">
                                        <li><a href="<?php echo base_url(); ?>public/frontEndDesign/#"><img src="<?php echo base_url(); ?>public/frontEndDesign/images/app-store.png" alt="app store image" class="img-responsive"></a></li>
                                        <li class="pull-right"><a href="<?php echo base_url(); ?>public/frontEndDesign/#"><img src="<?php echo base_url(); ?>public/frontEndDesign/images/google-play.png" alt="google play image" class="img-responsive"></a></li>
                                    </ul>
                                </div><!-- End /.download-option -->
                            </div><!-- End /.footer-widget -->
                        </div> <!-- End /.col-md-5 -->
                    </div><!-- End /.row -->
                </div><!-- /.footer-widget -->
            </div><!-- /.container -->
        </footer><!-- End #footer -->


        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>public/tagsInput/tagsinput.js"></script>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>
        
        

    </body>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>public/createEventForm/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/createEventForm/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/createEventForm/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <!--  Plugin for the Wizard -->
    <script src="<?php echo base_url(); ?>public/createEventForm/assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>
    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
    <script src="<?php echo base_url(); ?>public/createEventForm/assets/js/jquery.validate.min.js" type="text/javascript"></script>



    <script>

            $(document).ready(function () {
                $("#pt").change(function () {
                    if ($(this).val() == "paid")
                    {
//                    alert("paid");

                        var t = '';

                        t += '    <div class="row">';
                        t += '        <div class="col-sm-10 col-sm-offset-1">';
                        t += '          <div class="form-group">';
                        t += '          <label>Price</label>';
                        t += '          <input required name="price" type="text" class="form-control" placeholder="$">';
                        t += '        </div>';
                        t += '       </div>';
                        t += '    </div>';


                        $('#priceSection').html(t);
                    }
                    if ($(this).val() == "free")
                    {
//                    alert("free");
                        $('#priceSection').html('');
                    }
                });
            });

    </script>


    <script>
//        $(document).ready(function(){
//            $(".btn-next").click(function(){
//                alert("ok");
//            });
//        });
    </script>




    <script>

//    $(document).ready(function(){
//        $('.btn-finish').click(function(){
////            console.log('Working');
//
//
//
//
//            var _title = $("#title-input").val();
//            var _description = $("#description-input").val();
////            var _startTime = $("#start-time").val();
////            var _endTime = $("#end-time").val();
////            var _startDate = $("#start-date").val();
////            var _endDate = $("#end-date").val();
////            var _setCategory = $("#set-category").val();
////            var _setVenue = $("#set-venue").val();
////            var _setPurpose = $("#set-purpose").val();
////            var _setCountry = $("#set-country").val();
////            var _setCity = $("#set-city").val();
////            var _addressL1 = $("#address-l1").val();
////            var _address-L2 = $("#address-l2").val();
//            
//            
//            
//            
//            if(_title) {
//                alert(_title);
//            }
//            else {
//                alert("not valid");
//            }
//            
//            
//            return false;
//        });
//    });

    </script>

    <script>
        $(document).ready(function () {
            $('#i_submit').click(function () {

                if (window.File && window.FileReader && window.FileList && window.Blob)
                {
                    //get the file size and file type from file input field
                    var fsize = $('#i_file')[0].files[0].size;
                    var ftype = $('#i_file')[0].files[0].type;
                    var fname = $('#i_file')[0].files[0].name;

                    if ((ftype != "image/jpg" && ftype != "image/jpeg" && ftype != "image/png" && ftype != "image/tiff"))
                    {
//                        alert("Type :" + ftype + " | " + fsize + " bites\n(File: " + fname + ") invalid type");
                        var t = '';
                        t += '<div class="alert alert-danger">';
                        t += '<p> Invalid file type. </p>';
                        t += '</div>';
                        $('.error-holder').html('');
                        $('.error-holder').html(t);
                        return false;
                    }
                    else if (fsize > 4194304)
                    {
//                        alert("Type :" + ftype + " | " + fsize + " bites\n(File: " + fname + ") Too big");

                        var t = '';
                        t += '<div class="alert alert-danger">';
                        t += '<p> File is too large. </p>';
                        t += '</div>';
                        $('.error-holder').html('');
                        $('.error-holder').html(t);
                        return false;
                    }
                    else if (fsize < 30720)
                    {
//                        alert("Type :" + ftype + " | " + fsize + " bites\n(File: " + fname + ") Too small");

                        var t = '';
                        t += '<div class="alert alert-danger">';
                        t += '<p> File is too small. </p>';
                        t += '</div>';
                        $('.error-holder').html('');
                        $('.error-holder').html(t);
                        return false;
                    }
                    else
                    {
//                        alert("Type :" + ftype + " | " + fsize + " bites\n(File :" + fname + ") You are good to go!");
                        return true;
                    }
                }
                else
                {
                    alert("Please upgrade your browser, because your current browser lacks some new features we need!");
                }

                return false;
            });
        });
    </script>


    <?php
//    echo '<pre>';
//    print_r($userById);
//    echo '</pre>';
//    echo '<pre>';
//    print_r($businessById);
//    echo '</pre>';
    ?>

</html>
