<div class="search-filter">




    <form action="<?php echo base_url("Event_Management/filter"); ?>" method="get">
        <div class="text-right">

            <div class="Purpose filter">
                <select name="purpose">
                    <option disabled selected>Event Purpose</option>


                    <?php
                    foreach ($allEventPurposeList as $purposelist)
                    {
                        ?>
                        <option value="<?php echo $purposelist->id; ?>"><?php echo $purposelist->purpose_type; ?></option>

                        <?php
                    }
                    ?>



                </select>
            </div>




            <div class="all-event filter">
                <select name="category">
                    <option disabled selected>Event Types</option>



                    <?php
                    foreach ($allCategoryList as $catlist)
                    {
                        ?>
                        <option value="<?php echo $catlist->id; ?>"><?php echo $catlist->category_name; ?></option>

                        <?php
                    }
                    ?>

                </select>
            </div>




            <div class="all-countries filter">
                <select name="venue">
                    <option disabled selected>Venue Type</option>


                    <?php
                    foreach ($allVenueList as $venuelist)
                    {
                        ?>
                        <option value="<?php echo $venuelist->id; ?>"><?php echo $venuelist->venue_type; ?></option>

                        <?php
                    }
                    ?>



                </select>
            </div>



            <div class="all-date filter">
                <select id="all-event" name="price">
                    <option disabled selected>Purchase Types</option>
                    <option value="1">Paid</option>
                    <option value="2">Free</option>
                </select>
            </div>
            <div class="all-button">
                <button type="submit"><a class="btn btn-default go-btn" type="submit">Go</a></button>
            </div>


            <div class="reset text-center">
                <button type="reset">Reset</button>
            </div>

        </div>

    </form>






</div>