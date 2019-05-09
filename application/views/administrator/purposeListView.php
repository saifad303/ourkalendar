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
                        <strong class="card-title">Purpose type list</strong><br>
                        <?php echo $this->session->userdata('msg'); $this->session->unset_userdata('msg')  ?>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Purposes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($purposeList as $pdt)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $pdt->purpose_type; ?></td>
                                        <td><a href="<?php echo base_url()."administrator/EventPurpose_Management/editPurposeData/".$pdt->id; ?>"><button type="button" class="btn btn-info">Edit</button></a></td>
                                    </tr>
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
//            echo '<pre>';
//            print_r($purposeList);
//            echo '</pre>';
    ?>
</div>