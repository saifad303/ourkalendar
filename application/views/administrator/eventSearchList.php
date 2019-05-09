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
                        <strong class="card-title">All event data table</strong>
                        <br>
                        <?php
                        echo $this->session->userdata('msg');
                        $this->session->unset_userdata('msg')
                        ?>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Posted by</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Post Date</th>
                                    <th>View Detail</th>
                                    <th>Active/Inactive</th>
                                    <th>Delete Post</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($esearchResult as $list)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $list->title; ?></td>
                                        <td>
                                            <?php
                                            if ($list->user_type == 'u')
                                            {
                                                echo 'User';
                                            }
                                            else if ($list->user_type == 'b')
                                            {
                                                echo 'Business';
                                            }
                                            else
                                            {
                                                echo 'Admin';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $list->startDate; ?></td>
                                        <td><?php echo $list->endDate; ?></td>
                                        <td><?php echo $list->postDate; ?></td>
                                        <td><a href="<?php echo base_url() . "Event_Management/viewEventFromAllEventList/" . $list->id; ?>"><button type="button" class="btn btn-info">View Detail</button></a></td>
                                        <td align="center">

                                            <?php
                                            if ($list->activeorinactive == 0)
                                            {
                                                ?>

                                                <a href="<?php echo base_url() . "Event_Management/evntActivationAllEvent/" . $list->id; ?>"><button type="button" class="btn btn-info">Active</button></a>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <a href="<?php echo base_url() . "Event_Management/evntInactiveAllEvent/" . $list->id; ?>"><button type="button" class="btn btn-danger">Inactive</button></a>

                                                <?php
                                            }
                                            ?>




                                        </td>
                                        <td align="center"><a href="<?php echo base_url() . "Event_Management/evntDeleteAllEvent/" . $list->id; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>

                                        <?php
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