<div class=".col-md-6 .offset-md-3">
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>bs4 beta friend list - Bootdey.com</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style type="text/css">
                body{
                    margin-top:0px;
                    background:#FAFAFA;    
                }
                /*==================================================
                  Nearby People CSS
                  ==================================================*/

                .people-nearby .google-maps{
                    background: #f8f8f8;
                    border-radius: 4px;
                    border: 1px solid #f1f2f2;
                    padding: 20px;
                    margin-bottom: 20px;
                }

                .people-nearby .google-maps .map{
                    height: 300px;
                    width: 100%;
                    border: none;
                }

                .people-nearby .nearby-user{
                    padding: 20px 0;
                    border-top: 1px solid #f1f2f2;
                    border-bottom: 1px solid #f1f2f2;
                    margin-bottom: 20px;
                }

                img.profile-photo-lg{
                    height: 80px;
                    width: 80px;
                    border-radius: 50%;
                }

            </style>
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="people-nearby">





                            <?php
                            $count = 0;
                            foreach ($allSubscribers as $list)
                            {
                                $count++;
                                foreach ($allUserList as $ulist)
                                {
                                    if ($ulist->id == $list->userid)
                                    {
                                        $userName = $ulist->name;
                                    }
                                }
                                ?>

                                <div class="nearby-user" id="subid_<?php echo $list->id; ?>">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="user" class="profile-photo-lg">
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <p><?php echo $userName; ?></p>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <?php
                                            if ($list->userid == $this->session->userdata('myid'))
                                            {
                                                ?>
                                                <a href="<?php echo base_url("Event_Management/unsubscribe/" . $list->id . "/" . $list->eventid); ?>"><button class="btn btn-primary pull-right">Unsubscribed</button></a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>

                            <?php
                            if ($count == 0)
                            {
                                    ?>

                                    <section id="page-main-content">
                                        <div class="event-details-padding">
                                            <!-- ++++++++++++++++++++ Start blank-page ++++++++++++++++++++ -->
                                            <div class="event-details-heading blank-page">
                                                <div class="container">
                                                    <h1>No subscribers.</h1>
                                                    
                                                </div><!-- /.container -->	
                                            </div><!-- /.event-details-heading -->
                                        </div><!-- End /.event-details-padding -->
                                    </section><!-- End #page-main-content -->

                                    <?php
                                
                            }
                            ?>



                        </div>
                    </div>
                </div>
            </div>

            <script src="http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script type="text/javascript">

            </script>
        </body>
    </html>
</div>

<?php
//echo '<pre>';
//print_r($allSubscribers);
//echo '</pre>';
?>