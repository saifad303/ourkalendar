<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Post Your Events</h2>   
                <h5>Lorem ipsum</h5>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Event post form</h3>
                                <br><br>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <?php echo $this->session->userdata('msg'); $this->session->unset_userdata('msg')  ?>




                                <form action="<?php echo base_url()."Event_Management/postEvent"; ?>" method="post" role="form">
                                    <div class="form-group">
                                        <label></label>
                                        <input class="form-control" name="title" type="text" placeholder="Enter event title" />
                                        <?php echo form_error('title', "<p style='color:red'>", "</p>"); ?>
                                        <input class="form-control" name="id" type="hidden" value="<?php echo $this->session->userdata('myid'); ?>" placeholder="Enter event title" />
                                        <input class="form-control" name="utype" type="hidden" value="<?php echo $this->session->userdata('mytype'); ?>" placeholder="Enter event title" />
                                    </div>



                                    <div class="form-group">
                                        <label>Event Description</label>
                                        <textarea class=" form-control" name="descr" rows="3"></textarea>
                                        <?php echo form_error('descr', "<p style='color:red'>", "</p>"); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Address line 1</label>
                                        <textarea class="form-control" name="adrssL1" rows="3"></textarea>
                                        <?php echo form_error('adrssL1', "<p style='color:red'>", "</p>"); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Address line 2</label>
                                        <textarea class="form-control" name="adrssL2" rows="3"></textarea>
                                        <?php echo form_error('adrssL2', "<p style='color:red'>", "</p>"); ?>
                                    </div>




                                    <div class="form-group">
                                        <label>Select event category</label>
                                        <select class="form-control" name="category">
                                            <option value="">Select event category</option>
                                            <?php
                                            foreach ($categoryList as $catlist)
                                            {
                                                ?>
                                                <option value="<?php echo $catlist->id; ?>"><?php echo $catlist->category_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('category', "<p style='color:red'>", "</p>"); ?>
                                    </div>



                                    <div class="form-group">
                                        <label>Select event location by country</label>
                                        <select class="form-control" name="country">
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($countryList as $list)
                                            {
                                                if ($list->id != 16)
                                                {
                                                    ?>
                                                    <option value="<?php echo $list->id; ?>"><?php echo $list->country_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('country', "<p style='color:red'>", "</p>"); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Select event location by city</label>
                                        <select class="form-control" name="city">
                                            <option value="">Select city</option>
                                            <?php
                                            foreach ($cityList as $list)
                                            {
                                                if ($list->id != 7)
                                                {
                                                    ?>
                                                    <option value="<?php echo $list->id; ?>"><?php echo $list->city_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('city', "<p style='color:red'>", "</p>"); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Start Date</label><br>
                                        <input id="date" name="startDate" type="date">
                                        <?php echo form_error('startDate', "<p style='color:red'>", "</p>"); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>End Date(If it is not an one day event)</label><br>
                                        <input id="date" name="endDate" type="date">
                                        <?php echo form_error('endDate', "<p style='color:red'>", "</p>"); ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Start Time</label><br>
                                        <input id="date" name="startTime" type="time">
                                        <?php echo form_error('startTime', "<p style='color:red'>", "</p>"); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>End Time</label><br>
                                        <input id="date" name="endTime" type="time">
                                        <?php echo form_error('endTime', "<p style='color:red'>", "</p>"); ?>
                                    </div>


                                    <button type="submit" class="btn btn-default">Submit Event Request</button>

                                </form>

                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>