
<style>
    .btn-defaultt {
        color: #333;
        background-color: #fff;
        border-color: #ccc;
        margin-left: 110px;
    }
</style>
<?php
foreach ($eventDetail as $detailInfo)
{
//    neccessary ifo

    if ($detailInfo->user_type == 'u')
    {
        $eventwonerid = $detailInfo->userid;
        $eventwonertype = $detailInfo->user_type;
    }
    if ($detailInfo->user_type == 'b')
    {
        $eventwonerid = $detailInfo->businessid;
        $eventwonertype = $detailInfo->user_type;
    }
    $eventid = $detailInfo->id;
    ?>


    <?php
    $words[] = '';
    foreach ($eventDetail as $dt)
    {
        $str = $dt->tags;

        $array = str_split($str);

        $word = '';

        foreach ($array as $key => $char)
        {
            if ($char == ',')
            {
                $words[] = $word;
                $word = '';
                continue;
            }
            $word = $word . $char;
        }
    }
    ?>
    <section id="page-main-content">
        <div class="event-details-padding">
            <!-- ++++++++++++++++++++ Start event-details-heading ++++++++++++++++++++ -->
            <div class="event-details-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1 col-sm-1 col-lg-1">
                            <div class="highlight-date">
                                <span>  
                                    <?php
                                    $d = new DateTime($detailInfo->startDate);

                                    $timestamp = $d->getTimestamp(); // Unix timestamp
                                    $formatted_date = $d->format('d'); // 2003-10-16
                                    $formatted_month = $d->format('M'); // 2003-10-16

                                    echo $formatted_date;
                                    ?>
                                </span> <?php echo $formatted_month ?></div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <p class="date"><?php
                                $d = new DateTime($detailInfo->startDate);

                                $timestamp = $d->getTimestamp(); // Unix timestamp
                                $formatted_date = $d->format('l ,M d, Y'); // 2003-10-16

                                echo $formatted_date;
                                ?></p>
                            <h2><?php echo $detailInfo->title; ?></h2>
                            <ul class="post-meta list-unstyled list-inline">
                                <li>
                                    <div class="author-img">

                                    </div>
                                </li>
                                <li>
                                    <div class="author-info">
                                        <p class="author-name">Posted by 
                                            <span style="color: #2980B9;">
                                                <?php
                                                if ($detailInfo->user_type == 'u')
                                                {
                                                    foreach ($allUserList as $ulist)
                                                    {
                                                        if ($ulist->id == $detailInfo->userid)
                                                        {
                                                            echo $ulist->name;
                                                        }
                                                    }
                                                }
                                                if ($detailInfo->user_type == 'b')
                                                {
                                                    foreach ($allBusList as $blist)
                                                    {
                                                        if ($blist->id == $detailInfo->businessid)
                                                        {
                                                            echo $blist->business_title;
                                                        }
                                                    }
                                                }
                                                ?>
                                            </span></p>
                                        <p class="author-address" >Location <span style="color: #2980B9;"><?php echo $detailInfo->eventLocationL1 . "," . $detailInfo->eventLocationL2; ?></span></p>
                                    </div>
                                </li>
                            </ul><!-- End /.post-meta -->
                        </div><!-- End /.col-md-6 -->

                        <?php echo $subscriberButton; ?>


                        <?php
                        if ($detailInfo->user_type == 'u' || $detailInfo->user_type == 'a')
                        {
                            if ($this->session->userdata("myid") != $detailInfo->userid)
                            {
                                ?>
                                <div>
                                    <button type="button" class="btn btn-default btn-defaultt" data-toggle="modal" data-target="#myModal">Report</button>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <?php
                        if ($detailInfo->user_type == 'b')
                        {
                            if ($this->session->userdata("myid") != $detailInfo->businessid)
                            {
                                ?>
                                <div>
                                    <button type="button" class="btn btn-default btn-defaultt" data-toggle="modal" data-target="#myModal">Report</button>
                                </div>
                                <?php
                            }
                        }
                        ?>



                        <!--Edit-->

                        <?php
                        if ($detailInfo->user_type == 'u' || $detailInfo->user_type == 'a')
                        {
                            if ($this->session->userdata("myid") == $detailInfo->userid)
                            {
                                ?>
                                <div>
                                    <a href="<?php echo base_url("Event_Management/editEvent/" . $detailInfo->id); ?>"><button type="button" class="btn btn-default btn-defaultt" >Edit</button></a>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <?php
                        if ($detailInfo->user_type == 'b')
                        {
                            if ($this->session->userdata("myid") == $detailInfo->businessid)
                            {
                                ?>
                                <div>
                                    <a href="<?php echo base_url("Event_Management/editEvent/" . $detailInfo->id); ?>"><button type="button" class="btn btn-default btn-defaultt" >Edit</button></a>
                                </div>
                                <?php
                            }
                        }
                        ?>


                    </div><!-- End /.row -->
                </div><!-- /.container -->	
            </div><!-- /.event-details-heading -->
            <div class="container">
                <div class="row">

                    <div class="col-md-offset-1 col-md-6 col-sm-offset-1 col-sm-6 col-lg-offset-1 col-lg-6">
                        <div class="event-details">
                            <div class="event-thumbnail">
                                <img src="<?php echo base_url("public/eventImages/event_" . $detailInfo->id . "." . $detailInfo->picture); ?>" alt="event details image" class="img-responsive">
                            </div>
                            <div class="event-details-content">
                                <h3>Details</h3>
                                <p>
                                    <?php
                                    echo $detailInfo->description;
                                    ?>
                                </p>
                            </div><!-- /.event-details-content -->

                            <br>

                            <div class="event-details-content">
                                <h3>Tags</h3>
                                <h4>

                                    <?php
                                    foreach ($allCategoryList as $ctlist)
                                    {
                                        if ($ctlist->id == $detailInfo->categoryid)
                                        {
                                            ?>
                                            <a href="<?php echo base_url("Event_Management/filterResultForOneQuery/" . $ctlist->id . "/categoryid"); ?>"><span class="label label-default"><?php echo $ctlist->category_name; ?></span></a>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php
                                    foreach ($allVenueList as $vlist)
                                    {
                                        if ($vlist->id == $detailInfo->venueid)
                                        {
                                            ?>
                                            <a href="<?php echo base_url("Event_Management/filterResultForOneQuery/" . $vlist->id . "/venueid"); ?>"><span class="label label-default"><?php echo $vlist->venue_type; ?></span></a>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php
                                    foreach ($allEventPurposeList as $plist)
                                    {
                                        if ($plist->id == $detailInfo->eventpurposeid)
                                        {
                                            ?>
                                            <a href="<?php echo base_url("Event_Management/filterResultForOneQuery/" . $plist->id . "/eventpurposeid"); ?>"><span class="label label-default"><?php echo $plist->purpose_type; ?></span></a>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php
                                    foreach ($words as $w)
                                    {
                                        ?>

                                        <a href="<?php echo base_url("Event_Management/searchTags/" . $w); ?>"><span class="label label-default"><?php echo $w; ?></span></a>

                                        <?php
                                    }
                                    ?>


                                </h4>
                            </div>
                        </div><!-- /.event-details -->

                        <?php echo $comment; ?>


                    </div><!-- End /.col-md-6 -->
                    <div class="col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-4 col-lg-offset-1 col-lg-4">
                        <div class="right-sidebar">
                            <div class="widget event-reminder-and-location">
                                <div class="event-reminder">
                                    <div class="row">
                                        <div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="col-md-10 col-xs-10 col-sm-10 col-lg-10">
                                            <p class="event-reminder-date"><?php echo $formatted_date; ?></p>
                                            <p class="event-reminder-time"><?php
                                                echo date("g:i a", strtotime($detailInfo->startTime));
                                                ?> to <?php
                                                echo date("g:i a", strtotime($detailInfo->endTime));
                                                ?></p>
                                        </div>
                                    </div><!-- /.row -->
                                </div> <!-- /.event-reminder -->
                                <div class="event-location">
                                    <div class="row">
                                        <div class="col-md-2 col-xs-2  col-sm-2 col-lg-2">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="col-md-10 col-xs-10 col-sm-10 col-lg-10">
                                            <p class="event-location-area">Event location</p>
                                            <p class="event-location-venue"><?php echo $detailInfo->eventLocationL1 . "," . $detailInfo->eventLocationL2; ?></p>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.event-location -->
                            </div><!-- /.event-reminder-and-location -->
                            <div class="widget ad">
                                <a href="<?php echo base_url(); ?>/public/frontEndDesign/#"><img src="<?php echo base_url(); ?>/public/frontEndDesign/images/event-details-ad.png" alt="advertisement" class="img-responsive"></a>
                            </div><!-- /.ad -->

                            <?php echo $subscriber; ?>

                        </div><!-- End /.right-sidebar -->
                    </div><!-- End /.col-md-4 -->
                </div><!-- End /.row -->
            </div><!-- /.container -->
        </div><!-- End /.event-details-padding -->









        <!--report cmplains-->
        <?php // echo $complain;   ?>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">What's wrong with this event.</h4>
                    </div>
                    <div class="modal-body">
                        <div class="radio">
                            <div class="radio">
                                <label><input type="radio" value="It's harassing me or someone i know." name="optradio">It's harassing me or someone i know.</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="radio">
                            <label><input type="radio" value="It's a scam." name="optradio">It's a scam.</label>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="radio">
                            <label><input type="radio" value="I think it shouldn't be here." name="optradio">I think it shouldn't be here.</label>
                        </div>
                    </div>

                    <input type="hidden" id="complainer-id" value="<?php echo $this->session->userdata("myid"); ?>" >
                    <input type="hidden" id="event-id" value="<?php echo $eventid; ?>" >
                    <input type="hidden" id="guilty-id" value="<?php echo $eventwonerid; ?>" >
                    <input type="hidden" id="guilty-type" value="<?php echo $eventwonertype; ?>" >

                    <div class="modal-footer">
                        <textarea class="form-control complain" name="comment_report" placeholder="Write your complain." rows="5" id="comment"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-submit" data-dismiss="modal">submit</button>
                    </div>

                </div>

            </div>
        </div>
























        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="text-align: center;">See all members</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        foreach ($allSubscribers as $sublist)
                        {
                            foreach ($allUserList as $list)
                            {
                                if ($sublist->userid == $list->id)
                                {
                                    $uname = $list->name;
                                }
                            }
                            ?>
                            <p><?php echo $uname; ?>.</p>
                            <hr>
                            <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End #page-main-content -->

    <?php
}
?>
<script>

    $(document).ready(function () {
        $('.btn-submit').click(function () {
            report_post_btn_click();
        });
    });


    function report_post_btn_click()
    {
        var report = $("input[name='optradio']:checked").val();
        var complainerid = $("#complainer-id").val();
        var eventid = $("#event-id").val();
        var guiltyid = $("#guilty-id").val();
        var guiltyType = $("#guilty-type").val();
        var complain = $(".complain").val();


        var dataString = 'report=' + report + '&complainerid=' + complainerid + '&eventid=' + eventid + '&guiltyid=' + guiltyid + '&guiltyType=' + guiltyType + '&complain=' + complain;

//        console.log(dataString);


        $.ajax({
            type: 'POST',
            data: dataString,
            url: "<?php echo base_url("Event_Management/report") ?>",
            success: function (data) {
                report_result(jQuery.parseJSON(data));
//                console.log(report);
            }
        });
    }


    function report_result(data)
    {
        var res = data.exist;
        var limit = data.limit;
        var report = data.report;
        var submitReport = data.submitReport;

        if (res)
        {
            alert(res);
        }
        if (limit)
        {
            alert(limit);
        }
        if (report)
        {
            alert(report);
        }
        if (submitReport)
        {
            alert(submitReport);
        }
    }

</script>

<?php
//echo '<pre>';
//print_r($eventDetail);
//echo '</pre>';
?>