<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>Sign-Up/Login Form</title>
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/RegLogin/https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/RegLogin/css/style.css">


    </head>

    <body>

        <div class="form">

            <h3 style="color: red"><?php echo $this->session->userdata('msg');
$this->session->unset_userdata('msg'); ?></h3>

            






            <div class="tab-content">



                <!--User Login-->  

                <div id="signup">   
                    <h1>Reset password</h1>

                    <form action="<?php echo base_url(); ?>administrator/BusinessAccInfo_Management/resetPassCheckEmail" method="post">

                        <div class="field-wrap">
                            <label>
                                Email<span class="req">*</span>
                            </label>
                            <input type="email" name="email" required autocomplete="off"/>
                        </div>
                        
                        <?php echo form_error('email', "<p style='color:red'>", "</p>"); ?>

                        <button type="submit" class="button button-block"/>Reset my password</button>

                    </form>

                </div>



                <!--Business Login--> 

                <div id="login">   
                    <h1>Business Login</h1>

                    <form action="<?php echo base_url(); ?>administrator/BusinessAccInfo_Management/businessAccCheck" method="post">

                        <div class="field-wrap">
                            <label>
                                Email Address<span class="req">*</span>
                            </label>
                            <input type="email" name="email" required autocomplete="off"/>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Password<span class="req">*</span>
                            </label>
                            <input type="password" name="pass" required autocomplete="off"/>
                        </div>

                        <p class="forgot"><a href="<?php echo base_url(); ?>public/frontEndDesign/RegLogin/#">Forgot Password?</a></p>

                        <button class="button button-block"/>Login</button>

                    </form>

                </div>

            </div><!-- tab-content -->

        </div> <!-- /form -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



        <script  src="<?php echo base_url(); ?>public/frontEndDesign/RegLogin/js/index.js"></script>




    </body>

</html>
