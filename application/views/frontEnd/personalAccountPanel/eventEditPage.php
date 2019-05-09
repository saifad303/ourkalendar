<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit this event</h2>   
                <h5>Lorem Ipsum</h5>

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

                                <br><br>


                                <?php
                                foreach ($eventDetail as $detail)
                                {
                                    ?>



                                    <?php
                                    $countryName = '';
                                    $countryId = 0;

                                    foreach ($cityList as $ctlist)
                                    {
                                        if ($detail->cityid == $ctlist->id)
                                        {
                                            foreach ($countryList as $cntlist)
                                            {
                                                if ($ctlist->countryid == $cntlist->id)
                                                {
                                                    $countryName = $cntlist->country_name;
                                                    $countryId = $cntlist->id;
                                                }
                                            }
                                        }
                                    }
                                    ?>

                                    <form action="<?php echo base_url() . "Event_Management/updateEvent"; ?>" method="post" role="form" onsubmit="return confirm('Your event will not be available until this edit request not activate by admin.Do you want to submit the request?');">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" type="text" value="<?php echo $detail->title; ?>"/>
                                            <?php echo form_error('title', "<p style='color:red'>", "</p>"); ?>
                                            <input class="form-control" name="uid" type="hidden" value="<?php echo $this->session->userdata("myid"); ?>" placeholder="" />
                                            <input class="form-control" name="utype" type="hidden" value="<?php echo $detail->user_type; ?>" placeholder="" />
                                            <input class="form-control" name="eventid" type="hidden" value="<?php echo $detail->id; ?>" placeholder="Enter event title" />
                                        </div>



                                        <div class="form-group">
                                            <label>Event Description</label>
                                            <textarea class=" form-control" name="descr" rows="10"><?php echo $detail->description; ?></textarea>
                                            <?php echo form_error('descr', "<p style='color:red'>", "</p>"); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Address line 1</label>
                                            <textarea class="form-control" name="adrssL1" rows="3"><?php echo $detail->eventLocationL1; ?></textarea>
                                            <?php echo form_error('adrssL1', "<p style='color:red'>", "</p>"); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Address line 2</label>
                                            <textarea class="form-control" name="adrssL2" rows="3"><?php echo $detail->eventLocationL2; ?></textarea>
                                            <?php echo form_error('adrssL2', "<p style='color:red'>", "</p>"); ?>
                                        </div>




                                        <div class="form-group">
                                            <label>Select event category</label>
                                            <select class="form-control" name="category">


                                                <?php
                                                foreach ($categoryList as $catlist)
                                                {
                                                    if ($detail->categoryid == $catlist->id)
                                                    {
                                                        ?>

                                                        <option value="<?php echo $catlist->id; ?>"><?php echo $catlist->category_name; ?></option>


                                                        <?php
                                                    }
                                                }
                                                ?>


                                                <?php
                                                foreach ($categoryList as $catlist)
                                                {
                                                    if ($detail->categoryid != $catlist->id)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $catlist->id; ?>"><?php echo $catlist->category_name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <?php echo form_error('category', "<p style='color:red'>", "</p>"); ?>
                                        </div>


                                        <div class="form-group">
                                            <label>Select event location by country</label>
                                            <select class="form-control" name="country">



                                                <option value="<?php echo $countryId; ?>"><?php echo $countryName; ?></option>




                                                <?php
                                                foreach ($countryList as $list)
                                                {
                                                    if ($list->id != 16 && $list->id != $countryId)
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

                                                <?php
                                                foreach ($cityList as $list)
                                                {
                                                    if ($list->id == $detail->cityid)
                                                    {
                                                        ?>


                                                        <option value="<?php echo $list->id; ?>"><?php echo $list->city_name; ?></option>


                                                        <?php
                                                    }
                                                }
                                                ?>



                                                <?php
                                                foreach ($cityList as $list)
                                                {
                                                    if ($list->id != 7 && $detail->cityid != $list->id)
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
                                            <input id="date" name="startDate" value="<?php echo $detail->startDate; ?>" type="date">
                                            <?php echo form_error('startDate', "<p style='color:red'>", "</p>"); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>End Date(If it is not an one day event)</label><br>
                                            <input id="date" name="endDate" value="<?php echo $detail->endDate; ?>" type="date">
                                            <?php echo form_error('endDate', "<p style='color:red'>", "</p>"); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Start Time</label><br>
                                            <input id="date" name="startTime" value="<?php echo $detail->startTime; ?>" type="time">
                                            <?php echo form_error('startTime', "<p style='color:red'>", "</p>"); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>End Time</label><br>
                                            <input id="date" name="endTime" value="<?php echo $detail->endTime; ?>" type="time">
                                            <?php echo form_error('endTime', "<p style='color:red'>", "</p>"); ?>
                                        </div>


                                        <button type="submit" class="btn btn-default">Submit Event Edit Request</button>

                                    </form>

                                    <?php
                                }
                                ?>
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

    <?php
//    echo '<pre>';
//    print_r($cityList);
//    echo '<pre>';
    ?>
</div>



