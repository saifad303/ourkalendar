
<div class="col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-4 col-lg-offset-1 col-lg-4">
    <div class="interest">
        <p>Are you interest? 
        <ul class="list-inline list-unstyled">
            <li><button class="interested" id="subscribe"><i class="fa fa-check"></i></button></li>
            <a></a><li><button class="un-interested" id="unsubscribe"><i class="fa fa-times"></i></button></li>
        </ul>
        
        <input type="hidden" value="<?php echo $this->session->userdata("mytype"); ?>" id="userType">

        <ul class="list-inline list-unstyled">
            <li><iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>&layout=button&size=small&mobile_iframe=true&appId=1812728382304908&width=59&height=20" width="59" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></li>
            
            
            <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


        </ul>

    </div><!-- End /.interest -->
</div><!-- End /.col-md-4 -->

<script>

    $(document).ready(function () {
        $('#subscribe').click(function () {
            subscribe_btn_click();
        });

        $('#unsubscribe').click(function () {
            unsubscribe_btn_click();
        });
    });


    function unsubscribe_btn_click()
    {
        var _userId = $('#userId').val();
        var _userType = $('#userType').val();
        var _eventId = $('#eventId').val();


        var dataString = 'subscriberId=' + _userId + '&eventId=' + _eventId+ '&userType=' + _userType;
        console.log(dataString);

        $.ajax({
            type: 'POST',
            data: dataString,
            url: "<?php echo base_url("Event_Management/unsubscribeclick") ?>",
            success: function (data) {
                unsubscription(jQuery.parseJSON(data));
                console.log('Respons Text ' + data);
            }
        });
    }

    function unsubscription(data)
    {
        if (data.flag == 0 && data.userId)
        {
            var t = '';
            $('#subid_' + data.id).detach();
            console.log('Respons Text ' + data);

            alert("Unsubscribed.");
        }
    }


    function subscribe_btn_click()
    {
        var _userId = $('#userId').val();
        var _eventId = $('#eventId').val();
        var _userType = $('#userType').val();

        var dataString = 'subscriberId=' + _userId + '&eventId=' + _eventId + '&userType=' + _userType;
        console.log(dataString);

        $.ajax({
            type: 'POST',
            data: dataString,
            url: "<?php echo base_url("Event_Management/subscribe") ?>",
            success: function (data) {
                subscription_insert(jQuery.parseJSON(data));
                console.log('Respons Text ' + data);
            }
        });
    }

    function subscription_insert(data)
    {
        if (data.flag == 1 && data.userId)
        {
            var t = '';
            t += '<li id="subid_'+data.insertId+'">';
            t += '<a href="<?php echo base_url(); ?>/public/frontEndDesign/#">';
            t += '<div class="thumbnail">';
            t += '<img src="<?php echo base_url(); ?>/public/frontEndDesign/images/interested-people-img-3.png" alt="interested people image 1" class="img-responsive">';
            t += '<div class="caption text-center">';
            t += '<p>' + data.userName + '</p>';
            t += '</div>';
            t += '</div>';
            t += '</a>';
            t += '</li>';
            $('.subscriber-holder').prepend(t);

            alert("Successfully subscribed.");
        } else
        {
            console.log("Error Input");
        }
    }


</script>