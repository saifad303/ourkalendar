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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"><br/><?php
                            echo $this->session->userdata('msg');
                            $this->session->unset_userdata('msg')
                            ?></strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">

                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center">City Insert</h3>
                                </div>
                                <hr>


                                <form action="<?php echo base_url(); ?>administrator/CityInfo_Management/insert" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <input id="cc-pament" name="city" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                        <?php echo form_error('city', "<p style='color:red'>", "</p>"); ?>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-9">
                                            <select name="countryid" id="select" class="form-control">
                                                <option value="">From which country</option>
                                                <?php
                                                foreach ($countryList as $cntdt)
                                                {
                                                    if ($cntdt->id != 16)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $cntdt->id; ?>"><?php echo $cntdt->country_name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <?php echo form_error('countryid', "<p style='color:red'>", "</p>"); ?>
                                        </div>
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Submit</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                </form>



                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->

            </div><!--/.col-->




        </div>
        <?php
//echo '<pre>';
//print_r($countryList);
//echo '</pre>';
        ?>

    </div><!-- .animated -->
</div>