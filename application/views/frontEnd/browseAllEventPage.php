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

    .search-filter {
        padding: 20px 13px 31px;
        margin-top: 53px;
    }
</style>

<section id="page-main-content">
    <div class="browse-padding">
        <div id="catch-another-container" class="container-fluid">
            <div class="row">







                <div class="col-md-3 col-sm-3 col-lg-3">

                    <div class="widget search-widget">
                        <!--<h4 class="widget-title">Search</h4>-->
                        <!--                                                <div class="input-group">
                                                                            <input type="text" class="form-control" placeholder="Search for...">
                                                                            <span class="input-group-btn">
                                                                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                                                            </span>
                                                                        </div> /input-group -->
                        <div class="search-filter">
                            <form action="<?php echo base_url("Event_Management/browseAllEvents"); ?>" method="get">
                                <h4>City</h4>



                                <div class="text-right">

                                    <div class="all-event">
                                        <select name="cityid">
                                            <option value="0" disabled selected>Select city</option>



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
                                    </div>


                                    <!--                                    <div class="all-button">
                                                                            <button type="submit"><a class="btn btn-default go-btn" type="submit">Go</a></button>
                                                                        </div>-->
                                    <div class="all-button">
                                        <button type="submit"><a class="btn btn-default go-btn" type="submit">Go</a></button>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>



                    <?php echo $filter; ?>



                </div><!-- End /.col-md-3 -->


                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="search-result-header">
                        <ul class="list-inline list-unstyled">
                            <li><h4>Event list</h4></li>

                        </ul>
                    </div><!-- End /.search-result-header -->


                    <?php
                    foreach ($result as $list)
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
                                            }
                                        }
                                        ?>

                                        , 


                                        <?php
                                        foreach ($allCountryList as $cntlist)
                                        {
                                            if ($cntlist->id == $list->countryid)
                                            {
                                                echo $cntlist->country_name;
                                            }
                                        }
                                        ?>.
                                    </address>
                                    <a href="<?php echo base_url() . "Event_Management/showEventDetail/" . $list->id; ?>"><h3 style="color:black;"><?php echo $list->title; ?><span> <?php echo $list->id; ?></span></h3></a>
                                    <div>
                                        <h5>
                                            <?php
                                            $d = new DateTime($list->startDate);

                                            $timestamp = $d->getTimestamp(); // Unix timestamp
                                            $formatted_date = $d->format('M d, Y'); // 2003-10-16

                                            echo "Start from : " . $formatted_date;
                                            ?>
                                        </h5>
                                    </div>
                                    <p><?php echo $list->totalSubcriber; ?> people going</p>
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