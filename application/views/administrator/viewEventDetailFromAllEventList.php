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

                                <?php
                                if ($detail->user_type == 'u')
                                {
                                    foreach ($allUserList as $ulist)
                                    {
                                        if ($ulist->id == $detail->userid)
                                        {
                                            ?>
                                            <h6>Author:<span> <?php echo $ulist->name; ?></span></h6>
                                            <h6>Email:<span> <?php echo $ulist->email; ?></span></h6>
                                            <a href="<?php echo base_url("administrator/UserInfo_Management/viewProfileDetail/" . $detail->userid); ?>">
                                                <button type="button" class="btn btn-primary btn-sm">Author detail</button>
                                            </a>
                                            <?php
                                        }
                                    }
                                }
                                ?>

                                <?php
                                if ($detail->user_type == 'b')
                                {
                                    foreach ($allBusinessList as $blist)
                                    {
                                        if ($blist->id == $detail->businessid)
                                        {
                                            ?>
                                            <h6>Author:<span> <?php echo $blist->business_title; ?></span></h6>
                                            <h6>Email:<span> <?php echo $blist->email; ?></span></h6>
                                            <br>
                                            <a href="<?php echo base_url("administrator/BusinessAccInfo_Management/viewProfileDetail/" . $detail->businessid); ?>">
                                                <button type="button" class="btn btn-primary btn-sm">Author detail</button>
                                            </a>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                <br><br><br>

                                <a href="<?php echo base_url() . "Event_Management/eventEditFromAllEventlist/" . $detail->id; ?>"><button type="button" class="btn btn-info">Edit Event Info</button></a>

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
                                                                        <th>Picture</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?php echo $detail->startDate; ?></td>
                                                                        <td><?php echo $detail->endDate; ?></td>
                                                                        <td><?php echo $detail->startTime; ?></td>
                                                                        <td><?php echo $detail->endTime; ?></td>
                                                                        <td><?php echo $detail->postDate; ?></td>
                                                                        <td><button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal">
                                                                                Show
                                                                            </button></td>
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

        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Full view</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">

                        <img src="<?php echo base_url() . "public/eventImages/event_" . $detail->id . "." . $detail->picture; ?>">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
    ?>



