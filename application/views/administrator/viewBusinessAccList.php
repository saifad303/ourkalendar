<!-- Header-->

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
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Business Account Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Database ID</th>
                                    <th>Company Title</th>
                                    <th>Email</th>
                                    <th>Company Type</th>
                                    <th>Status</th>
                                    <th>Joining Date</th>
                                    <th>View Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($businessList as $list)
                                {
                                    ?> 
                                    <tr>
                                        <td><?php echo $list->id; ?></td>
                                        <td><?php echo $list->business_title; ?></td>
                                        <td><?php echo $list->email; ?></td>
                                        <td>
                                            <?php
                                            if ($list->bustypeid == 6)
                                            {
                                                echo 'Not fit yet';
                                            }
                                            else
                                            {
                                                foreach ($subtypeList as $sublist)
                                                {
                                                    if ($list->bustypeid == $sublist->btid)
                                                    {
                                                        echo $sublist->btname;
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ((!$list->status))
                                            {
                                                echo 'Verified';
                                            }
                                            else
                                            {
                                                echo 'Not verified';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $list->joinDate; ?></td>
                                        <td><a href="<?php echo base_url() . "administrator/BusinessAccInfo_Management/viewProfileDetail/" . $list->id; ?>"><button type="button" class="btn btn-success">View Profile</button></a></td>





                                        <?php
                                        if ($list->activeorinactive == 1)
                                        {
                                            ?>
                                            <td><a href="<?php echo base_url() . "administrator/BusinessAccInfo_Management/bussinessInactive/" . $list->id; ?>"><button type="button" class="btn btn-danger">Inactive</button></a></td>

                                            <?php
                                        }
                                        else
                                        {
                                            ?>

                                            <td><a href="<?php echo base_url() . "administrator/BusinessAccInfo_Management/bussinessActive/" . $list->id; ?>"><button type="button" class="btn btn-info">Active</button></a></td>

                                            <?php
                                        }
                                        ?>


                                    </tr>

                                    <?php
                                }
                                ?>

                            </tbody>
                            <?php echo $this->pagination->create_links(); ?>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
    <?php
//    echo '<pre>';
//    print_r($subtypeList);
//    echo '</pre>';
//echo '<pre>';
//print_r($businessList);
//echo '</pre>';
    ?>
</div>