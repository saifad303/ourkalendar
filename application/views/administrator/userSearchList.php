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
                        <strong class="card-title">User Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Database ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>View Details</th>
                                    <th>Active/Inactive</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($usearchResult as $list)
                                {
                                    if($list->id != 10)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $list->id; ?></td>
                                            <td><?php echo $list->name; ?></td>
                                            <td><?php echo $list->email; ?></td>
                                            <td><a href="<?php echo base_url() . "administrator/UserInfo_Management/viewProfileDetail/" . $list->id; ?>"><button type="button" class="btn btn-success">View Profile</button></a></td>

                                            <?php
                                            if ($list->activeorinactive == 0)
                                            {
                                                ?>
                                                <td><a href="<?php echo base_url() . "administrator/UserInfo_Management/userActivation/" . $list->id; ?>"><button type="button" class="btn btn-success">Active</button></a></td>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>

                                                <td><a href="<?php echo base_url() . "administrator/UserInfo_Management/userInactivation/" . $list->id; ?>"><button type="button" class="btn btn-danger">Inactive</button></a></td>
                                                <?php
                                            }
                                            ?>
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
        </div>
    </div><!-- .animated -->

    <?php
//    echo '<pre>';
//    print_r($userList);
//    echo '<pre>';
    ?>
</div>