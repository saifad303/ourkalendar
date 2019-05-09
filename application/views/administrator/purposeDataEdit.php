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
                        <strong class="card-title"></strong>
                    </div>
                    <div class="card-body">

                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">

                                <div class="card-title">
                                    <h3 class="text-center">Purpose Data Edit</h3>
                                </div>
                                <hr>
                                <form action="<?php echo base_url(); ?>administrator/EventPurpose_Management/update" method="post" novalidate="novalidate">
                                    <?php
                                    foreach ($purposeDataById as $pdt)
                                    {
                                        ?>
                                        <div class="form-group">
                                            <input id="cc-pament" name="purpose" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $pdt->purpose_type; ?>">
                                            <input id="cc-pament" name="purposeid" type="hidden" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $pdt->id; ?>">
                                        <?php echo form_error('category', "<p style='color:red'>", "</p>"); ?>
                                        </div>
                                        <?php
                                    }
                                    ?>

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

            <?php
//             echo '<pre>';
//             print_r($countryDataById);
//             echo '</pre>';
            ?>


        </div>


    </div><!-- .animated -->
</div>