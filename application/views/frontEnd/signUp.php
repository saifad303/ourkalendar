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
            <p style="color: red;"><?php
                echo $this->session->userdata("picmsg");
                $this->session->unset_userdata("picmsg");
                ?></p>

            <ul class="tab-group">
                <li class="tab active"><a href="#signup">User Sign Up</a></li>
                <li class="tab"><a href="#login">Business Sign Up</a></li>
            </ul>






            <div class="tab-content">



                <!--User Login-->  

                <div id="signup">   
                    <h1>User Registration</h1>

                    <form action="<?php echo base_url(); ?>administrator/UserInfo_Management/userRegistration" enctype="multipart/form-data" method="post">

                        <div class="field-wrap">
                            <label>
                                Name<span class="req">*</span>
                            </label>
                            <input type="text" name="uname"  autocomplete="off"/>
                            <?php echo form_error('uname', "<p style='color:red'>", "</p>"); ?>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Email<span class="req">*</span>
                            </label>
                            <input type="text" name="email"  autocomplete="off"/>
                            <?php echo form_error('email', "<p style='color:red'>", "</p>"); ?>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Password<span class="req">*</span>
                            </label>
                            <input type="password" name="pass"  autocomplete="off"/>
                            <?php echo form_error('pass', "<p style='color:red'>", "</p>"); ?>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Confirm Password<span class="req">*</span>
                            </label>
                            <input type="password" name="pass1"  autocomplete="off"/>
                            <?php echo form_error('pass1', "<p style='color:red'>", "</p>"); ?>
                        </div>

<!--                        <div class="field-wrap">
                            <label>
                                Bio<span class="req">*</span>
                            </label>
                            <textarea  autocomplete="off" name="descr"  rows="5"></textarea>
                            <?php echo form_error('descr', "<p style='color:red'>", "</p>"); ?>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Picture<span class="req">*</span>
                            </label>
                            <br><br>
                            <input type="file"  name="pic"  autocomplete="off"/>

                            <?php echo form_error('pic', "<p style='color:red'>", "</p>"); ?>
                        </div>-->

                        <button type="submit" class="button button-block"/>Get Started</button>

                    </form>

                </div>










                <!--Business Login--> 

                <div id="login">   
                    <h1>Business Account Registration</h1>

                    <form action="<?php echo base_url(); ?>administrator/BusinessAccInfo_Management/businessRegistration" method="post" enctype="multipart/form-data">

                        <div class="field-wrap">
                            <label>
                                Title<span class="req">*</span>
                            </label>
                            <input type="text" name="title"  autocomplete="off"/>
                            <?php echo form_error('title', "<p style='color:red'>", "</p>"); ?>
                        </div>


                        <div class="field-wrap">
                            <label>
                                Email Address<span class="req">*</span>
                            </label>
                            <input type="email" name="bemail"  autocomplete="off"/>
                            <?php echo form_error('bemail', "<p style='color:red'>", "</p>"); ?>
                        </div>


                        <div class="field-wrap">
                            <label>
                                Password<span class="req">*</span>
                            </label>
                            <input type="password" name="bpass"  autocomplete="off"/>
                            <?php echo form_error('bpass', "<p style='color:red'>", "</p>"); ?>
                        </div>


                        <div class="field-wrap">
                            <label>
                                Confirm Password<span class="req">*</span>
                            </label>
                            <input type="password" name="bpass1"  autocomplete="off"/>
                            <?php echo form_error('bpass1', "<p style='color:red'>", "</p>"); ?>
                        </div>

<!--                        <div class="field-wrap">
                            <label>
                                Bio<span class="req">*</span>
                            </label>
                            <textarea  autocomplete="off" name="bdescr"  rows="5"></textarea>
                            <?php // echo form_error('bdescr', "<p style='color:red'>", "</p>"); ?>
                        </div>
                        <div class="field-wrap">
                            <label>
                                Picture<span class="req">*</span>
                            </label>
                            <br><br>
                            <input type="file" name="bpic"  autocomplete="off"/>
                            <p style="color: red;"><?php
                                echo $this->session->userdata("picmsg");
                                $this->session->unset_userdata("picmsg");
                                ?></p>
                            <?php // echo form_error('bpic', "<p style='color:red'>", "</p>"); ?>
                        </div>-->

                        

                        <button class="button button-block"/>Get Started</button>

                    </form>

                </div>

            </div><!-- tab-content -->

        </div> <!-- /form -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



        <script  src="<?php echo base_url(); ?>public/frontEndDesign/RegLogin/js/index.js"></script>




    </body>

    <?php
//    echo '<pre>';
//    print_r($cityList);
//    echo '</pre>';
    ?>

</html>
