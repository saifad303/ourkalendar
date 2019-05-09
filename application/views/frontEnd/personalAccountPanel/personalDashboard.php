<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>OurKalender</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/vendors/line-awesome/dist/css/line-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/css/styles.min.css">

    </head>

    <body>

        <header class="header">
            <p class="text-center">Header Part is here</p>
        </header>

        <main class="main container">

            <div class="row">

                <aside class="profile-sidebar">
                    <div class="profile-picture">
                        <img src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/images/profile-photo.jpg" alt="Profile Photo" class="picture">
                    </div>
                    <div class="profile-info">
                        <h4 class="name">Adriana C. Ocampo Uria</h4>
                        <div class="contact">
                            <div class="info-container">
                                <span class="info"><i class="la la-mobile"></i> 017825814723</span>
                            </div>
                            <div class="info-container">
                                <span class="info"><i class="la la-envelope"></i> <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/mailto:webmaster@example.com">ariana_oampo@example.com</a></span>
                            </div>
                            <div class="info-container">
                                <span class="info"><i class="la la-map-marker"></i> Some place in Germany</span>
                            </div>
                            <div class="info-container">
                                <span class="info"><i class="la la-internet-explorer"></i> <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#"> www.example.com/domain_name.com</a></span>
                            </div>
                        </div>
                        <div class="message">
                            <button class="btn message-btn"><i class="la la-wechat"></i> Send Messsage</button>
                        </div>
                    </div>

                    <div class="profile-tabs nav nav-pills" id="profile-details-tab" role="tablist">
                        <a class="tab nav-link active" href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#event"  id="event-tab" data-toggle="pill" role="tab" aria-selected="true">Events</a>
                        <a class="tab nav-link " href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#calender" id="calender-tab" data-toggle="pill" role="tab" aria-selected="false">Calender</a>
                        <a class="tab nav-link " href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#messages" id="messages-tab" data-toggle="pill" role="tab" aria-selected="false">Messages</a>
                        <a class="tab nav-link " href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#about" id="about-tab" data-toggle="pill" role="tab" aria-selected="false">About</a>
                        <a class="tab nav-link " href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#contacts" id="contacts-tab" data-toggle="pill" role="tab" aria-selected="false">Contacts</a>
                    </div>
                </aside>

                <div class="profile-details tab-content">

                    <div class="tab-pane fade show active" id="event" role="tabpanel" aria-labelledby="event-tab">

                        <div class="page-header">
                            <h2 class="page-header-name">Events</h2>
                        </div>

                        <div class="event-filter">
                            <button class="btn filter active">All</button>
                            <button class="btn filter">Poster By You</button>
                            <button class="btn filter">Poster By Others</button>
                            <button class="btn filter">Calender</button>
                        </div>

<!--                        <ul class="list-unstyled events-list">


                            <?php
                            foreach ($eventListById as $list)
                            {
                                ?>


                                <li class="events">
                                    <div class="date-section">
                                        <div class="date-day">22</div>
                                        <div class="date-month">Jan,18</div>
                                    </div>
                                    <div class="details-section">
                                        <div class="event-image" style="background-image: url('<?php echo base_url("public/eventImagesForHome/event_" . $list->id . "." . $list->picture); ?>')"></div>
                                        <div class="event-details">
                                            <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" class="event-name"><h4><?php echo $list->title; ?></h4></a>
                                            <p class="organizer">Organized By: <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#">Darryl Stephens</a></p>
                                            <p class="short-details">
                                                Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It's also called placehol
                                            </p>
                                            <div class="time-location">
                                                <span class="detail"><i class="la la-clock-o"></i> Saturday, 10:30 am - 5:30 pm</span>
                                                <span class="detail"><i class="la la-map-marker"></i> Woodstock</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-section">
                                        <div class="cost">$35</div>
                                        <button class="btn btn-sm join">Join</button>
                                    </div>
                                </li>



                                <?php
                            }
                            ?>



                        </ul>-->
                        
                        <h2>Load More</h2>
                        
                        <ul class="list-unstyled events-list" id="ajax_table">


                                


                        </ul>
                        
                        
                        

                        <div class="event-filter loader">
                            <button class="btn filter active" id="load_more">Load More</button>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="calender" role="tabpanel" aria-labelledby="calender-tab">
                        <div class="page-header">
                            <h2 class="page-header-name">Calender</h2>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">

                        <div class="page-header">
                            <h2 class="page-header-name">Message</h2>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <table class="table table-custom table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Sender</th>
                                            <th>Subject</th>
                                        </tr>
                                    </thead>
                                    <tdody>
                                        <tr>
                                            <td>21-08-2018</td>
                                            <td>Senders Name</td>
                                            <td><a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" data-toggle="modal" data-target="#message">Subject line of the email</a></td>
                                        </tr>
                                        <tr>
                                            <td>21-08-2018</td>
                                            <td>Senders Name</td>
                                            <td><a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" data-toggle="modal" data-target="#message">Subject line of the email</a></td>
                                        </tr>
                                        <tr>
                                            <td>21-08-2018</td>
                                            <td>Senders Name</td>
                                            <td><a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" data-toggle="modal" data-target="#message">Subject line of the email</a></td>
                                        </tr>
                                    </tdody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">

                        <div class="page-header">
                            <h2 class="page-header-name">About</h2>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5>Adriana C. Ocampo Uria</h5>
                                <hr>
                                <p class="mb-4">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ea est hic iusto molestiae natus nemo neque odit provident quas ratione veritatis vero, voluptatibus! Ex laudantium modi odit rem vero?
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ea est hic iusto molestiae natus nemo neque odit provident quas ratione veritatis vero, voluptatibus! Ex laudantium modi odit rem vero?
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ea est hic iusto molestiae natus nemo neque odit provident quas ratione veritatis vero, voluptatibus! Ex laudantium modi odit rem vero?
                                </p>
                                <h5>Tags</h5>
                                <hr>
                                <div class="tags">
                                    <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" class="tag">Music</a>
                                    <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" class="tag">Exploring</a>
                                    <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" class="tag">Hiking</a>
                                    <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" class="tag">Games</a>
                                    <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" class="tag">Party</a>
                                    <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" class="tag">Music</a>
                                    <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" class="tag">Exploring</a>
                                    <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" class="tag">Hiking</a>
                                    <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" class="tag">Games</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                        <div class="page-header">
                            <h2 class="page-header-name">Contacts</h2>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5>Contacts List</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                                        <div class="card bg-light border-secondary">
                                            <img class="card-img-top" src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/https://images.unsplash.com/photo-1496345875659-11f7dd282d1d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0f994eef47e5fb1a67849703cc961b3&auto=format&fit=crop&w=750&q=80">
                                            <div class="card-body p-2">
                                                <h6 class="card-title mb-0">John Doe</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                                        <div class="card bg-light border-secondary">
                                            <img class="card-img-top" src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/https://images.unsplash.com/photo-1496345875659-11f7dd282d1d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0f994eef47e5fb1a67849703cc961b3&auto=format&fit=crop&w=750&q=80">
                                            <div class="card-body p-2">
                                                <h6 class="card-title mb-0">John Doe</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                                        <div class="card bg-light border-secondary">
                                            <img class="card-img-top" src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/https://images.unsplash.com/photo-1496345875659-11f7dd282d1d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0f994eef47e5fb1a67849703cc961b3&auto=format&fit=crop&w=750&q=80">
                                            <div class="card-body p-2">
                                                <h6 class="card-title mb-0">John Doe</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                                        <div class="card bg-light border-secondary">
                                            <img class="card-img-top" src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/https://images.unsplash.com/photo-1496345875659-11f7dd282d1d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0f994eef47e5fb1a67849703cc961b3&auto=format&fit=crop&w=750&q=80">
                                            <div class="card-body p-2">
                                                <h6 class="card-title mb-0">John Doe</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                                        <div class="card bg-light border-secondary">
                                            <img class="card-img-top" src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/https://images.unsplash.com/photo-1496345875659-11f7dd282d1d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0f994eef47e5fb1a67849703cc961b3&auto=format&fit=crop&w=750&q=80">
                                            <div class="card-body p-2">
                                                <h6 class="card-title mb-0">John Doe</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                                        <div class="card bg-light border-secondary">
                                            <img class="card-img-top" src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/https://images.unsplash.com/photo-1496345875659-11f7dd282d1d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0f994eef47e5fb1a67849703cc961b3&auto=format&fit=crop&w=750&q=80">
                                            <div class="card-body p-2">
                                                <h6 class="card-title mb-0">John Doe</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                                        <div class="card bg-light border-secondary">
                                            <img class="card-img-top" src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/https://images.unsplash.com/photo-1496345875659-11f7dd282d1d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0f994eef47e5fb1a67849703cc961b3&auto=format&fit=crop&w=750&q=80">
                                            <div class="card-body p-2">
                                                <h6 class="card-title mb-0">John Doe</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                                        <div class="card bg-light border-secondary">
                                            <img class="card-img-top" src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/https://images.unsplash.com/photo-1496345875659-11f7dd282d1d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0f994eef47e5fb1a67849703cc961b3&auto=format&fit=crop&w=750&q=80">
                                            <div class="card-body p-2">
                                                <h6 class="card-title mb-0">John Doe</h6>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Persons name</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body message-body">
                            <p><a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#">@persons name</a> piciatis sapiente, sequi sunt vel. A facere iusto nam</p>
                            <p class="my-msg"><a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#">@my name</a> nostrum perspiciatis sapiente, sequi sunt vel. A facere iusto nam non odit.</p>
                        </div>
                        <div class="modal-footer d-block border-0 pt-0">
                            <form action="">
                                <div class="input-group w-100">
                                    <input type="text" class="form-control" placeholder="write message"  aria-describedby="msg-sender">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" id="msg-sender">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <footer class="footer">
        </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo base_url(); ?>public/frontEndDesign/js/jquery-2.2.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                getcountry(0);
                $("#load_more").click(function (e) {
                    e.preventDefault();
                    var page = $(this).data('val');
                    getcountry(page);
                });
            });
            var getcountry = function (page) {
                $(".loader").show();
                $.ajax({
                    url: "<?php echo base_url() ?>Event_Management/get_events",
                    type: 'GET',
                    data: {page: page}
                }).done(function (response) {
                    $("#ajax_table").append(response);
                    $(".loader").hide();
                    $('#load_more').data('val', ($('#load_more').data('val') + 1));
                    scroll();
                });
            };
            var scroll = function () {
                $('html, body').animate({
                    scrollTop: $('#load_more').offset().top
                }, 100);
            };
        </script>


        <script src="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/js/main.min.js"></script>
    </body>



</html>


<?php
//echo '<pre>';
//print_r($eventListById);
//echo '</pre>';
?>