<?php
foreach ($eventDetail as $detail)
{
    ?>
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php echo $detail->title; ?></h2>   
                    <h5>Event Category : 
                        <?php
                        foreach ($categoryList as $list)
                        {
                            if($detail->categoryid == $list->id)
                            {
                                echo $list->category_name;
                            }
                        }
                        ?>
                    </h5>
                    <a href="<?php echo base_url()."Event_Management/eventEdit/".$detail->id; ?>"><button type="button" class="btn btn-danger">Edit post</button></a>
                </div>
                
                
            </div>
            <!-- /. ROW  -->
            <hr />


            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">








                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Event Description</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                    <div class="panel-body">
                                        <?php echo $detail->description; ?>
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                
                                
                                
                                <div class="col-md-4 col-sm-4">
                                    <div class="well well-sm">
                                        <h4>Address line 1</h4>
                                        <p><?php echo $detail->eventLocationL1; ?>.</p>
                                    </div>
                                </div>


                                <div class="col-md-4 col-sm-4">
                                    <div class="well well-sm">
                                        <h4>Address line 1</h4>
                                        <p><?php echo $detail->eventLocationL2; ?>.</p>
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Advanced Tables -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Event date and time
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                                        <tr class="gradeU">
                                                            <td><?php echo $detail->startDate; ?></td>
                                                            <td><?php echo $detail->endDate; ?></td>
                                                            <td><?php echo $detail->startTime; ?></td>
                                                            <td class="center"><?php echo $detail->endTime; ?></td>
                                                            <td class="center"><?php echo $detail->postDate; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <!--End Advanced Tables -->
                                </div>
                            </div>












                            <div class="panel panel-default">
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>
            </div>
            <!-- /. ROW  -->

            <!-- /. ROW  -->

        </div>

    <?php
//    echo '<pre>';
//    print_r($eventDetail);
//    echo '</pre>';
    ?>
        <!-- /. PAGE INNER  -->
    </div>

    <?php
}
?>