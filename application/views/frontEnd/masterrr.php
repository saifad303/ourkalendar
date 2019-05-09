<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
        <title>Bootstrap user profile template</title>
        <!-- BOOTSTRAP STYLE SHEET -->
        <link href="<?php echo base_url(); ?>public/administratorDesign/assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT-AWESOME STYLE SHEET FOR BEAUTIFUL ICONS -->
        <link href="<?php echo base_url(); ?>public/administratorDesign/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE CSS -->
        <style type="text/css">
            .btn-social {
                color: white;
                opacity: 0.8;
            }

            .btn-social:hover {
                color: white;
                opacity: 1;
                text-decoration: none;
            }

            .btn-facebook {
                background-color: #3b5998;
            }

            .btn-twitter {
                background-color: #00aced;
            }

            .btn-linkedin {
                background-color: #0e76a8;
            }

            .btn-google {
                background-color: #c32f10;
            }
            .button {
                margin-left:530px;
                margin-top:0px;
            }
            .logo {
                margin-left:590px;
                margin-top:300px;
            }
        </style>
    </head>
    <body style="background-color: #8AA0A0">

        <?php
        $id = $this->session->userdata("myid");
        ?>

        <div>
            <?php
            if ($this->session->userdata('myid'))
            {
                ?>
                <a href="<?php echo base_url(); ?>administrator/UserInfo_Management/logout"><button type="button" class="btn btn-danger">Logout</button></a>
                <?php
            }
            ?>
        </div>

        <div>
            <?php
            if ($this->session->userdata('mytype') == 'u')
            {
                ?>
                <a href="<?php echo base_url(); ?>Event_Management/eventInsertPage"><button type="button" class="btn btn-primary">User Account</button></a>
                <?php
            }
            ?>
        </div>



        <div>
            <?php
            if ($this->session->userdata('mytype') == 'b')
            {
                ?>
                <a href="<?php echo base_url(); ?>Event_Management/eventInsertPage"><button type="button" class="btn btn-primary">Business Account</button></a>
                <?php
            }
            ?>
        </div>

        <div class="logo">
            <img src="<?php echo base_url(); ?>public/administratorDesign/images/logo.png" height="100" width="400">
        </div>


        <div class="button">

            <?php
            if ($this->session->userdata('mytype') == 'a')
            {
                ?>
                <a href="<?php echo base_url(); ?>adminpanel/dashboard" class="btn btn-social btn-facebook">
                    &nbsp; Admin Panel</a>


                <a  class="btn btn-social btn-facebook" href="<?php echo base_url() . "Event_Management/eventInsertPage/" . $id; ?>">My Account</a>
                <?php
            }
            ?>

            <div>
                <a href="<?php echo base_url(); ?>Home/homePage"><button type="button" class="btn btn-primary">All Events</button></a>
            </div>

            <div>
                <a href="<?php echo base_url(); ?>Home/duplicatePage"><button type="button" class="btn btn-primary">Master Page</button></a>
            </div>

            <?php
            if (!$this->session->userdata('myid'))
            {
                ?>
                <a href="<?php echo base_url(); ?>Home/signUp" class="btn btn-social btn-google">
                    &nbsp; Sign Up</a>
                <a href="<?php echo base_url(); ?>Home/signIn" class="btn btn-social btn-twitter">
                    &nbsp; Sign In</a>
                <?php
            }
            ?>

        </div>

        <script src="<?php echo base_url(); ?>public/administratorDesign/assets/js/jquery-1.11.1.js"></script>
        <!-- REQUIRED BOOTSTRAP SCRIPTS -->
        <script src="<?php echo base_url(); ?>public/administratorDesign/assets/js/bootstrap.js"></script>
    </body>

</html>
