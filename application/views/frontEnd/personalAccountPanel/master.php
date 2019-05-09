<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Personal Profile</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- MORRIS CHART STYLES-->
        <link href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/index.html">Personal Profile</a> 
                </div>
                <div style="color: white;
                     padding: 15px 50px 5px 50px;
                     float: right;
                     font-size: 16px;">  <a href="<?php echo base_url(); ?>administrator/UserInfo_Management/logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
            </nav>   
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/assets/img/find_user.png" class="user-image img-responsive"/>
                        </li>


                        
                        <?php
                        $id = $this->session->userdata("myid");
                        ?>
                        
                        <li>
                            <a  href="<?php echo base_url()."Event_Management/eventInsertPage/".$id; ?>"><i class="fa fa-desktop fa-3x"></i> Event Post</a>
                        </li>
                        
                        <li>
                            <a  href="<?php echo base_url()."Event_Management/myEvents/".$id; ?>"><i class="fa fa-desktop fa-3x"></i> My Events</a>
                        </li>
                        
                        	
                    </ul>

                </div>

            </nav>  
            <!-- /. NAV SIDE  -->





            <?php
            if (isset($content))
            {
                echo $content;
            }
            ?>






            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/assets/js/jquery.metisMenu.js"></script>
        <!-- MORRIS CHART SCRIPTS -->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/assets/js/morris/raphael-2.1.0.min.js"></script>
        <script src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/assets/js/morris/morris.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/assets/js/custom.js"></script>


    </body>
</html>
