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
                                        <div style="margin-left: 30px;"><?php
                                            if ($this->session->userdata("msg"))
                                            {
                                                echo "<h4>" . $this->session->userdata("msg") . "</h4>";
                                                $this->session->unset_userdata("msg");
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        if ($this->session->userdata("mytype") == "u" || $this->session->userdata("mytype") == "a")
                                        {
                                            ?>
                                            <h3 style="padding: 5px 20px;border-bottom: 1px solid #e2e2e2;margin: 0"><?php echo $info->name; ?></h3>
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
                                                    <h4>Location</h4>
                                                    <p>Dhaka</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h4>Member since:</h4>
                                                    <p>

                                                        <?php
                                                        $d = new DateTime($info->joinDate);

                                                        $timestamp = $d->getTimestamp(); // Unix timestamp
                                                        $formatted_date = $d->format('l ,M d, Y'); // 2003-10-16

                                                        echo $formatted_date;
                                                        ?>

                                                    </p>

                                                </div>
                                                <div class="col-sm-4">
                                                    <h4>Email</h4>
                                                    <p><?php echo $info->email; ?></p>


                                                </div>
                                                <div class="col-sm-4">

                                                </div>
                                                <div class="col-sm-4">
                                                    <p></p>
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
                                        <div style="padding:20px;">
                                            <div class="row">
                                                <div class="col-sm-12">

                                                    <b><p>My Event</p></b>
                                                    <?php
                                                                                                            
                                                    $count = 0;
                                                    foreach ($eventListById as $list)
                                                    {
                                                        if ($list->user_type == $this->session->userdata("mytype"))
                                                        {
                                                            
                                                            ?>
                                                            <a href="<?php echo base_url("Event_Management/showEventDetail/" . $list->id); ?>">
                                                                <p>
                                                                    <?php
                                                                    if($list->activation == 1 && $list->editActivation == 1 && $list->activeorinactive == 1)
                                                                    {
                                                                        echo ++$count . "." . $list->title . "[APPROVED]";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo ++$count . "." . $list->title . "[DISAPPROVED]";
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </a>

                                                            <?php
                                                        }
                                                    }
                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div style="padding:20px;">
                                            <div class="row">
                                                <div class="col-sm-12">

                                                    <b><p>Subscribed Event</p></b>
                                                    <?php
                                                    $count = 0;
                                                    foreach ($allSubscribList as $list)
                                                    {
                                                        if ($list->user_type == $this->session->userdata("mytype"))
                                                        {
                                                            foreach ($allEventList as $evList)
                                                            {
                                                                if ($list->eventid == $evList->id)
                                                                {
                                                                    ?>
                                                                    <a href="<?php echo base_url("Event_Management/showEventDetail/" . $evList->id); ?>">    
                                                                        <p>

                                                                            <?php
                                                                            echo ++$count . "." . $evList->title;
                                                                            ?>

                                                                        </p>
                                                                    </a>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>    


                                    </div>
                                    <div class="col-sm-2">
                                        <?php
                                        if ($this->session->userdata("mytype") == 'a' || $this->session->userdata("mytype") == 'u')
                                        {
                                            ?>
                                            <a href="<?php echo base_url("Event_Management/editProf/" . $info->id); ?>"><p style="padding: 9px 5px;border-bottom: 1px solid #e2e2e2;margin: 0">Edit Profile</p></a>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                        if ($this->session->userdata("mytype") == 'b')
                                        {
                                            ?>
                                            <a href="<?php echo base_url("Event_Management/editProfPageBusiness/" . $info->id); ?>"><p style="padding: 9px 5px;border-bottom: 1px solid #e2e2e2;margin: 0">Edit Profile</p></a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <div style="padding: 10px ">
                                            <div style="text-align: center">
                                                <img src="<?php echo base_url(); ?>public/profileDesign/image/profile_pic.jpg" class="img-responsive"/>
                                                <div style="border-bottom: 1px solid #e8e8e8">
                                                    <a href="#" ></a>
                                                </div>

                                                <a href="#"></a>
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

        </div>



        <script src="<?php echo base_url(); ?>public/profileDesign/js/bootstrap.min.js"></script>
    </body>
</html>

<?php
//echo '<pre>';
//print_r($allSubscribList);
//echo '</pre>';
//echo '<pre>';
//print_r($eventListById);
//echo '</pre>';
?>
