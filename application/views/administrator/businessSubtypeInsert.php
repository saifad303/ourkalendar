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
                                    <h3 class="text-center">Subtypes Insert</h3>
                                </div>
                                <hr>
                                <form action="<?php echo base_url(); ?>administrator/BusinessSubtype_Management/insert" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <input id="cc-pament" name="subtype" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        <?php echo form_error('subtype', "<p style='color:red'>", "</p>"); ?>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-9">
                                            <select name="typeid" id="select" class="form-control">
                                                <option value="">From which type</option>
                                                <?php
                                                foreach ($typeList as $types)
                                                {
                                                    if ($types->id != 6)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $types->id; ?>"><?php echo $types->type_name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <?php echo form_error('typeid', "<p style='color:red'>", "</p>"); ?>
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


    </div><!-- .animated -->
</div>