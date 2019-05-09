
<input type="hidden" id="userId" value="<?php echo $userID = $this->session->userdata("myid"); ?>">

<?php
foreach ($allUserList as $list)
{
    if ($userID == $list->id)
    {
        $user = $list->name;
    }
}
?>


<?php
foreach ($eventDetail as $evdtList)
{
    ?>
    <input type="hidden" id="eventId" value="<?php
    $evdt = $evdtList->id;
    echo $evdtList->id;
    ?>">

    <?php
}
?>

<div class="event-details-comment">
    <h3 class="comment-heading">COMMENTS</h3>


    <div class="comment-privacy">

        <?php
        if (!$this->session->userdata("myid"))
        {
            ?>


            <p><a href="<?php echo base_url(); ?>Home/signIn">Log</a> in or <a href="<?php echo base_url(); ?>Home/signUp">Register</a> to write comments.</p>

            <?php
        }
        else
        {
            ?>
            <textarea class="form-control text-box" id="comment-post-text" rows="5" id="comment"></textarea>

            <button type="button" id="comment-post-btn" class="btn btn-link">Post</button>
            <?php
        }
        ?>
    </div>

    <div class="comment-holder"></div>

    <?php
    foreach ($allComments as $cmntlist)
    {
        if ($cmntlist->eventid == $evdt)
        {
            foreach ($allUserList as $ulist)
            {
                if ($ulist->id == $cmntlist->userid)
                {
                    ?>
                    <div class="media" id="_<?php echo $cmntlist->id; ?>">
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $ulist->name; ?></h4>
                            <p><?php echo $cmntlist->comment; ?></p>
                            <ul class="comment-meta list-unstyled list-inline">
                                <li class="comment-date">
                                    <?php
                                    $timeago = get_timeago(strtotime($cmntlist->postDate));
                                    echo $timeago;
                                    ?></li>

                                <?php
                                if ($userID == $ulist->id)
                                {
                                    ?>
                                    <li class="comment-like pull-right delete-btn" id="<?php echo $cmntlist->id; ?>"><button>Delete</button></li>
                                        <?php
                                    }
                                    ?>

                            </ul>
                        </div><!-- End /.media-body -->
                    </div><!-- End /.media -->

                    <?php
                }
            }
        }
    }

    function get_timeago($ptime)
    {
        $estimate_time = time() - $ptime;

        if ($estimate_time < 1)
        {
            return 'less than 1 second ago';
        }

        $condition = array(
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($condition as $secs => $str)
        {
            $d = $estimate_time / $secs;

            if ($d >= 1)
            {
                $r = round($d);
                return $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
    ?>
</div><!-- End /.event-details-comment -->

<script>

    $(document).ready(function () {
        $('#comment-post-btn').click(function () {
            comment_post_btn_click();
        });
    });


    function comment_post_btn_click()
    {
        var text = $('#comment-post-text').val();
        var _userId = $('#userId').val();
        var _eventId = $('#eventId').val();


        if (text.length > 0 && _userId != null)
        {
            //                console.log(text + " Name: " + _userName + " Id: " + _userId);


            $('.text-box').css('border', '1px solid #cccccc');

            var dataString = 'text=' + text + '&userId=' + _userId + '&eventId=' + _eventId + '&temp_id=check';

            console.log(dataString);


            $.ajax({
                type: 'POST',
                data: dataString,
                url: "<?php echo base_url("Event_Management/comment_post") ?>",
                success: function (data) {
                    comment_insert(jQuery.parseJSON(data));
                    console.log('Respons Text ' + data);
                }
            });


        } else
        {
            console.log("The Comment Was empty.");
            $('.text-box').css('border', '2px solid #ffb3b3');
        }

        //Remove Text
        $('#comment-post-text').val("");
    }


    function comment_insert(data)
    {
        var t = '';
        t += '<div class="media" id="_' + data.comment_Id + '">';
        t += '<div class="media-body">';
        t += '    <h4 class="media-heading">' + data.userName + '</h4>';
        t += '    <p>' + data.text + '</p>';
        t += '    <ul class="comment-meta list-unstyled list-inline">';
        t += '        <li class="comment-date">' + data.time + '</li>';
        t += '        <li class="comment-like pull-right delete-btn" id="' + data.comment_Id + '"><button>Delete</button></li>';
        t += '    </ul>';
        t += '</div>';
        t += '</div>';


        $('.comment-holder').prepend(t);
        add_delete_handlers();
    }

    $(document).ready(function () {
        add_delete_handlers();
    });

    function add_delete_handlers()
    {
        $('.delete-btn').each(function () {
            var btn = this;
            $(btn).click(function () {
                //                console.log("This id: "+btn.id);
                delete_comment(btn.id);
            });
        });
    }


    function delete_comment(_commentId)
    {
        var dataString = 'commentId=' + _commentId;
        $.ajax({
            type: 'POST',
            data: dataString,
            url: "<?php echo base_url("Event_Management/comment_delete") ?>",
            success: function (data) {
                //                comment_insert(jQuery.parseJSON(data));

                $('#_' + _commentId).detach();
                console.log('Respons Text ' + data);
            }
        });
    }


</script>


<?php
//echo '<pre>';
//print_r($eventDetail);
//echo '</pre>';
//echo '<pre>';
//print_r($allComments);
//echo '</pre>';
?>