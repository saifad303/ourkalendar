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
                        <strong class="card-title">Pending event list</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>User Type</th>
                                    <th>Category</th>
                                    <th>View Details</th>
                                    <th>Activation</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($pendingEventList as $list)
                                {
                                    if ($list->activation == 0)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $list->title; ?></td>
                                            <td><?php
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
                                                ?></td>
                                            <td>
                                                <?php
                                                foreach ($allCategoryList as $catlist)
                                                {
                                                    if ($catlist->id == $list->categoryid)
                                                    {
                                                        echo $catlist->category_name;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><a href="<?php echo base_url() . "Event_Management/eventDetailInfoFromAdmin/" . $list->id; ?>"><button type="button" class="btn btn-info">Detail view</button></a></td>
                                            <td><a href="<?php echo base_url() . "Event_Management/eventActivation/" . $list->id; ?>"><button type="button" class="btn btn-success">Approve</button></a></td>
                                            <td><a href="<?php echo base_url() . "Event_Management/eventDelete/" . $list->id; ?>"><button type="button" class="btn btn-danger">Delete post</button></a></td>
                                        </tr>
                                        <?php
                                    }
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
//    print_r($pendingEventList);
//    echo '<pre>';
//    
//    echo '<pre>';
//    print_r($allCategoryList);
//    echo '<pre>';
    ?>
</div>