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
                        <strong class="card-title">Report list</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Headline</th>
                                    <th>Report Detail</th>
                                    <th>Delete report</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($allReportList as $list)
                                {
                                    foreach ($allEventList as $evList)
                                    {
                                        if ($evList->id == $list->event_id)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $evList->title; ?></td>

                                                <td><a href="<?php echo base_url() . "Event_Management/reportDetail/" . $list->event_id . "/" . $list->id; ?>"><button type="button" class="btn btn-info">Detail View</button></a>

                                                    <?php
                                                    if ($list->show == 1)
                                                    {
                                                        ?>
                                                        <span class="badge badge-pill badge-success">Seen</span>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>

                                                        <span class="badge badge-pill badge-danger">Unseen</span>

                                                        <?php
                                                    }
                                                    ?>

                                                </td>
                                                
                                                <td><a href="<?php echo base_url() . "Event_Management/reportDelete/" . $list->id; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>

                                            </tr>
                                            <?php
                                        }
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
//    print_r($pendingEventList);
//    echo '<pre>';
//    
//    echo '<pre>';
//    print_r($allCategoryList);
//    echo '<pre>';
    ?>
</div>