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

                    <div class="left-sidebar">
                        <div class="lss">



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





                    </div>

                </div><!-- End /.col-md-3 -->

                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="search-result-header">
                        <ul class="list-inline list-unstyled">
                            <li><h4>Event list</h4></li>

                        </ul>
                    </div><!-- End /.search-result-header -->


                    <?php
                    if ($calenderResult)
                    {
                        foreach ($calenderResult as $list)
                        {
                            if ($list->activation == 1 && $list->editActivation == 1 && $list->activeorinactive == 1)
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
                            else
                            {
                                echo '<div class="search-result">';
                                echo '<div class="row">';
                                echo '<div class="col-md-2">';
                                echo '<time datetime="18:30"></time>';
                                echo '</div>';
                                echo '<div class="col-md-10">';
                                echo '<div>';
                                echo '<h4>No result found.</h4>';
                                echo '</div>';
                                echo '<p></p>';
                                echo '</div>';
                                echo '</div><!-- End /.row -->';
                                echo '</div>';
                            }
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
                                    <div>
                                        <h4>No result found.</h4>
                                    </div>
                                    <p></p>
                                </div>
                            </div><!-- End /.row -->
                        </div>

                        <?php
                    }
                    ?>


                    <div class="page">

                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                    <br>


                    <!--Pagination -->





                </div><!-- End /.col-md-6 -->



                <?php echo $calender; ?>



            </div><!-- End /.row -->
        </div><!-- End /.container-fluid -->
    </div><!-- End /.browse-padding -->
</section><!-- End #page-main-content -->







<?php
//echo '<pre>';
//print_r($result);
//echo '</pre>';
//?>