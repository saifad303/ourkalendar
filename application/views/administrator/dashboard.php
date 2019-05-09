
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">

                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">

    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>


    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Visitors online</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">Event: 
                        <?php
                        $count = 0;
                        foreach ($allEventList as $list)
                        {
                            $count++;
                        }

                        echo $count;
                        ?> 
                    </span>
                </h4>
                <h4 class="mb-0">
                    <span class="count">User: <?php
                        $count = 0;
                        foreach ($allUserList as $list)
                        {
                            $count++;
                        }

                        echo $count;
                        ?>  </span>
                </h4>
                <h4 class="mb-0">
                    <span class="count">Business: 
                        <?php
                        $count = 0;
                        foreach ($allUserList as $list)
                        {
                            $count++;
                        }

                        echo $count;
                        ?>
                    </span>
                </h4>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">
                        <?php
                        $count = 0;

                        $date = date("Y-m-d");
                        foreach ($allEventList as $list)
                        {
                            if ($list->startDate > $date)
                            {
                                $count++;
                            }
                        }

                        echo $count;
                        ?>
                    </span>
                </h4>
                <p class="text-light">Upcoming Events</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="social-box facebook">
            <i class="fa fa-facebook"></i>

        </div>
        <!--/social-box-->
    </div><!--/.col-->
    <!--/.col-->



    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="card-title mb-0">Traffic</h4>
                        <div class="small text-muted">October 2017</div>
                    </div>
                    <!--/.col-->
                    <div class="col-sm-8 hidden-sm-down">
                        <button type="button" class="btn btn-primary float-right bg-flat-color-1"><i class="fa fa-cloud-download"></i></button>
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-3" data-toggle="buttons" aria-label="First group">
                                <label class="btn btn-outline-secondary">
                                    <input type="radio" name="options" id="option1"> Day
                                </label>
                                <label class="btn btn-outline-secondary active">
                                    <input type="radio" name="options" id="option2" checked=""> Month
                                </label>
                                <label class="btn btn-outline-secondary">
                                    <input type="radio" name="options" id="option3"> Year
                                </label>
                            </div>
                        </div>
                    </div><!--/.col-->


                </div><!--/.row-->
                <div class="chart-wrapper mt-4" >
                    <canvas id="trafficChart" style="height:200px;" height="200"></canvas>
                </div>

            </div>
            <div class="card-footer">
                <ul>
                    <li>
                        <div class="text-muted">Visits</div>
                        <strong>29.703 Users (40%)</strong>
                        <div class="progress progress-xs mt-2" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="hidden-sm-down">
                        <div class="text-muted">Unique</div>
                        <strong>24.093 Users (20%)</strong>
                        <div class="progress progress-xs mt-2" style="height: 5px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li>
                        <div class="text-muted">Pageviews</div>
                        <strong>78.706 Views (60%)</strong>
                        <div class="progress progress-xs mt-2" style="height: 5px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="hidden-sm-down">
                        <div class="text-muted">New Users</div>
                        <strong>22.123 Users (80%)</strong>
                        <div class="progress progress-xs mt-2" style="height: 5px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="hidden-sm-down">
                        <div class="text-muted">Bounce Rate</div>
                        <strong>40.15%</strong>
                        <div class="progress progress-xs mt-2" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>











    <div class="col-xl-6">
        <div class="card" >
            <div class="card-header">
                <h4>Pending event list</h4>
            </div>
            <div class="Vector-map-js">
                <div class="content mt-3">
                    <div class="animated fadeIn">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title"></strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Activation</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                foreach ($allEventList as $list)
                                                {
                                                    if ($list->activation == 0)
                                                    {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $list->title; ?></td>
                                                            <td><a href="<?php echo base_url() . "Event_Management/eventActivationDashboard/" . $list->id; ?>"><button type="button" class="btn btn-success">Approve</button></a></td>
                                                            <td><a href="<?php echo base_url() . "Event_Management/eventDeleteDashboard/" . $list->id; ?>"><button type="button" class="btn btn-danger">Delete post</button></a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                            <?php // echo $this->pagination->create_links(); ?>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div><!-- .animated -->

                    <?php
//    echo '<pre>';
//    print_r($pendingEventList);
//    echo '<pre>';
//    
//    echo '<pre>';
//    print_r($allCategoryList);
//    echo '<pre>';
                    ?>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>


</div>

