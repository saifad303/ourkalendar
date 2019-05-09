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
                        <strong class="card-title"><?php echo $this->session->userdata('msg'); $this->session->unset_userdata('msg')  ?></strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center">Venue type insert</h3>
                                </div>
                                <hr>
                                <form action="<?php echo base_url(); ?>administrator/Venue_Management/insert" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <input id="cc-pament" name="venue" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                        <?php echo form_error('venue', "<p style='color:red'>", "</p>"); ?>
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


    </div><!-- .animated -->
</div>