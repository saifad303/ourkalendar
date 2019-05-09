<!-- Header-->

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
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Map</a></li>
                    <li class="active">Gmap</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-6">


                <?php
                foreach ($userDataById as $profiledt)
                {
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>User profile card</h4>
                        </div>
                        <section class="card">
                            <div class="card-header user-header alt bg-dark">
                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url(); ?>public/administratorDesign/images/admin.jpg">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-light display-6"><?php echo $profiledt->name; ?></h2>
                                        <p><?php
                                            if ($profiledt->type == 'a')
                                            {
                                                echo 'Admin';
                                            }
                                            else
                                            {
                                                echo 'User';
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-envelope-o"></i> Mail Inbox <span class="badge badge-primary pull-right">10</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-tasks"></i> Recent Activity <span class="badge badge-danger pull-right">15</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-bell-o"></i> Notification <span class="badge badge-success pull-right">11</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-comments-o"></i> Message <span class="badge badge-warning pull-right r-activity">03</span></a>
                                </li>
                            </ul>

                        </section>
                    </div>

                    <?php
                }
                ?>

                <br>
                <!-- /# card -->
            </div>
            <!-- /# column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Events</h4>
                    </div>
                    <div class="card-body">
                        <div id="map-2" class="map"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Geometry overlays</h4>
                    </div>
                    <div class="card-body">
                        <div class="map" id="map-3"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Elevation locations</h4>
                    </div>
                    <div class="card-body">
                        <div id="map-4" class="map"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Geolocation</h4>
                    </div>
                    <div class="card-body">
                        <div class="map" id="map-5"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>KML layers</h4>
                    </div>
                    <div class="card-body">
                        <div id="map-6" class="map"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Layers</h4>
                    </div>
                    <div class="card-body">
                        <div class="map" id="map-7"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Map events</h4>
                    </div>
                    <div class="card-body">
                        <div class="map" id="map-8"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
        <!-- /# row -->




    </div><!-- .animated -->
</div>