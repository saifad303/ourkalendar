<div class="widget interested-people">
    <h4 class="widget-title">Interested People 
        <span>
            (<?php
            $countsub = 0;
            foreach ($subscribersCount as $countList)
            {
                $countsub++;
            }

            if ($countsub)
            {
                echo $countsub;
            }
            else
            {
                echo '0';
            }
            ?>)
        </span></h4>
    <ul class="list-inline list-unstyled">


        <div class="subscriber-holder">

        </div>


        <?php
        $counter = 0;

        foreach ($allSubscribers as $sublist)
        {
            if($sublist->user_type == 'a' || $sublist->user_type == 'u')
            {
                foreach ($allUserList as $ulist)
                {
                    if ($ulist->id == $sublist->userid && $sublist->user_type == 'u')
                    {
                        $userName = $ulist->name;
                    }
                }
            }
            
            if($sublist->user_type == 'b')
            {
                foreach ($allBusList as $ulist)
                {
                    if ($ulist->id == $sublist->userid && $sublist->user_type == 'b')
                    {
                        $userName = $ulist->business_title;
                    }
                }
            }
            ?>
            <li id="subid_<?php echo $sublist->id; ?>">
                <a href="<?php echo base_url(); ?>/public/frontEndDesign/#">
                    <div class="thumbnail">
                        <img src="<?php echo base_url(); ?>/public/frontEndDesign/images/interested-people-img-3.png" alt="interested people image 1" class="img-responsive">
                        <div class="caption text-center">
                            <p><?php echo $userName; ?></p>
                        </div>
                    </div>
                </a>
            </li>
            <?php
            $counter++;
            if ($counter == 4)
            {
                break;
            }
        }
        ?>




    </ul>
    <div class="more-people text-right">
        <?php
        foreach ($eventDetail as $edt)
        {
            $evdt = $edt->id;
        }
        ?>
        <a href="<?php echo base_url("Event_Management/subscriberList/" . $evdt); ?>" data-toggle="modal">See All</a>
    </div>
</div><!-- /.interested-people -->



<?php
//echo '<pre>';
//print_r($eventDetail);
//echo '</pre>';
?>