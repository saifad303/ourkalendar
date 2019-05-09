

<!-- ++++++++++++++++++++ Start Page Main Content Section ++++++++++++++++++++ -->
<section id="page-main-content">
    <div id="catch-another-container" class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-lg-3">
                <!-- ++++++++++++++++++++ Start left sidebar ++++++++++++++++++++ -->
                <div class="left-sidebar">
                    <div class="lss">
                        <div class="widget city-widget">
                            <h4 class="widget-title">City</h4>
                            <div class="search-filter">
                                <div class="text-right">
                                    <div class="city filter">

                                        <form action="<?php echo base_url("Home"); ?>" method="get">
                                            <select name="cityid">
                                                <option disabled selected>Select City</option>
                                                <?php
                                                foreach ($allCityList as $ctlist)
                                                {
                                                    if ($ctlist->id == $cityid)
                                                    {
                                                        ?>

                                                        <option selected value="<?php echo $ctlist->id; ?>"><?php echo $ctlist->city_name; ?></option>

                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <?php
                                                foreach ($allCityList as $ctlist)
                                                {
                                                    if ($ctlist->id != $cityid && $ctlist->id != 7)
                                                    {
                                                        ?>

                                                        <option value="<?php echo $ctlist->id; ?>"><?php echo $ctlist->city_name; ?></option>

                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="all-button">
                                                <a class="btn btn-default" href="#">
                                                    <button type="submit">Go</button>
                                                </a>
                                            </div>
                                        </form>

                                    </div>									
                                </div>
                            </div><!-- End /.search-filter -->
                        </div><!-- /.search-widget -->






                        <div class="widget search-widget">
                            <form action="<?php echo base_url("Event_Management/search"); ?>" method="post">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                        </div><!-- /.search-widget -->




                        <div class="collapse-filter-widget  collapse-widget">
                            <button class="btn collapse-btn  hidden-sm hidden-lg hidden-md" type="button" data-toggle="collapse" data-target="#collapse-filter-widget" aria-expanded="false" aria-controls="collapse-filter-widget">
                                <ul class="list-inline">
                                    <li><span class="glyphicon glyphicon-plus"></span></li>
                                    <li><h4 class="widget-title">Filter</h4></li>
                                </ul>
                            </button>



                            <div class="collapse" id="collapse-filter-widget">
                                <div class="widget filter-widget">
                                    <h4 class="widget-title">Filter</h4>



                                    <div class="search-filter">




                                        <form action="<?php echo base_url("Event_Management/filter"); ?>" method="get">
                                            <div class="text-right">

                                                <div class="Purpose filter">
                                                    <select name="purpose">
                                                        <option disabled selected>Event Purpose</option>


                                                        <?php
                                                        foreach ($allEventPurposeList as $purposelist)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $purposelist->id; ?>"><?php echo $purposelist->purpose_type; ?></option>

                                                            <?php
                                                        }
                                                        ?>



                                                    </select>
                                                </div>




                                                <div class="all-event filter">
                                                    <select name="category">
                                                        <option disabled selected>Event Types</option>



                                                        <?php
                                                        foreach ($allCategoryList as $catlist)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $catlist->id; ?>"><?php echo $catlist->category_name; ?></option>

                                                            <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>




                                                <div class="all-countries filter">
                                                    <select name="venue">
                                                        <option disabled selected>Venue Type</option>


                                                        <?php
                                                        foreach ($allVenueList as $venuelist)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $venuelist->id; ?>"><?php echo $venuelist->venue_type; ?></option>

                                                            <?php
                                                        }
                                                        ?>



                                                    </select>
                                                </div>



                                                <div class="all-date filter">
                                                    <select id="all-event" name="price">
                                                        <option disabled selected>Purchase Types</option>
                                                        <option value="1">Paid</option>
                                                        <option value="2">Free</option>
                                                    </select>
                                                </div>
                                                <div class="all-button">
                                                    <a class="btn btn-default" href="#">
                                                        <button type="submit">Go</button>
                                                    </a>
                                                </div>


                                                <div class="reset text-center">
                                                    <button type="reset">Reset</button>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                </div><!-- /.search-widget -->
                            </div><!-- /#collapse-filter-widget -->
                        </div><!-- /.collapse-filter-widget -->
                    </div>
                </div> <!-- /.left-sidebar -->			
            </div><!-- /.col-md-3 -->
            <div class="col-md-6 col-sm-6 col-lg-6">
                <!-- ++++++++++++++++++++ Start all-events ++++++++++++++++++++ -->
                <div class="all-events">
                    <h4>Tropics</h4>
                    <div class="row">

                        <div id="wrapper">


                            <div class="wall"> 


                                <?php
                                $count = 0;
                                if ($allEventList)
                                {
                                    foreach ($allEventList as $list)
                                    {
                                        if ($list->activation == 1 && $list->editActivation == 1 && $list->activeorinactive == 1)
                                        {
                                            ?>
                                                <div class="wall-item">
                                                    <span class="event-dtt">
                                                        <?php
                                                        $d = new DateTime($list->startDate);

                                                        $timestamp = $d->getTimestamp(); // Unix timestamp
                                                        $formatted_date = $d->format('M d, Y'); // 2003-10-16

                                                        echo "Start from : " . $formatted_date;
                                                        ?>
                                                    </span>
                                                    <img src="<?php echo base_url("public/eventImagesForHome/event_" . $list->id . "." . $list->picture); ?>">
                                                    <a href="<?php echo base_url("Event_Management/showEventDetail/" . $list->id); ?>"><p><?php echo $list->title ?></p></a>
                                                    <span class="event-cat">
                                                        <?php
                                                        foreach ($allCategoryList as $catlist)
                                                        {
                                                            if ($catlist->id == $list->categoryid)
                                                            {
                                                                echo $catlist->category_name;
                                                            }
                                                        }
                                                        ?> 
                                                        ,
                                                        <?php
                                                        foreach ($allVenueList as $venuelist)
                                                        {
                                                            if ($venuelist->id == $list->venueid)
                                                            {
                                                                echo $venuelist->venue_type;
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                </div>

                                            <?php
                                            $count++;
                                            if ($count == 9)
                                            {
                                                break;
                                            }
                                        }
                                    }
                                    $count = 0;
                                }
//                        else
//                        {
//                            for ($i = 0; $i < 6; $i++)
//                            {
                                ?>

                            </div>
                        </div>
                    </div><!-- End /.row -->
                    <div class="event-by-category">
                        <div class="row">
                            <button type="button" class="btn btn-success center-block">Load More <i class="fa fa-refresh fa-spin" style="font-size:14px"></i></button>
                        </div>
                    </div>
                    <br><br>




                </div><!-- End /.all-events -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-3 col-sm-3 col-lg-3">
                <!-- ++++++++++++++++++++ Start right-sidebar ++++++++++++++++++++ -->
                <div class="right-sidebar">
                    <div class="widget ad top-ad">
                        <a href="<?php echo base_url(); ?>public/frontEndDesign/#"><img src="<?php echo base_url(); ?>public/frontEndDesign/images/right-middle-ad.jpg" alt="advertisement" class="img-responsive"></a>
                    </div>
                    <div class="widget facebook-widget">
                        <h4 class="widget-title">Facebook</h4>
                        <iframe id="add" src="<?php echo base_url(); ?>public/frontEndDesign/https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftechnocrews&tabs=timeline&width=280&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="280" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    </div>
                </div><!-- /.right-sidebar -->
            </div><!-- /.col-md-3 -->	
        </div><!-- End /.row -->
    </div><!-- /.container-fluid -->
</section><!-- End #page-main-content -->

<!-- ++++++++++++++++++++ Start footer Section ++++++++++++++++++++ -->