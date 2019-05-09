<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">


        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>public/apple-icon.png" />
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/favicon.png" />
        
        
        <title>ourKalender</title>
        
        
        <!-- #######  GOOGLE-FONTS link  #######-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">






        <!-- #######  BOOTSTRAP css link  #######-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/bootstrap.min.css">
        <!-- #######  FONT-AWESOME css link  #######-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/font-awesome.min.css">
        <!-- #######  MYSTYLE css link  #######-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/style.css">
        <!-- #######  RESPONSIVE css link  #######-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/responsive.css">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/css/newStyle.css">
        






        <!--#######  MAIN JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/jquery-2.2.4.min.js"></script>
        <!--#######  BOOTSTRAP JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/bootstrap.min.js"></script>
        <!--#######  CUSTOM JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/custom.js"></script>
        <!--#######  JQUERY UI JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/jquery-ui.js"></script>
        
        
        
    </head>
    <body>

        <!-- ++++++++++++++++++++ Start header Section ++++++++++++++++++++ -->

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
                                <li><a class="btn btn-default" href="<?php echo base_url("Event_Management/createEvent/" . $this->session->userdata('myid')); ?>" role="button">Create your events.</a></li>
                                <li><a class="btn btn-default" href="<?php echo base_url("Event_Management/profile/" . $this->session->userdata('myid')); ?>" role="button">My Profile</a></li>

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




                </div><!-- /.header-content -->
            </div> <!-- End /.row -->
        </header> <!-- End #header -->

        <!-- ++++++++++++++++++++ Start Page Main Content Section ++++++++++++++++++++ -->



        <?php
        if ($content)
        {
            echo $content;
        }
        ?>

        <!-- ++++++++++++++++++++ Start footer Section ++++++++++++++++++++ -->

        <footer id="footer">
            <div class="container">
                <p>&copy; 2018 Our Calender <br><span style="font-size:11px; color:#666;">Terms of Service | Privacy Policy | Cookie Policy</span></p>
            </div><!-- /.container -->
        </footer><!-- End #footer -->
        
        
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/jaliswall.js"></script>

        <script>

            $('.wall').jaliswall({item: '.wall-item'});
        </script>




        <!-- #######  MAIN JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/jquery-2.2.4.min.js"></script>
        <!-- #######  BOOTSTRAP JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/bootstrap.min.js"></script>
        <!-- #######  CUSTOM JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/custom.js"></script>
        <!-- #######  CUSTOM JS link  #######-->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/jquery-ui.js"></script>



        

    </body>
</html>

