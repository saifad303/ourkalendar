<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>All My Events</h2>   
                <h5><?php
                    echo $this->session->userdata('msg');
                    $this->session->unset_userdata('msg')
                    ?></h5>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr />



        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        My Event List
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Authentication Info</th>
                                        <th>View Detail</th>
                                        <th>Delete Event</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($myEvents as $eventlist)
                                    {
                                        if ($eventlist->userid == $userid || $eventlist->businessid == $userid)
                                        {
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $eventlist->title; ?></td>
                                                <td>
                                                    <?php
                                                    foreach ($categoryList as $catlist)
                                                    {
                                                        if ($eventlist->categoryid == $catlist->id)
                                                        {
                                                            echo $catlist->category_name;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php
                                                    if ($eventlist->activation == 1 && $eventlist->editActivation == 1)
                                                    {
                                                        echo 'Activated';
                                                    }
                                                    else
                                                    {
                                                        echo 'Not Activated yet';
                                                    }
                                                    ?></td>
                                                <td class="center"><a href="<?php echo base_url() . "Event_Management/eventDetail/" . $eventlist->id; ?>"><button type="button" class="btn btn-info">View Detail</button></a></td>
                                                <td class="center"><a href="<?php echo base_url() . "Event_Management/eventDeleteByUser/" . $eventlist->id . "/" . $this->session->userdata("myid"); ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                            </tr>

                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        <!-- /. ROW  -->

    </div>
    <!-- /. ROW  -->
</div>

<?php
//echo '<pre>';
//print_r($myEvents);
//echo '</pre>';
?>

