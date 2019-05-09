<?php
foreach ($eventDetail as $detail)
{
    ?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Admin Panel</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="ui-typography">
                <div class="row">
                    <div class="col-md-12">


                        <div class="card">
                            <div class="card-header">
                                <h3><strong><?php echo $detail->title; ?></strong></h3>
                                <h5>Event Category : <?php
                                    foreach ($categoryList as $list)
                                    {
                                        if ($detail->categoryid == $list->id)
                                        {
                                            echo $list->category_name;
                                        }
                                    }
                                    ?></h5>
                                <br>

                                    <a href="<?php echo base_url() . "Event_Management/adminEventEditFromEditList/" . $detail->id; ?>"><button type="button" class="btn btn-info">Edit Event Info</button></a>
                                    <a href="<?php echo base_url() . "Event_Management/editEventActivation/" . $detail->id; ?>"><button type="button" class="btn btn-success">Approve</button></a>
                                            <a href="<?php echo base_url() . "Event_Management/editEventDelete/" . $detail->id; ?>"><button type="button" class="btn btn-danger">Delete post</button></a>

                                    
                                <div class="card-body">

                                    <hr>

                                    <div class="typo-headers">

                                        <h5 class="pb-2 display-5">Event Description</h5>
                                    </div>
                                    <div class="typo-articles">
                                        <p><?php echo $detail->description; ?></p>
                                    </div>



                                    <hr>


                                    <div class="col-md-6">

                                        <div class="jumbotron">
                                            <h4 class="mb-3"><strong>Address Line1</strong></h4>
                                            <hr>
                                            <?php echo $detail->eventLocationL1; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="jumbotron">
                                            <h4 class="mb-3"><strong>Address Line1</strong></h4>
                                            <hr>
                                            <?php echo $detail->eventLocationL2; ?>
                                        </div>
                                    </div>





                                    <div class="content mt-3">
                                        <div class="animated fadeIn">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong class="card-title">Event Date and Time</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Start Date</th>
                                                                        <th>End Date</th>
                                                                        <th>Start Time</th>
                                                                        <th>End Time</th>
                                                                        <th>Post Date</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?php echo $detail->startDate; ?></td>
                                                                        <td><?php echo $detail->endDate; ?></td>
                                                                        <td><?php echo $detail->startTime; ?></td>
                                                                        <td><?php echo $detail->endTime; ?></td>
                                                                        <td><?php echo $detail->postDate; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div><!-- .animated -->
                                    </div>




                                </div>
                            </div>


                        </div>
                    </div>
                </div>



            </div><!-- .animated -->
            <?php
//        echo '<pre>';
//        print_r($eventDetail);
//        echo '</pre>';
            ?>
        </div>

        <?php
    }
    ?>