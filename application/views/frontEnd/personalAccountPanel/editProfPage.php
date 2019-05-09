<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project</title>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <script src="<?php echo base_url(); ?>public/profileDesign/js/jquery.min.js"></script> 
        <style>
            .networks{
                float:left;
                padding: 3px;
            }

            body {
                font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
                font-size: 14px;
                line-height: 1.42857143;
                color: #333;
                background-color: #F8F8F8;
            }
        </style>

    </head>
    <body>
        <div class="container">



            <form method="post" action="<?php echo base_url("Event_Management/updateProf"); ?>">




                <?php
                foreach ($userInfo as $info)
                {
                    ?>
                    <div  style="background-color: #f8f8f8;padding-top: 20px;padding-bottom: 20px;border-top: 1px solid #e4e4e4">
                        <div class="row">
                            <div class="col-md-2 hidden-sm"></div>
                            <div class="col-md-8">
                                <div style="border: 1px solid #ccc;box-shadow: 0 1px 6px #ccc;background-color: white">
                                    <div class="row">
                                        <div class="col-sm-6">


                                            <?php
                                            if ($this->session->userdata("mytype") == "u" || $this->session->userdata("mytype") == "a")
                                            {
                                                ?>
                                                <h4 style="padding: 5px 20px;border-bottom: 1px solid #e2e2e2;margin: 0">Name:<span> <input type="text" name="uname" value="<?php echo $info->name; ?>" class="form-control"></span></h4>

                                                <br>

                                                <h4 style="padding: 5px 20px;border-bottom: 1px solid #e2e2e2;margin: 0">Password:<span> <input type="password" placeholder="Password" class="form-control" name="pass"></span></h4>
                                                
                                                <input type="hidden" name="uid" value="<?php echo $info->id; ?>">
                                                <?php
                                            }
                                            ?>

                                            <?php
                                            if ($this->session->userdata("mytype") == "b")
                                            {
                                                ?>
                                                <h3 style="padding: 5px 20px;border-bottom: 1px solid #e2e2e2;margin: 0"><?php echo $info->business_title; ?></h3>
                                                <?php
                                            }
                                            ?>
                                            <div style="padding:20px;border-bottom: 1px solid #e2e2e2">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <h4></h4>
                                                    </div>

                                                    <br>
                                                    <div class="col-sm-4">

                                                    </div>
                                                    <div class="col-sm-12">
                                                        <a href="#">Add a bio..</a>
                                                    </div>

                                                </div>
                                            </div>

                                            <div style="padding:20px;border-bottom: 1px solid #e2e2e2">
                                                <div class="row">
                                                    <div class="col-sm-6">

                                                        <p>Address</p>
                                                    </div>
                                                    <div class="col-sm-6">

                                                        <p>Phone</p>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="col-sm-2">
                                            <br>
                                            <button type="submit" class="btn btn-default">Save changes</button>

                                        </div>
                                        <div class="col-sm-4">
                                            <div style="padding: 10px ">
                                                <div style="text-align: center">
                                                    <img src="<?php echo base_url(); ?>public/profileDesign/image/profile_pic.jpg" class="img-responsive"/>
                                                    <div style="border-bottom: 1px solid #e8e8e8">

                                                    </div>


                                                </div>                 
                                                <div style="border-bottom: 1px solid #e2e2e2">

                                                    <h4></h4>
                                                    <a href=""></a>  
                                                </div>
                                                <div style="margin: 10px 0">
                                                    <a href="#"></a>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <?php
                }
                ?>



            </form>



        </div>



        <script src="<?php echo base_url(); ?>public/profileDesign/js/bootstrap.min.js"></script>
    </body>
</html>

<?php
//echo '<pre>';
//print_r($allSubscribList);
//echo '</pre>';
?>
