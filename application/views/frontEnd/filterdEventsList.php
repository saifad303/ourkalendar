<?php
$count = 0;
if (isset($filterdEvents))
{
    foreach ($filterdEvents as $list)
    {
        $count++;
    }
}
?>
<style>
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        z-index: 3;
        color: black;
        cursor: default;
        background-color: yellow;
        border-color: yellow;
    }

    .pagination>li>a, .pagination>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: black;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    .page {
        text-align: center;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        margin: 0 4px;
    }
</style>

<section id="page-main-content">
    <div class="browse-padding">
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
                                <h4 class="widget-title">Search</h4>
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                        
                        
                        <!-- /.search-widget -->




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
                                                    <a class="btn btn-default go-btn" type="submit">
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


                    


                </div> <!-- /.left-sidebar --> <!-- /.left-sidebar -->	









            </div><!-- /.col-md-3 -->


                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="search-result-header">
                        <ul class="list-inline list-unstyled">
                            <li><h4>Event list</h4></li>
                            <li class="pull-right sort">
                                <label for="sort">Sort by</label>
                                <select name="sort" id="sort">
                                    <option value="next">Upcoming</option>
                                    <option value="prev">Previous</option>
                                </select>
                            </li>
                        </ul>
                    </div><!-- End /.search-result-header -->


                    <?php
                    if ($count)
                    {
                        foreach ($filterdEvents as $list)
                        {
                            ?>
                            <div class="search-result">
                                <div class="row">
                                    <div class="col-md-2">
                                        <time datetime="18:30"><?php
                                            echo date("g:i a", strtotime($list->startTime));
                                            ?></time>
                                    </div>
                                    <div class="col-md-10">
                                        <address>
                                            <?php
                                            foreach ($allCityList as $ctlist)
                                            {
                                                if ($ctlist->id == $list->cityid)
                                                {
                                                    echo $ctlist->city_name;

                                                    foreach ($allCountryList as $cntlist)
                                                    {
                                                        if ($cntlist->id == $ctlist->countryid)
                                                        {
                                                            $countryName = $cntlist->country_name;
                                                        }
                                                    }
                                                }
                                            }
                                            ?>

                                            , 


                                            <?php
                                            echo $countryName;
                                            ?>.
                                        </address>
                                        <div>
                                            <h4>
                                                <?php
                                                $d = new DateTime($list->startDate);

                                                $timestamp = $d->getTimestamp(); // Unix timestamp
                                                $formatted_date = $d->format('M d, Y'); // 2003-10-16

                                                echo "Start from : " . $formatted_date;
                                                ?>
                                            </h4>
                                        </div>
                                        <a href="<?php echo base_url() . "Event_Management/showEventDetail/" . $list->id; ?>"><h3 style="color:black;"><?php echo $list->title; ?></h3></a>
                                        <p><?php echo $list->totalSubcriber; ?> people going</p>
                                    </div>
                                </div><!-- End /.row -->
                            </div><!-- End /.search-result -->



                            <?php
                        }
                    }
                    else
                    {
                        ?>

                        <div class="search-result">
                            <div class="row">
                                <div class="col-md-2">
                                    <time datetime="18:30"></time>
                                </div>
                                <div class="col-md-10">
                                    <address></address>
                                    <div>
                                        <h4></h4>
                                    </div>
                                    <h3 style="color:black;"><?php echo "No filter result"; ?></h3>

                                </div>
                            </div><!-- End /.row -->
                        </div><!-- End /.search-result -->

                        <?php
                    }
                    ?>


                    <div class="page">

                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                    <br>


                </div><!-- End /.col-md-6 -->






                <?php echo $calender; ?>




                <!-- End /.col-md-3 -->
            </div><!-- End /.row -->


        </div><!-- End /.container-fluid -->
    </div><!-- End /.browse-padding -->
</section><!-- End #page-main-content -->


<?php
//echo '<pre>';
//print_r($filterdEvents);
//echo '</pre>';
//for ($i = 0; $i < $count; $i++)
//{
//    foreach ($filterdEvents[$i] as $list)
//    {
//        echo $list->id;
//    }
//}
?>