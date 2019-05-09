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
                        <strong class="card-title">Country List</strong><br>
                        <?php echo $this->session->userdata('msg');
                        $this->session->unset_userdata('msg') ?>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Type Names</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($typeList as $types)
                                {
                                    if ($types->id != 6)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $types->type_name; ?></td>
                                            <td><a href="<?php echo base_url() . "administrator/BusinessType_Management/editTypeData/" . $types->id; ?>"><button type="button" class="btn btn-info">Edit</button></a></td>
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
</div>