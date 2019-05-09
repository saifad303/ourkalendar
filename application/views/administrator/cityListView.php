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
                        <strong class="card-title">Country List<br></strong>
                        <?php
                        echo $this->session->userdata('msg');
                        $this->session->unset_userdata('msg')
                        ?>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>City Names</th>
                                    <th>Country Names</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($cityList as $ctlist)
                                {
                                    if($ctlist->id != 7)
                                    {
                                    ?>
                                    <tr>
                                        <td><?php echo $ctlist->city_name; ?></td>
                                        <td><?php echo $ctlist->cntname; ?></td>
                                        <td><a href="<?php echo base_url() . "administrator/CityInfo_Management/editCityData/" . $ctlist->id; ?>"><button type="button" class="btn btn-info">Update</button></a></td>
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
//            echo '<pre>';
//            print_r($cityList);
//            echo '</pre>';
    ?>
</div>