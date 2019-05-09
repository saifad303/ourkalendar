<style>
    .ui-datepicker .ui-state-active{
        background: #cfcfcf;
        border-radius: unset;
    }
    .ui-datepicker table tbody tr:last-child td {
        padding-bottom: 4px;
    }
</style>

<div class="col-md-3 col-sm-3 col-lg-3">
    <div class="widget calendar">
        <h4 class="widget-title">Calendar</h4>
        <div id="datepicker"></div>
    </div>
</div><!-- End /.col-md-3 -->




<script>
    $(document).ready(function () {

        $.ajax({
            type: 'POST',
            data: '',
            url: "<?php echo base_url("Event_Management/dates") ?>",
            success: function (data) {
                date(jQuery.parseJSON(data));
                console.log('Respons Text ' + data);
            }
        });

        function date(data)
        {
            var disabledDays = [];


            disabledDays = data.date;

            console.log(disabledDays);

            var date = new Date();

            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
                beforeShowDay: function (date)
                {
                    var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
                    for (i = 0; i < disabledDays.length; i++) {
                        if ($.inArray(y + '-' + (m + 1) + '-' + d, disabledDays) != -1) {
                            //return [false];
                            return [true, 'ui-state-active', ''];
                        }
                    }
                    return [true];

                },
                onSelect: function ()
                {
//                alert("Hello");
                    var selected = $(this).val();
//                alert(selected);
                    window.location = "<?php echo base_url("Event_Management/searchByDates"); ?>/" + selected;
                }
            });
        }
    });
</script>