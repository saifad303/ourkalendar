
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


            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Event </strong> Edit
                    </div>
                    <div class="card-body card-block">

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



                            <form action="<?php echo base_url() . "Event_Management/updateEventFromEditEventList"; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label></div>
                                    <div class="col-12 col-md-9">


                                        <input type="text" id="text-input" value="<?php echo $detail->title; ?>" name="title" placeholder="Title" class="form-control">


                                        <input type="hidden" id="text-input" name="eventid" value="<?php echo $detail->id; ?>" placeholder="Title" class="form-control">
                                        <input type="hidden" id="text-input" name="uid" value="<?php echo $detail->userid; ?>" placeholder="Title" class="form-control">
                                        <input type="hidden" id="text-input" name="utype" value="<?php echo $detail->user_type; ?>" placeholder="Title" class="form-control">




                                        <small class="form-text text-muted"></small></div>
                                </div>



                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                    <div class="col-12 col-md-9"><textarea name="descr" id="textarea-input" rows="7" placeholder="Content..." class="form-control"><?php echo $detail->description; ?></textarea></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Address Line 1</label></div>
                                    <div class="col-12 col-md-9"><textarea name="adrssL1" id="textarea-input" rows="4" placeholder="Content..." class="form-control"><?php echo $detail->eventLocationL2; ?></textarea></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Address Line 2</label></div>
                                    <div class="col-12 col-md-9"><textarea name="adrssL2" id="textarea-input" rows="4" placeholder="Content..." class="form-control"><?php echo $detail->eventLocationL2; ?></textarea></div>
                                </div>



                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select category</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category" id="select" class="form-control">
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
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select country</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="country" id="select" class="form-control">


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
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select city</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="city" id="select" class="form-control">
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
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Start Date</label></div>
                                    <div class="col-12 col-md-9"><input type="date" value="<?php echo $detail->startDate; ?>" id="text-input" name="startDate" placeholder="Text" class="form-control"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">End Date</label></div>
                                    <div class="col-12 col-md-9"><input type="date" value="<?php echo $detail->endDate; ?>" id="text-input" name="endDate" placeholder="Text" class="form-control"></div>
                                </div>



                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Start Time</label></div>
                                    <div class="col-12 col-md-9"><input type="time" value="<?php echo $detail->startTime; ?>" id="text-input" name="startTime" placeholder="Text" class="form-control"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">End Date</label></div>
                                    <div class="col-12 col-md-9"><input type="time" value="<?php echo $detail->endTime; ?>" id="text-input" name="endDate" placeholder="Text" class="form-control"></div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                </div>

                            </form>

                            <?php
                        }
                        ?>
                    </div>

                </div>

            </div>



        </div>


    </div><!-- .animated -->
</div>