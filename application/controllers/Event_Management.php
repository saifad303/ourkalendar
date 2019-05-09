<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event_Management extends CI_Controller
{

    public function index()
    {
        
    }

    public function eventInsertPage()
    {
        $id = $this->uri->segment(3);

        if ($this->session->userdata('myid') != $id)
        {
            redirect("Home/errorPage");
        }

        $data['id'] = $id;
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['content'] = $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data, TRUE);
        $this->load->view("frontEnd/personalAccountPanel/master", $data);
    }

    function file_selected_test()
    {
        if (empty($_FILES['pic']['name']))
        {
            $this->form_validation->set_message('file_selected_test', 'Please select picture.');
            return false;
        }
        else if ($_FILES['pic']['size'] >= 4194304)
        {
            $this->form_validation->set_message('file_selected_test', 'File is too large.');
            return false;
        }
        else if ($_FILES['pic']['size'] <= 30720)
        {
            $this->form_validation->set_message('file_selected_test', 'File is too small.');
            return false;
        }
        else
        {
            return true;
        }
    }

    public function postEvent()
    {
        if (!$this->session->userdata("myid") && !$this->session->userdata("mytype"))
        {
            redirect(base_url());
        }
        date_default_timezone_set('asia/dhaka');
        $this->load->helper("form");
        $this->load->helper('email');
        $this->load->library('form_validation');
        $this->load->library('upload');




        $this->form_validation->set_rules('title', 'Title', 'required|trim|min_length[10]|max_length[55]');
        $this->form_validation->set_rules('descr', 'Description', 'required|trim|min_length[50]|max_length[1000]');
        $this->form_validation->set_rules('adrssL1', 'Address line 1', 'required|trim|min_length[10]|max_length[30]');
//        $this->form_validation->set_rules('adrssL2', 'Address line 2', 'required|trim|min_length[10]|max_length[30]');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('purpose', 'Purpose', 'required');
        $this->form_validation->set_rules('purchase', 'Purchase type', 'required');
        $this->form_validation->set_rules('venue', 'Venue', 'required');
//        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('startDate', 'Start date', 'required');
        $this->form_validation->set_rules('startTime', 'Start time', 'required');
        $this->form_validation->set_rules('endTime', 'End time', 'required');
        $this->form_validation->set_rules('pic', 'Picture', 'callback_file_selected_test');





//


        if (($this->form_validation->run() == TRUE))
        {
            $ext = pathinfo($_FILES['pic']['name']);
            $ext = strtolower($ext['extension']);


            if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "tiff")
            {
                
            }
            else
            {
                $id = $this->session->userdata("myid");
                $data['id'] = $id;
//            redirect(base_url("Event_Management/createEvent/" . $id));
                $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
                $data['venueList'] = $this->om->view_with_asc("venues", "*", "id");
                $data['purposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
                $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
                $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
                if ($this->session->userdata("mytype") == "u" || $this->session->userdata("mytype") == "a")
                {
                    $data['userById'] = $this->om->view_data("users", "*", array("id" => $id));
                    foreach ($data['userById'] as $list)
                    {
                        if ($list->activeorinactive == 0)
                        {
                            $data['validationcheck'] = "disabled";
                        }
                        else
                        {
                            $data['validationcheck'] = "";
                        }
                    }
                }
                if ($this->session->userdata("mytype") == "b")
                {
                    $data['businessById'] = $this->om->view_data("business", "*", array("id" => $id));

                    foreach ($data['businessById'] as $list)
                    {
                        if ($list->activeorinactive == 0)
                        {
                            $data['validationcheck'] = "disabled";
                        }
                        else
                        {
                            $data['validationcheck'] = "";
                        }
                    }
                }
                $data['businessById'] = $this->om->view_data("users", "*", array("id" => $id));
//            $data['content'] = $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data, TRUE);
                $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data);
            }



            $flag = 2;

            $price = $this->input->post("price");

            if ($price > 0)
            {
                $flag = 1;
            }

            if ($price == "")
            {
                $price = 0;
            }

            $ext = pathinfo($_FILES['pic']['name']);
            $ext = strtolower($ext['extension']);
            if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif")
            {
                $ext = "";
            }

            $businessid = 0;
            $userid = 10;

            if ($this->input->post("country") == "")
            {
                $countryid = 16;
            }
            else
            {
                $countryid = $this->input->post("country");
            }

            if ($this->session->userdata('mytype') == 'u' || $this->session->userdata('mytype') == 'a')
            {
                $userid = $this->session->userdata("myid");
            }

            if ($this->session->userdata('mytype') == 'b')
            {
                $businessid = $this->session->userdata("myid");
            }

            $tags = $this->input->post("tags") . ',';

            $data = array(
                "title" => $this->input->post("title"),
                "description" => $this->input->post("descr"),
                "eventLocationL1" => $this->input->post("adrssL1"),
//                "eventLocationL2" => $this->input->post("adrssL2"),
                "userid" => $userid,
                "businessid" => $businessid,
                "user_type" => $this->input->post("utype"),
                "categoryid" => $this->input->post("category"),
                "countryid" => $countryid,
                "cityid" => $this->input->post("city"),
                "eventpurposeid" => $this->input->post("purpose"),
                "venueid" => $this->input->post("venue"),
                "tags" => $tags,
                "price" => $price,
                "purchaseid" => $flag,
                "startDate" => $this->input->post("startDate"),
                "endDate" => $this->input->post("endDate"),
                "startTime" => $this->input->post("startTime"),
                "endTime" => $this->input->post("endTime"),
                "postDate" => date("Y-m-d"),
                "activation" => 0,
                "editActivation" => 1,
                "activeorinactive" => 1,
                "picture" => $ext
            );



            if ($this->om->InsertData("events", $data))
            {
//                picture upload

                $Id = $this->om->Id;

                if ($ext != "")
                {


                    $config['upload_path'] = './public/eventImages/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '1000000';
                    $config['max_width'] = '4048';
                    $config['max_height'] = '3500';
                    $config['file_name'] = "event_{$Id}.{$ext}";
                    $this->upload->initialize($config); //upload image data
                    $this->upload->do_upload('pic');

//                  Image resizing
//                    $this->load->library('image_lib');
//                    $config['image_library'] = 'gd2';
//                    $config['source_image'] = './public/eventImages/event_' . $Id . '.' . $ext;
//                    $config['maintain_ratio'] = TRUE;
//                    $config['width'] = 320;
//                    $config['height'] = 210;
//                    $config['new_image'] = './public/eventImagesForHome/event_' . $Id . '.' . $ext;

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './public/eventImages/event_' . $Id . '.' . $ext;
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 277;
                    $config['height'] = 188;
                    $config['new_image'] = './public/eventImagesForHome/event_' . $Id . '.' . $ext;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();



                    if (!$this->image_lib->resize())
                    {
                        echo $this->image_lib->display_errors();
                    }
                }

//                Extra start
//                $this->om->InsertData("events", $data);
//                
//                $Id = $this->om->Id;
//
//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/eventImages/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '1000000';
//                    $config['max_width'] = '4048';
//                    $config['max_height'] = '3500';
//                    $config['file_name'] = "event_{$Id}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                
//                
//                $this->om->InsertData("events", $data);
//                
//                $Id = $this->om->Id;
//
//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/eventImages/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '1000000';
//                    $config['max_width'] = '4048';
//                    $config['max_height'] = '3500';
//                    $config['file_name'] = "event_{$Id}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                
//                
//                
//                $this->om->InsertData("events", $data);
//                
//                $Id = $this->om->Id;
//
//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/eventImages/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '1000000';
//                    $config['max_width'] = '4048';
//                    $config['max_height'] = '3500';
//                    $config['file_name'] = "event_{$Id}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                
//                
//                
//                $this->om->InsertData("events", $data);
//                
//                $Id = $this->om->Id;
//
//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/eventImages/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '1000000';
//                    $config['max_width'] = '4048';
//                    $config['max_height'] = '3500';
//                    $config['file_name'] = "event_{$Id}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                
//                
//                $this->om->InsertData("events", $data);
//                
//                $Id = $this->om->Id;
//
//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/eventImages/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '1000000';
//                    $config['max_width'] = '4048';
//                    $config['max_height'] = '3500';
//                    $config['file_name'] = "event_{$Id}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                Extra End
//                $id = $this->session->userdata("myid");
//                redirect(base_url("Event_Management/eventInsertPage/" . $id));
//                $data['id'] = $id;
//                $msg['msg'] = "Your event has successfully submitted.Wait until activation.";
//                $this->session->set_userdata($msg);
//                $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
//                $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
//                $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
//                $data['content'] = $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data, TRUE);
//                $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data, TRUE);
            }

            $msg['msg'] = "Your event is successfully submited.<br>The post will be disappear untill admin approval.";
            $this->session->set_userdata($msg);

            redirect(base_url("Event_Management/profile/" . $this->session->userdata("myid")));
        }
        else
        {
            $id = $this->session->userdata("myid");
            $data['id'] = $id;
//            redirect(base_url("Event_Management/createEvent/" . $id));
            $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
            $data['venueList'] = $this->om->view_with_asc("venues", "*", "id");
            $data['purposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
            $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
            $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
            if ($this->session->userdata("mytype") == "u" || $this->session->userdata("mytype") == "a")
            {
                $data['userById'] = $this->om->view_data("users", "*", array("id" => $id));
                foreach ($data['userById'] as $list)
                {
                    if ($list->activeorinactive == 0)
                    {
                        $data['validationcheck'] = "disabled";
                    }
                    else
                    {
                        $data['validationcheck'] = "";
                    }
                }
            }
            if ($this->session->userdata("mytype") == "b")
            {
                $data['businessById'] = $this->om->view_data("business", "*", array("id" => $id));

                foreach ($data['businessById'] as $list)
                {
                    if ($list->activeorinactive == 0)
                    {
                        $data['validationcheck'] = "disabled";
                    }
                    else
                    {
                        $data['validationcheck'] = "";
                    }
                }
            }
            $data['businessById'] = $this->om->view_data("users", "*", array("id" => $id));
//            $data['content'] = $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data, TRUE);
            $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data);
        }
    }

    public function pandingEventList()
    {

        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }


        $this->load->library('pagination');

        $config['base_url'] = base_url("Event_Management/pandingEventList");
        $config['total_rows'] = $this->om->count_pending_events(array("activation" => 0));
        $config['per_page'] = 5;

        //Pagination Design
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';

        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['pendingEventList'] = $this->om->all_pending_event_pagination($config['per_page'], $this->uri->segment(3));


//        $data['pendingEventList'] = $this->om->PendingEventList();
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;
        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['content'] = $this->load->view("administrator/pendingEvents", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function eventDetailInfo()
    {
        $id = $this->uri->segment(3);
    }

    public function eventActivation()
    {
        $id = $this->uri->segment(3);

        $data = array(
            "activation" => 1,
            "editActivation" => 1,
            "activeorinactive" => 1
        );

        $dt = $this->om->UpdateData("events", $data, array("id" => $id));

        if ($dt)
        {
            redirect(base_url() . "Event_Management/pandingEventList");
        }
    }

    public function eventActivationDashboard()
    {
        $id = $this->uri->segment(3);

        $data = array(
            "activation" => 1,
            "editActivation" => 1,
            "activeorinactive" => 1
        );

        $dt = $this->om->UpdateData("events", $data, array("id" => $id));

        if ($dt)
        {
            redirect(base_url() . "Home/dashboard");
        }
    }

    public function editEventActivation()
    {
        $id = $this->uri->segment(3);

        $data = array(
            "activation" => 1,
            "editActivation" => 1
        );

        $dt = $this->om->UpdateData("events", $data, array("id" => $id));

        if ($dt)
        {
            $this->session->unset_userdata("devider");
            $empty['empty'] = 1;
            $this->session->set_userdata($empty);
            redirect(base_url() . "Event_Management/pandingEditEventList");
        }
    }

    public function eventDelete()
    {
        $id = $this->uri->segment(3);

        $dt = $this->om->DeleteData("events", array("id" => $id));

        if ($dt)
        {
            redirect(base_url() . "Event_Management/pandingEventList");
        }
    }

    public function eventDeleteDashboard()
    {
        $id = $this->uri->segment(3);

        $dt = $this->om->DeleteData("events", array("id" => $id));

        if ($dt)
        {
            redirect(base_url() . "Home/dashboard");
        }
    }

    public function eventDeleteByUser()
    {
        $eventid = $this->uri->segment(3);
        $userid = $this->session->userdata("myid");
        $data['userid'] = $this->uri->segment(4);
        $data['businessid'] = $this->uri->segment(4);


        $dt = $this->om->DeleteData("events", array("id" => $eventid));

        if ($dt)
        {
            $msg['msg'] = "Event has delete successfully.";
            $this->session->set_userdata($msg);
            if ($this->session->userdata("mytype") == 'u' || $this->session->userdata("mytype") == 'a')
            {
                $data['myEvents'] = $this->om->view_data("events", "*", array("userid" => $userid));
            }

            if ($this->session->userdata("mytype") == 'b')
            {
                $data['myEvents'] = $this->om->view_data("events", "*", array("businessid" => $userid));
            }
            $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
//            $data['content'] = $this->load->view("frontEnd/personalAccountPanel/viewMyEventsList", $data, TRUE);
//            $this->load->view("frontEnd/personalAccountPanel/master", $data);
            redirect(base_url("Event_Management/profile/" . $userid));
        }
    }

    public function myEvents()
    {
        $userid = $this->uri->segment(3);

        if ($this->session->userdata('myid') != $userid)
        {
            redirect("Home/errorPage");
        }

        $data['userid'] = $this->uri->segment(3);

        if ($this->session->userdata("mytype") == 'u' || $this->session->userdata("mytype") == 'a')
        {
            $data['myEvents'] = $this->om->view_data("events", "*", array("userid" => $userid));
        }

        if ($this->session->userdata("mytype") == 'b')
        {
            $data['myEvents'] = $this->om->view_data("events", "*", array("businessid" => $userid));
        }
//        echo '<pre>';
//        print_r($data['myEvents']);
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['content'] = $this->load->view("frontEnd/personalAccountPanel/viewMyEventsList", $data, TRUE);
        $this->load->view("frontEnd/personalAccountPanel/master", $data);
    }

    public function eventDetail()
    {
        $eventid = $this->uri->segment(3);
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['eventDetail'] = $this->om->view_data("events", "*", array("id" => $eventid));
        $data['content'] = $this->load->view("frontEnd/personalAccountPanel/eventDetailPage", $data, TRUE);
        $this->load->view("frontEnd/personalAccountPanel/master", $data);
    }

    public function eventEdit()
    {
        $eventid = $this->uri->segment(3);
        $data['eventDetail'] = $this->om->view_data("events", "*", array("id" => $eventid));
        $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['content'] = $this->load->view("frontEnd/personalAccountPanel/eventEditPage", $data, TRUE);
        $this->load->view("frontEnd/personalAccountPanel/master", $data);
    }

    public function editEvent()
    {
        if (!$this->session->userdata("myid"))
        {
            redirect(base_url());
        }
        $eventid = $this->uri->segment(3);
        $userid = $this->session->userdata("myid");
        $data['eventDetail'] = $this->om->view_data("events", "*", array("id" => $eventid));
        $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
        if ($this->session->userdata("mytype") == "u" || $this->session->userdata("mytype") == "a")
        {
            $data['userById'] = $this->om->view_data("users", "*", array("id" => $userid));
            foreach ($data['userById'] as $list)
            {
                if ($list->activeorinactive == 0)
                {
                    $data['validationcheck'] = "disabled";
                }
                else
                {
                    $data['validationcheck'] = "";
                }
            }
        }
        if ($this->session->userdata("mytype") == "b")
        {
            $data['businessById'] = $this->om->view_data("business", "*", array("id" => $userid));

            foreach ($data['businessById'] as $list)
            {
                if ($list->activeorinactive == 0)
                {
                    $data['validationcheck'] = "disabled";
                }
                else
                {
                    $data['validationcheck'] = "";
                }
            }
        }
        $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['venueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['purposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
//        $data['content'] = $this->load->view("frontEnd/personalAccountPanel/editEventForm", $data, TRUE);
        $this->load->view("frontEnd/personalAccountPanel/editEventForm", $data);
    }

    public function updateEvent()
    {

        $eventid = $this->input->post("eventid");

        $bid = 0;
        $uid = 10;

        if ($this->session->userdata('mytype') == 'u' || $this->session->userdata('mytype') == 'a')
        {
            $uid = $this->session->userdata("myid");
        }

        if ($this->session->userdata('mytype') == 'b')
        {
            $bid = $this->session->userdata("myid");
        }





        $data = array(
            "title" => $this->input->post("title"),
            "description" => $this->input->post("descr"),
            "eventLocationL1" => $this->input->post("adrssL1"),
            "eventLocationL2" => $this->input->post("adrssL2"),
            "userid" => $uid,
            "businessid" => $bid,
            "categoryid" => $this->input->post("category"),
            "cityid" => $this->input->post("city"),
            "startDate" => $this->input->post("startDate"),
            "endDate" => $this->input->post("endDate"),
            "startTime" => $this->input->post("startTime"),
            "endTime" => $this->input->post("endTime"),
            "editActivation" => 0,
            "picture" => 'jpg'
        );

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';

        if ($this->session->userdata('mytype') == 'u' || $this->session->userdata('mytype') == 'a')
        {

            if ($this->om->UpdateData("events", $data, array("id" => $eventid)))
            {
                $msg['msg'] = "<strong>Your event has successfully updated.Your post will be available after activation.Wait until accomplish the process.</string>";
                $this->session->set_userdata($msg);
                redirect(base_url() . "Event_Management/myEvents/" . $uid);
            }
        }

        if ($this->session->userdata('mytype') == 'b')
        {

            if ($this->om->UpdateData("events", $data, array("id" => $eventid)))
            {
                $msg['msg'] = "<strong>Your event has successfully updated.Your post will be available after activation.Wait until accomplish the process.</string>";
                $this->session->set_userdata($msg);
                redirect(base_url() . "Event_Management/myEvents/" . $bid);
            }
        }
    }

    public function newUpdateEvent()
    {
        if (!$this->session->userdata("myid") && !$this->session->userdata("mytype"))
        {
            redirect(base_url());
        }
        date_default_timezone_set('asia/dhaka');
        $this->load->helper("form");
        $this->load->helper('email');
        $this->load->library('form_validation');



        $this->form_validation->set_rules('title', 'Title', 'required|trim|min_length[10]|max_length[55]');
        $this->form_validation->set_rules('descr', 'Description', 'required|trim|min_length[50]|max_length[1000]');
        $this->form_validation->set_rules('adrssL1', 'Address line 1', 'required|trim|min_length[10]|max_length[30]');
        $this->form_validation->set_rules('adrssL2', 'Address line 2', 'required|trim|min_length[10]|max_length[30]');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('purpose', 'Purpose', 'required');
        $this->form_validation->set_rules('purchase', 'Purchase type', 'required');
        $this->form_validation->set_rules('venue', 'Venue', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('startDate', 'Start date', 'required');
        $this->form_validation->set_rules('startTime', 'Start time', 'required');
        $this->form_validation->set_rules('endTime', 'End time', 'required');
//        $this->form_validation->set_rules('pic', 'Picture', 'callback_file_selected_test');


        $eventid = $this->input->post("eventid");


//


        if (($this->form_validation->run() == TRUE))
        {

            $r = $this->om->view_data("events", "picture", array("id" => $eventid));
            foreach ($r as $p)
            {
                $old_ext = $p->picture;
            }



            if (($_FILES['pic']['name']) != "")
            {
                $ext = pathinfo($_FILES['pic']['name']);
                $ext = strtolower($ext['extension']);

                $this->form_validation->set_rules('pic', 'Picture', 'callback_file_selected_test');

                if (($this->form_validation->run() == TRUE))
                {
                    if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "tiff")
                    {
                        if (file_exists("public/eventImages/event_{$eventid}.{$old_ext}"))
                        {
                            unlink("public/eventImages/event_{$eventid}.{$old_ext}");
                        }

                        if ($ext != "")
                        {
                            echo 'Checking';


                            $this->load->library('upload');
                            $config['upload_path'] = './public/eventImages/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg';
                            $config['max_size'] = '1000000';
                            $config['max_width'] = '4048';
                            $config['max_height'] = '3500';
                            $config['file_name'] = "event_{$eventid}.{$ext}";
                            $this->upload->initialize($config); //upload image data
                            $this->upload->do_upload('pic');
                        }
                    }
                    else
                    {
                        $id = $this->session->userdata("myid");
                        $data['id'] = $id;
//            redirect(base_url("Event_Management/createEvent/" . $id));
                        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
                        $data['venueList'] = $this->om->view_with_asc("venues", "*", "id");
                        $data['purposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
                        $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
                        $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
                        if ($this->session->userdata("mytype") == "u" || $this->session->userdata("mytype") == "a")
                        {
                            $data['userById'] = $this->om->view_data("users", "*", array("id" => $id));
                            foreach ($data['userById'] as $list)
                            {
                                if ($list->activeorinactive == 0)
                                {
                                    $data['validationcheck'] = "disabled";
                                }
                                else
                                {
                                    $data['validationcheck'] = "";
                                }
                            }
                        }
                        if ($this->session->userdata("mytype") == "b")
                        {
                            $data['businessById'] = $this->om->view_data("business", "*", array("id" => $id));

                            foreach ($data['businessById'] as $list)
                            {
                                if ($list->activeorinactive == 0)
                                {
                                    $data['validationcheck'] = "disabled";
                                }
                                else
                                {
                                    $data['validationcheck'] = "";
                                }
                            }
                        }
                        $data['businessById'] = $this->om->view_data("users", "*", array("id" => $id));
//            $data['content'] = $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data, TRUE);
                        $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data);
                    }
                }
                else
                {
                    $id = $this->session->userdata("myid");
                    $data['id'] = $id;
//            redirect(base_url("Event_Management/createEvent/" . $id));
                    $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
                    $data['venueList'] = $this->om->view_with_asc("venues", "*", "id");
                    $data['purposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
                    $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
                    $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
                    if ($this->session->userdata("mytype") == "u" || $this->session->userdata("mytype") == "a")
                    {
                        $data['userById'] = $this->om->view_data("users", "*", array("id" => $id));
                        foreach ($data['userById'] as $list)
                        {
                            if ($list->activeorinactive == 0)
                            {
                                $data['validationcheck'] = "disabled";
                            }
                            else
                            {
                                $data['validationcheck'] = "";
                            }
                        }
                    }
                    if ($this->session->userdata("mytype") == "b")
                    {
                        $data['businessById'] = $this->om->view_data("business", "*", array("id" => $id));

                        foreach ($data['businessById'] as $list)
                        {
                            if ($list->activeorinactive == 0)
                            {
                                $data['validationcheck'] = "disabled";
                            }
                            else
                            {
                                $data['validationcheck'] = "";
                            }
                        }
                    }
                    $data['businessById'] = $this->om->view_data("users", "*", array("id" => $id));
//            $data['content'] = $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data, TRUE);
                    $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data);
                }
            }
            else
            {
                $ext = $old_ext;
            }



            $flag = 2;

            $price = $this->input->post("price");

            if ($price > 0)
            {
                $flag = 1;
            }

            if ($price == "")
            {
                $price = 0;
            }

            $businessid = 0;
            $userid = 10;

            if ($this->session->userdata('mytype') == 'u' || $this->session->userdata('mytype') == 'a')
            {
                $userid = $this->session->userdata("myid");
            }

            if ($this->session->userdata('mytype') == 'b')
            {
                $businessid = $this->session->userdata("myid");
            }

            $data = array(
                "title" => $this->input->post("title"),
                "description" => $this->input->post("descr"),
                "eventLocationL1" => $this->input->post("adrssL1"),
                "eventLocationL2" => $this->input->post("adrssL2"),
                "userid" => $userid,
                "businessid" => $businessid,
                "user_type" => $this->input->post("utype"),
                "categoryid" => $this->input->post("category"),
                "countryid" => $this->input->post("country"),
                "cityid" => $this->input->post("city"),
                "eventpurposeid" => $this->input->post("purpose"),
                "venueid" => $this->input->post("venue"),
                "price" => $price,
                "purchaseid" => $flag,
                "startDate" => $this->input->post("startDate"),
                "endDate" => $this->input->post("endDate"),
                "startTime" => $this->input->post("startTime"),
                "endTime" => $this->input->post("endTime"),
                "postDate" => date("Y-m-d"),
                "activation" => 1,
                "editActivation" => 0,
                "activeorinactive" => 1,
                "picture" => $ext
            );



            if ($this->om->UpdateData("events", $data, array("id" => $eventid)))
            {
//                picture upload
//                $Id = $this->om->Id;
//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/eventImages/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '1000000';
//                    $config['max_width'] = '4048';
//                    $config['max_height'] = '3500';
//                    $config['file_name'] = "event_{$eventid}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                Extra start
//                $this->om->InsertData("events", $data);
//                
//                $Id = $this->om->Id;
//
//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/eventImages/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '1000000';
//                    $config['max_width'] = '4048';
//                    $config['max_height'] = '3500';
//                    $config['file_name'] = "event_{$Id}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                
//                
//                $this->om->InsertData("events", $data);
//                
//                $Id = $this->om->Id;
//
//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/eventImages/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '1000000';
//                    $config['max_width'] = '4048';
//                    $config['max_height'] = '3500';
//                    $config['file_name'] = "event_{$Id}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                
//                
//                
//                $this->om->InsertData("events", $data);
//                
//                $Id = $this->om->Id;
//
//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/eventImages/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '1000000';
//                    $config['max_width'] = '4048';
//                    $config['max_height'] = '3500';
//                    $config['file_name'] = "event_{$Id}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                
//                
//                
//                $this->om->InsertData("events", $data);
//                
//                $Id = $this->om->Id;
//
//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/eventImages/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '1000000';
//                    $config['max_width'] = '4048';
//                    $config['max_height'] = '3500';
//                    $config['file_name'] = "event_{$Id}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                
//                
//                $this->om->InsertData("events", $data);
//                
//                $Id = $this->om->Id;
//
//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/eventImages/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '1000000';
//                    $config['max_width'] = '4048';
//                    $config['max_height'] = '3500';
//                    $config['file_name'] = "event_{$Id}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                Extra End
//                $id = $this->session->userdata("myid");
//                redirect(base_url("Event_Management/eventInsertPage/" . $id));
//                $data['id'] = $id;
//                $msg['msg'] = "Your event has successfully submitted.Wait until activation.";
//                $this->session->set_userdata($msg);
//                $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
//                $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
//                $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
//                $data['content'] = $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data, TRUE);
//                $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data, TRUE);
            }

            $msg['msg'] = "Your edit is successfully submited.<br>The post will be disappear untill admin approval.";
            $this->session->set_userdata($msg);

            redirect(base_url("Event_Management/profile/" . $this->session->userdata("myid")));
        }
        else
        {
            $id = $this->session->userdata("myid");
            $data['id'] = $id;
//            redirect(base_url("Event_Management/createEvent/" . $id));
            $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
            $data['venueList'] = $this->om->view_with_asc("venues", "*", "id");
            $data['purposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
            $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
            $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
            if ($this->session->userdata("mytype") == "u" || $this->session->userdata("mytype") == "a")
            {
                $data['userById'] = $this->om->view_data("users", "*", array("id" => $id));
                foreach ($data['userById'] as $list)
                {
                    if ($list->activeorinactive == 0)
                    {
                        $data['validationcheck'] = "disabled";
                    }
                    else
                    {
                        $data['validationcheck'] = "";
                    }
                }
            }
            if ($this->session->userdata("mytype") == "b")
            {
                $data['businessById'] = $this->om->view_data("business", "*", array("id" => $id));

                foreach ($data['businessById'] as $list)
                {
                    if ($list->activeorinactive == 0)
                    {
                        $data['validationcheck'] = "disabled";
                    }
                    else
                    {
                        $data['validationcheck'] = "";
                    }
                }
            }
            $data['businessById'] = $this->om->view_data("users", "*", array("id" => $id));
//            $data['content'] = $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data, TRUE);
            $this->load->view("frontEnd/personalAccountPanel/createEventForm", $data);
        }
    }

    public function pandingEditEventList()
    {

        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }




        $this->load->library('pagination');

        $config['base_url'] = base_url("Event_Management/pandingEditEventList");
        $config['total_rows'] = $this->om->count_pending_events(array("editActivation" => 0));
        $config['per_page'] = 5;

        //Pagination Design
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';

        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['pendingEditEventList'] = $this->om->all_edit_pending_event_pagination($config['per_page'], $this->uri->segment(3));
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));

        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
//        $data['pendingEditEventList'] = $this->om->PendingEditEventList();
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['content'] = $this->load->view("administrator/pendingEditEventRequest", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function eventDetailInfoFromAdmin()
    {

        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $id = $this->uri->segment(3);
        $data['eventDetail'] = $this->om->view_data("events", "*", array("id" => $id));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['content'] = $this->load->view("administrator/viewEventDetail", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function adminEventEdit()
    {

        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }
        $id = $this->uri->segment(3);
        $data['eventDetail'] = $this->om->view_data("events", "*", array("id" => $id));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['content'] = $this->load->view("administrator/eventEditForm", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function adminEventEditFromEditList()
    {

        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }
        $id = $this->uri->segment(3);
        $data['eventDetail'] = $this->om->view_data("events", "*", array("id" => $id));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['content'] = $this->load->view("administrator/eventEditFormFromEditList", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function updateEventByAdminFromEditEvent()
    {
        $eventid = $this->input->post("eventid");
        $userid = $this->input->post("uid");
        $usertype = $this->input->post("utype");


        $data = array(
            "title" => $this->input->post("title"),
            "description" => $this->input->post("descr"),
            "eventLocationL1" => $this->input->post("adrssL1"),
            "eventLocationL2" => $this->input->post("adrssL2"),
            "userid" => $userid,
            "user_type" => $usertype,
            "categoryid" => $this->input->post("category"),
            "cityid" => $this->input->post("city"),
            "startDate" => $this->input->post("startDate"),
            "endDate" => $this->input->post("endDate"),
            "startTime" => $this->input->post("startTime"),
            "endTime" => $this->input->post("endTime"),
            "activation" => 0,
            "picture" => 'jpg'
        );

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';


        if ($this->om->UpdateData("events", $data, array("id" => $eventid)))
        {
            $msg['msg'] = "<strong>The event is successfully updated.</string>";
            $this->session->set_userdata($msg);
            redirect(base_url() . "Event_Management/pandingEventList");
        }
    }

    public function updateEventFromEditEventList()
    {
        $eventid = $this->input->post("eventid");
        $userid = $this->input->post("uid");
        $usertype = $this->input->post("utype");


        $data = array(
            "title" => $this->input->post("title"),
            "description" => $this->input->post("descr"),
            "eventLocationL1" => $this->input->post("adrssL1"),
            "eventLocationL2" => $this->input->post("adrssL2"),
            "userid" => $userid,
            "user_type" => $usertype,
            "categoryid" => $this->input->post("category"),
            "cityid" => $this->input->post("city"),
            "startDate" => $this->input->post("startDate"),
            "endDate" => $this->input->post("endDate"),
            "startTime" => $this->input->post("startTime"),
            "endTime" => $this->input->post("endTime"),
            "editActivation" => 0,
            "picture" => 'jpg'
        );

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';


        if ($this->om->UpdateData("events", $data, array("id" => $eventid)))
        {
            $msg['msg'] = "<strong>The event is successfully updated.</string>";
            $this->session->set_userdata($msg);
            redirect(base_url() . "Event_Management/pandingEditEventList");
        }
    }

    public function editEventDelete()
    {
        $id = $this->uri->segment(3);

        $dt = $this->om->DeleteData("events", array("id" => $id));

        if ($dt)
        {
            $this->session->unset_userdata("devider");
            $empty['empty'] = 1;
            $this->session->set_userdata($empty);
            redirect(base_url() . "Event_Management/pandingEditEventList");
        }
    }

    public function allEventList()
    {

        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }


        $this->load->library('pagination');


        $config['base_url'] = base_url("Event_Management/allEventList");
        $config['total_rows'] = $this->om->count_allEvents(array("activation" => 1), array("editActivation" => 1));
        $config['per_page'] = 5;



        //Pagination Design
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';

        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);

        $data['allEventList'] = $this->om->all_event_pagination($config['per_page'], $this->uri->segment(3), array("activation" => 1), array("editActivation" => 1));


        $data['allEventListt'] = $this->om->view_with_asc("events", "*", "id");
        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allReportList'] = $this->om->view_with_asc("report", "*", "id");
        $data['allEventListSearch'] = 1;
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['content'] = $this->load->view("administrator/allEventListPage", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function viewEventFromAllEventList()
    {

        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $eventid = $this->uri->segment(3);
        $data['eventDetail'] = $this->om->view_data("events", "*", array("id" => $eventid));
        $data['allUserList'] = $this->om->view_with_asc("users", "*", "id");
        $data['allBusinessList'] = $this->om->view_with_asc("business", "*", "id");
        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allReportList'] = $this->om->view_with_asc("report", "*", "id");
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['content'] = $this->load->view("administrator/viewEventDetailFromAllEventList", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function eventEditFromAllEventlist()
    {

        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $eventid = $this->uri->segment(3);
        $data['eventDetail'] = $this->om->view_data("events", "*", array("id" => $eventid));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['content'] = $this->load->view("administrator/eventEditFormAllEvent", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function updateEventByAdminFromAllEvent()
    {
        $eventid = $this->input->post("eventid");
        $userid = $this->input->post("uid");
        $usertype = $this->input->post("utype");


        $data = array(
            "title" => $this->input->post("title"),
            "description" => $this->input->post("descr"),
            "eventLocationL1" => $this->input->post("adrssL1"),
            "eventLocationL2" => $this->input->post("adrssL2"),
            "userid" => $userid,
            "user_type" => $usertype,
            "categoryid" => $this->input->post("category"),
            "cityid" => $this->input->post("city"),
            "startDate" => $this->input->post("startDate"),
            "endDate" => $this->input->post("endDate"),
            "startTime" => $this->input->post("startTime"),
            "endTime" => $this->input->post("endTime"),
            "picture" => 'jpg'
        );

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';


        if ($this->om->UpdateData("events", $data, array("id" => $eventid)))
        {
            $msg['msg'] = "<strong>The event is successfully updated.</string>";
            $this->session->set_userdata($msg);
            redirect(base_url() . "Event_Management/allEventList");
        }
    }

    public function evntActivationAllEvent()
    {
        $eventid = $this->uri->segment(3);

        $data = array(
            "activation" => 1,
            "editActivation" => 1,
            "activeorinactive" => 1
        );

        $dt = $this->om->UpdateData("events", $data, array("id" => $eventid));

        if ($dt)
        {
            redirect(base_url() . "Event_Management/allEventList");
        }
    }

    public function evntInactiveAllEvent()
    {
        $eventid = $this->uri->segment(3);

        $data = array(
            "activeorinactive" => 0
        );

        $dt = $this->om->UpdateData("events", $data, array("id" => $eventid));

        if ($dt)
        {
            redirect(base_url() . "Event_Management/allEventList");
        }
    }

    public function evntDeleteAllEvent()
    {
        $eventid = $this->uri->segment(3);

        $dt = $this->om->DeleteData("comments", array("eventid" => $eventid));
        $dt = $this->om->DeleteData("subscribers", array("eventid" => $eventid));

        $r = $this->om->view_data("events", "picture", array("id" => $eventid));
        foreach ($r as $p)
        {
            $old_ext = $p->picture;
        }
        if (file_exists("public/eventImages/event_{$eventid}.{$old_ext}"))
        {
            echo 'Delete sucseefull';
            unlink("public/eventImages/event_{$eventid}.{$old_ext}");
        }

        $dt = $this->om->DeleteData("events", array("id" => $eventid));


        if ($dt)
        {
            redirect(base_url() . "Event_Management/allEventList");
        }
    }

    public function editEventDetailInfoFromAdmin()
    {

        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }
        $eventid = $this->uri->segment(3);
        $data['eventDetail'] = $this->om->view_data("events", "*", array("id" => $eventid));
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['content'] = $this->load->view("administrator/editEventDetailInfo", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function showEventDetail()
    {
        $id = $this->uri->segment(3);
        $data['allUserList'] = $this->om->view_with_asc("users", "*", "id");
        $data['allBusList'] = $this->om->view_with_asc("business", "*", "id");

        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");

        $data['subscribersCount'] = $this->om->view_data("subscribers", "*", array("eventid" => $id));
        $data['eventDetail'] = $this->om->view_data("events", "*", array("id" => $id));
        $data['allComments'] = $this->om->view_with_desc("comments", "*", "id");
        $data['allSubscribers'] = $this->om->view_data("subscribers", "*", array("eventid" => $id));
        $data['subscriber'] = $this->load->view("frontEnd/subscribers", $data, TRUE);
        $data['subscriberButton'] = $this->load->view("frontEnd/subscribeButton", $data, TRUE);
        $data['comment'] = $this->load->view("frontEnd/comment_page", $data, TRUE);
        $data['complain'] = $this->load->view("frontEnd/complainPage", $data, TRUE);
        $data['content'] = $this->load->view("frontEnd/eventDetailInfo", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
    }

    public function types()
    {
        $feildData = $this->uri->segment(3);
        if ($feildData)
        {
//            $data['filterdEvents'] = $this->om->view_data("events", "*", array("categoryid" => $categoryid));

            $feildName = 'categoryid';
            $feildData = $feildData;

            return redirect(base_url("Event_Management/filterResultForOneQuery/" . $feildData . "/" . $feildName));
        }
    }

    public function filter()
    {
        $categoryid = $this->input->get("category");
        $eventPurposeid = $this->input->get("purpose");
        $venueid = $this->input->get("venue");
        $purchaseid = $this->input->get("price");
        $cityid = $this->input->get("city");
//        echo '<br>';


        if ($categoryid && !$eventPurposeid && !$venueid && !$purchaseid && !$cityid)
        {
//            $data['filterdEvents'] = $this->om->view_data("events", "*", array("categoryid" => $categoryid));

            $feildName = 'categoryid';
            $feildData = $categoryid;

            return redirect(base_url("Event_Management/filterResultForOneQuery/" . $feildData . "/" . $feildName));
        }
        else if (!$categoryid && $eventPurposeid && !$venueid && !$purchaseid && !$cityid)
        {
//            echo 'Country area';
//            $data['filterdEvents'] = $this->om->view_data("events", "*", array("eventpurposeid" => $eventPurposeid));

            $feildName = 'eventpurposeid';
            $feildData = $eventPurposeid;

            return redirect(base_url("Event_Management/filterResultForOneQuery/" . $feildData . "/" . $feildName));
        }
        elseif (!$categoryid && !$eventPurposeid && $venueid && !$purchaseid && !$cityid)
        {
//            echo 'City area';
//            $data['filterdEvents'] = $this->om->view_data("events", "*", array("venueid" => $venueid));

            $feildName = 'venueid';
            $feildData = $venueid;

            return redirect(base_url("Event_Management/filterResultForOneQuery/" . $feildData . "/" . $feildName));
        }
        elseif (!$categoryid && !$eventPurposeid && !$venueid && $purchaseid && !$cityid)
        {
//            echo 'City area';
//            $data['filterdEvents'] = $this->om->view_data("events", "*", array("purchaseid" => $purchaseid));

            $feildName = 'purchaseid';
            $feildData = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForOneQuery/" . $feildData . "/" . $feildName));
        }
        elseif (!$categoryid && !$eventPurposeid && !$venueid && !$purchaseid && $cityid)
        {
//            echo 'City area';
//            $data['filterdEvents'] = $this->om->view_data("events", "*", array("purchaseid" => $purchaseid));

            $feildName = 'cityid';
            $feildData = $cityid;

            return redirect(base_url("Event_Management/filterResultForOneQuery/" . $feildData . "/" . $feildName));
        }
//        single input ends
        elseif ($categoryid && $eventPurposeid && !$venueid && !$purchaseid && !$cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_2wheres("events", "*", array("categoryid" => $categoryid), array("eventpurposeid" => $eventPurposeid));

            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'eventpurposeid';
            $feildData2 = $eventPurposeid;

            return redirect(base_url("Event_Management/filterResultForTwoQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2));
        }
        elseif ($categoryid && !$eventPurposeid && $venueid && !$purchaseid && !$cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_2wheres("events", "*", array("categoryid" => $categoryid), array("venueid" => $venueid));

            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'venueid';
            $feildData2 = $venueid;

            return redirect(base_url("Event_Management/filterResultForTwoQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2));
        }
        elseif ($categoryid && !$eventPurposeid && !$venueid && $purchaseid && !$cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_2wheres("events", "*", array("categoryid" => $categoryid), array("purchaseid" => $purchaseid));

            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'purchaseid';
            $feildData2 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForTwoQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2));
        }
        elseif (!$categoryid && $eventPurposeid && $venueid && !$purchaseid && !$cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_2wheres("events", "*", array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid));

            $feildName1 = 'eventpurposeid';
            $feildData1 = $eventPurposeid;

            $feildName2 = 'venueid';
            $feildData2 = $venueid;

            return redirect(base_url("Event_Management/filterResultForTwoQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2));
        }
        elseif (!$categoryid && $eventPurposeid && !$venueid && $purchaseid && !$cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_2wheres("events", "*", array("eventpurposeid" => $eventPurposeid), array("purchaseid" => $purchaseid));

            $feildName1 = 'eventpurposeid';
            $feildData1 = $eventPurposeid;

            $feildName2 = 'purchaseid';
            $feildData2 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForTwoQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2));
        }
        elseif (!$categoryid && !$eventPurposeid && $venueid && $purchaseid && !$cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_2wheres("events", "*", array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'venueid';
            $feildData1 = $venueid;

            $feildName2 = 'purchaseid';
            $feildData2 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForTwoQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2));
        }
        elseif (!$categoryid && $eventPurposeid && !$venueid && !$purchaseid && $cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_2wheres("events", "*", array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'eventpurposeid';
            $feildData1 = $eventPurposeid;

            $feildName2 = 'cityid';
            $feildData2 = $cityid;

            return redirect(base_url("Event_Management/filterResultForTwoQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2));
        }
        elseif (!$categoryid && !$eventPurposeid && $venueid && !$purchaseid && $cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_2wheres("events", "*", array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'venueid';
            $feildData1 = $venueid;

            $feildName2 = 'cityid';
            $feildData2 = $cityid;

            return redirect(base_url("Event_Management/filterResultForTwoQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2));
        }
        elseif (!$categoryid && !$eventPurposeid && !$venueid && $purchaseid && $cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_2wheres("events", "*", array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'purchaseid';
            $feildData1 = $purchaseid;

            $feildName2 = 'cityid';
            $feildData2 = $cityid;

            return redirect(base_url("Event_Management/filterResultForTwoQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2));
        }
        elseif ($categoryid && !$eventPurposeid && !$venueid && !$purchaseid && $cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_2wheres("events", "*", array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'cityid';
            $feildData2 = $cityid;

            return redirect(base_url("Event_Management/filterResultForTwoQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2));
        }
//        Double inputs end
        elseif ($categoryid && $eventPurposeid && $venueid && !$purchaseid && !$cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("categoryid" => $categoryid), array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid));

            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'eventpurposeid';
            $feildData2 = $eventPurposeid;

            $feildName3 = 'venueid';
            $feildData3 = $venueid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }
        elseif ($categoryid && $eventPurposeid && !$venueid && $purchaseid && !$cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("categoryid" => $categoryid), array("eventpurposeid" => $eventPurposeid), array("purchaseid" => $purchaseid));


            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'eventpurposeid';
            $feildData2 = $eventPurposeid;

            $feildName3 = 'purchaseid';
            $feildData3 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }
        elseif ($categoryid && !$eventPurposeid && $venueid && $purchaseid && !$cityid)
        {
//            echo 'Cat and cnt area';
//            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("categoryid" => $categoryid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'venueid';
            $feildData2 = $venueid;

            $feildName3 = 'purchaseid';
            $feildData3 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }
        elseif (!$categoryid && $eventPurposeid && $venueid && $purchaseid && !$cityid)
        {
//            echo 'Cat and cnt area';
            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));


            $feildName1 = 'eventpurposeid';
            $feildData1 = $eventPurposeid;

            $feildName2 = 'venueid';
            $feildData2 = $venueid;

            $feildName3 = 'purchaseid';
            $feildData3 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }
        elseif (!$categoryid && $eventPurposeid && $venueid && $purchaseid && !$cityid)
        {
//            echo 'Cat and cnt area';
            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));


            $feildName1 = 'eventpurposeid';
            $feildData1 = $eventPurposeid;

            $feildName2 = 'venueid';
            $feildData2 = $venueid;

            $feildName3 = 'purchaseid';
            $feildData3 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }
        elseif ($categoryid && !$eventPurposeid && !$venueid && $purchaseid && $cityid)
        {
//            echo 'Cat and cnt area';
            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));


            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'cityid';
            $feildData2 = $cityid;

            $feildName3 = 'purchaseid';
            $feildData3 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }
        elseif ($categoryid && !$eventPurposeid && !$venueid && $purchaseid && $cityid)
        {
//            echo 'Cat and cnt area';
            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));


            $feildName1 = 'cityid';
            $feildData1 = $cityid;

            $feildName2 = 'categoryid';
            $feildData2 = $categoryid;

            $feildName3 = 'purchaseid';
            $feildData3 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }
        elseif ($categoryid && !$eventPurposeid && $venueid && !$purchaseid && $cityid)
        {
//            echo 'Cat and cnt area';
            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));


            $feildName1 = 'cityid';
            $feildData1 = $cityid;

            $feildName2 = 'venueid';
            $feildData2 = $venueid;

            $feildName3 = 'categoryid';
            $feildData3 = $categoryid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }
        elseif (!$categoryid && !$eventPurposeid && $venueid && $purchaseid && $cityid)
        {
//            echo 'Cat and cnt area';
            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));


            $feildName1 = 'cityid';
            $feildData1 = $cityid;

            $feildName2 = 'venueid';
            $feildData2 = $venueid;

            $feildName3 = 'purchaseid';
            $feildData3 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }
        elseif ($categoryid && $eventPurposeid && !$venueid && !$purchaseid && $cityid)
        {
//            echo 'Cat and cnt area';
            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));


            $feildName1 = 'eventpurposeid';
            $feildData1 = $eventPurposeid;

            $feildName2 = 'categoryid';
            $feildData2 = $categoryid;

            $feildName3 = 'cityid';
            $feildData3 = $cityid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }
        elseif (!$categoryid && $eventPurposeid && !$venueid && $purchaseid && $cityid)
        {
//            echo 'Cat and cnt area';
            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));


            $feildName1 = 'eventpurposeid';
            $feildData1 = $eventPurposeid;

            $feildName2 = 'cityid';
            $feildData2 = $cityid;

            $feildName3 = 'purchaseid';
            $feildData3 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }
        elseif (!$categoryid && $eventPurposeid && $venueid && !$purchaseid && $cityid)
        {
//            echo 'Cat and cnt area';
            $data['filterdEvents'] = $this->om->view_data_with_3wheres("events", "*", array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));


            $feildName1 = 'eventpurposeid';
            $feildData1 = $eventPurposeid;

            $feildName2 = 'venueid';
            $feildData2 = $venueid;

            $feildName3 = 'cityid';
            $feildData3 = $cityid;

            return redirect(base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3));
        }


        //Triple input end
        elseif (!$categoryid && $eventPurposeid && $venueid && $purchaseid && $cityid)
        {
//            echo '4 wheres';
            $data['filterdEvents'] = $this->om->view_data_with_4wheres("events", "*", array("categoryid" => $categoryid), array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'cityid';
            $feildData1 = $cityid;

            $feildName2 = 'eventpurposeid';
            $feildData2 = $eventPurposeid;

            $feildName3 = 'venueid';
            $feildData3 = $venueid;

            $feildName4 = 'purchaseid';
            $feildData4 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForFourQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3 . "/" . $feildData4 . "/" . $feildName4));
        }
        elseif ($categoryid && $eventPurposeid && $venueid && !$purchaseid && $cityid)
        {
//            echo '4 wheres';
            $data['filterdEvents'] = $this->om->view_data_with_4wheres("events", "*", array("categoryid" => $categoryid), array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'eventpurposeid';
            $feildData2 = $eventPurposeid;

            $feildName3 = 'venueid';
            $feildData3 = $venueid;

            $feildName4 = 'cityid';
            $feildData4 = $cityid;

            return redirect(base_url("Event_Management/filterResultForFourQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3 . "/" . $feildData4 . "/" . $feildName4));
        }
        elseif ($categoryid && $eventPurposeid && !$venueid && $purchaseid && $cityid)
        {
//            echo '4 wheres';
            $data['filterdEvents'] = $this->om->view_data_with_4wheres("events", "*", array("categoryid" => $categoryid), array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'eventpurposeid';
            $feildData2 = $eventPurposeid;

            $feildName3 = 'cityid';
            $feildData3 = $cityid;

            $feildName4 = 'purchaseid';
            $feildData4 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForFourQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3 . "/" . $feildData4 . "/" . $feildName4));
        }
        elseif ($categoryid && !$eventPurposeid && $venueid && $purchaseid && $cityid)
        {
//            echo '4 wheres';
            $data['filterdEvents'] = $this->om->view_data_with_4wheres("events", "*", array("categoryid" => $categoryid), array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'cityid';
            $feildData2 = $cityid;

            $feildName3 = 'venueid';
            $feildData3 = $venueid;

            $feildName4 = 'purchaseid';
            $feildData4 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForFourQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3 . "/" . $feildData4 . "/" . $feildName4));
        }
        elseif ($categoryid && $eventPurposeid && $venueid && $purchaseid && !$cityid)
        {
//            echo '4 wheres';
            $data['filterdEvents'] = $this->om->view_data_with_4wheres("events", "*", array("categoryid" => $categoryid), array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'eventpurposeid';
            $feildData2 = $eventPurposeid;

            $feildName3 = 'venueid';
            $feildData3 = $venueid;

            $feildName4 = 'purchaseid';
            $feildData4 = $purchaseid;

            return redirect(base_url("Event_Management/filterResultForFourQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3 . "/" . $feildData4 . "/" . $feildName4));
        }
//        Four input end
        elseif ($categoryid && $eventPurposeid && $venueid && $purchaseid && $cityid)
        {
//            echo '4 wheres';
            $data['filterdEvents'] = $this->om->view_data_with_4wheres("events", "*", array("categoryid" => $categoryid), array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'categoryid';
            $feildData1 = $categoryid;

            $feildName2 = 'eventpurposeid';
            $feildData2 = $eventPurposeid;

            $feildName3 = 'venueid';
            $feildData3 = $venueid;

            $feildName4 = 'purchaseid';
            $feildData4 = $purchaseid;

            $feildName5 = 'cityid';
            $feildData5 = $cityid;

            return redirect(base_url("Event_Management/filterResultForFiveQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3 . "/" . $feildData4 . "/" . $feildName4 . "/" . $feildData5 . "/" . $feildName5));
        }


        //Five input end
        else
        {
            $data['filterdEvents'] = $this->om->view_data_with_4wheres("events", "*", array("categoryid" => $categoryid), array("eventpurposeid" => $eventPurposeid), array("venueid" => $venueid), array("purchaseid" => $purchaseid));

            $feildName1 = 'categoryid';
            $feildData1 = 0;

            $feildName2 = 'eventpurposeid';
            $feildData2 = 0;

            $feildName3 = 'venueid';
            $feildData3 = 0;

            $feildName4 = 'purchaseid';
            $feildData4 = 0;

            $feildName5 = 'cityid';
            $feildData5 = 0;

            return redirect(base_url("Event_Management/filterResultForFiveQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3 . "/" . $feildData4 . "/" . $feildName4 . "/" . $feildData5 . "/" . $feildName5));
        }


//        echo '<pre>';
//        print_r($data['filterdEvents']);
//        echo '</pre>';

        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
//        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
        $data['calender'] = $this->load->view("frontEnd/calender", $data, TRUE);
        $data['content'] = $this->load->view("frontEnd/filterdEventsList", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
    }

    public function filterResultForFiveQuery($feildData1, $feildName1, $feildData2, $feildName2, $feildData3, $feildName3, $feildData4, $feildName4, $feildData5, $feildName5)
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url("Event_Management/filterResultForFiveQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3 . "/" . $feildData4 . "/" . $feildName4 . "/" . $feildData5 . "/" . $feildName5);
        $config['per_page'] = 2;
        $config['total_rows'] = $this->om->count_filterResultForFiveQuery(array($feildName1 => $feildData1), array($feildName2 => $feildData2), array($feildName3 => $feildData3), array($feildName4 => $feildData4), array($feildName5 => $feildData5), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));

        //Pagination Design
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';

        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

//        design end

        $this->pagination->initialize($config);

        $data['filterdEvents'] = $this->om->filterResultForFiveQuery_pagination($config['per_page'], $this->uri->segment(11), array($feildName1 => $feildData1), array($feildName2 => $feildData2), array($feildName3 => $feildData3), array($feildName4 => $feildData4), array($feildName5 => $feildData5), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));


        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['cityid'] = 0;
        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
        $data['calender'] = $this->load->view("frontEnd/calender", $data, TRUE);
        $data['content'] = $this->load->view("frontEnd/filterdEventsList", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
    }

    public function filterResultForOneQuery($feildData, $feildName)
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url("Event_Management/filterResultForOneQuery/" . $feildData . "/" . $feildName);
        $config['per_page'] = 5;
        $config['total_rows'] = $this->om->count_filterResultForOneQuery(array($feildName => $feildData), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));

        //Pagination Design
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';

        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

//        design end

        $this->pagination->initialize($config);

        $data['filterdEvents'] = $this->om->filterResultForOneQuery_pagination($config['per_page'], $this->uri->segment(5), array($feildName => $feildData), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));


        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['cityid'] = 0;
        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
        $data['calender'] = $this->load->view("frontEnd/calender", $data, TRUE);
        $data['content'] = $this->load->view("frontEnd/filterdEventsList", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
    }

    public function filterResultForTwoQuery($feildData1, $feildName1, $feildData2, $feildName2)
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url("Event_Management/filterResultForTwoQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2);
        $config['per_page'] = 5;
        $config['total_rows'] = $this->om->count_filterResultForTwoQuery(array($feildName1 => $feildData1), array($feildName2 => $feildData2), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));

        //Pagination Design
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';

        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

//        design end

        $this->pagination->initialize($config);

        $data['filterdEvents'] = $this->om->filterResultForTwoQuery_pagination($config['per_page'], $this->uri->segment(7), array($feildName1 => $feildData1), array($feildName2 => $feildData2), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));


        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['cityid'] = 0;
        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
        $data['calender'] = $this->load->view("frontEnd/calender", $data, TRUE);
        $data['content'] = $this->load->view("frontEnd/filterdEventsList", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
    }

    public function filterResultForThreeQuery($feildData1, $feildName1, $feildData2, $feildName2, $feildData3, $feildName3)
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url("Event_Management/filterResultForThreeQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3);
        $config['per_page'] = 5;
        $config['total_rows'] = $this->om->count_filterResultForThreeQuery(array($feildName1 => $feildData1), array($feildName2 => $feildData2), array($feildName3 => $feildData3), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));

        //Pagination Design
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';

        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

//        design end

        $this->pagination->initialize($config);

        $data['filterdEvents'] = $this->om->filterResultForThreeQuery_pagination($config['per_page'], $this->uri->segment(9), array($feildName1 => $feildData1), array($feildName2 => $feildData2), array($feildName3 => $feildData3), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));


        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['cityid'] = 0;
        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
        $data['calender'] = $this->load->view("frontEnd/calender", $data, TRUE);
        $data['content'] = $this->load->view("frontEnd/filterdEventsList", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
    }

    public function filterResultForFourQuery($feildData1, $feildName1, $feildData2, $feildName2, $feildData3, $feildName3, $feildData4, $feildName4)
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url("Event_Management/filterResultForFourQuery/" . $feildData1 . "/" . $feildName1 . "/" . $feildData2 . "/" . $feildName2 . "/" . $feildData3 . "/" . $feildName3 . "/" . $feildData4 . "/" . $feildName4);
        $config['per_page'] = 5;
        $config['total_rows'] = $this->om->count_filterResultForFourQuery(array($feildName1 => $feildData1), array($feildName2 => $feildData2), array($feildName3 => $feildData3), array($feildName4 => $feildData4), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));

        //Pagination Design
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';

        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

//        design end

        $this->pagination->initialize($config);

        $data['filterdEvents'] = $this->om->filterResultForFourQuery_pagination($config['per_page'], $this->uri->segment(11), array($feildName1 => $feildData1), array($feildName2 => $feildData2), array($feildName3 => $feildData3), array($feildName4 => $feildData4), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));


        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['cityid'] = 0;
        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
        $data['calender'] = $this->load->view("frontEnd/calender", $data, TRUE);
        $data['content'] = $this->load->view("frontEnd/filterdEventsList", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
    }

    public function searchTags($query)
    {
        return redirect("Event_Management/searchResults/$query");
    }

    public function search()
    {
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('search', 'Search', 'required');

        if ($this->form_validation->run())
        {
            $query = $this->input->post("search");


            return redirect("Event_Management/searchResults/$query");

//            $data['searchResult'] = $this->om->event_search_bytitle($query);
//            echo '<pre>';
//            print_r($data['searchResult']);
//            echo '</pre>';
        }
        else
        {
            $msg['msg'] = form_error("search", "<p><span>", "</span></p>");
            $this->session->set_userdata($msg);
            redirect(base_url());
        }
    }

    public function searchResults($query)
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url() . "Event_Management/searchResults/" . $query;
        $config['per_page'] = 5;
        $config['total_rows'] = $this->om->count_search_results($query, array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));
        //Pagination Design


        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';

        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);
        $data['searchResult'] = $this->om->event_search_bytitle($query, $config['per_page'], $this->uri->segment(4), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));


        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
        $data['calender'] = $this->load->view("frontEnd/calender", $data, TRUE);
        $data['content'] = $this->load->view("frontEnd/searchResultPage", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
    }

    public function searchByDates()
    {
        $date = $this->uri->segment(3);

//        $data['calenderResult'] = $this->om->view_data("events", "*", array("startDate" => $date));


        return redirect("Event_Management/searchResultsByDate/$date");

//        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
//        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");
//        $data['calender'] = $this->load->view("frontEnd/calender", $data, TRUE);
//        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
//        $data['content'] = $this->load->view("frontEnd/calenderResultPage", $data, TRUE);
//        $this->load->view('frontEnd/master', $data);
    }

    public function searchResultsByDate($query)
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url() . "Event_Management/searchResultsByDate/" . $query;
        $config['per_page'] = 5;
        $config['total_rows'] = $this->om->count_search_results_dates($query);
        //Pagination Design


        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';

        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);
        $data['calenderResult'] = $this->om->event_search_bydate($query, $config['per_page'], $this->uri->segment(4));


        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['calender'] = $this->load->view("frontEnd/calender", $data, TRUE);
        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['content'] = $this->load->view("frontEnd/calenderResultPage", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
    }

    public function comment_post()
    {
//        print_r($_REQUEST);
        $checkJS = $this->input->post("temp_id");


        if ($checkJS)
        {

            $text = $this->input->post("text");
            $userId = $this->input->post("userId");
            $eventId = $this->input->post("eventId");



            //User Name

            $data['allUserList'] = $this->om->view_data("users", "*", array("id" => $userId));

            foreach ($data['allUserList'] as $list)
            {
                $userName = $list->name;
            }

            $data = array(
                "comment" => $text,
                "eventid" => $eventId,
                "userid" => $userId,
                "postDate" => date("Y-m-d H:i:s")
            );

            if ($data)
            {
                $this->om->InsertData("comments", $data);
            }



            $std = new stdClass();

            $std->userId = $userId;
            $std->comment_Id = $this->om->Id;
            $std->userName = $userName;
            $std->text = $text;
            $std->eventId = $eventId;
            $std->time = 'Just Now';




            echo json_encode($std);
        }
        else
        {
            echo 'Please turn on javascript in your browser.';
        }
    }

    public function comment_delete()
    {
//        print_r($_REQUEST);

        $comment_id = $this->input->post("commentId");

        $this->om->DeleteData("comments", array("id" => $comment_id));

        $std = new stdClass();

        $std->alert = "Comment Delete ID: ";
        $std->comment_id = $comment_id;

        echo json_encode($std);
    }

    public function subscribe()
    {

        $flag = 1;

        $subscriberid = $this->input->post("subscriberId");
        $subscriberType = $this->input->post("userType");
        $eventid = $this->input->post("eventId");

        $data['allSubscribers'] = $this->om->view_data_subscribers("subscribers", "*", array("eventid" => $eventid), array("user_type" => $subscriberType));

        foreach ($data['allSubscribers'] as $sublist)
        {
            if ($sublist->userid == $subscriberid && $sublist->eventid == $eventid && $sublist->user_type == $subscriberType)
            {
                $flag = 0;
            }
        }


        $data = array(
            "eventid" => $eventid,
            "userid" => $subscriberid,
            "user_type" => $subscriberType,
        );

        if ($flag == 1)
        {
            $this->om->InsertData("subscribers", $data);
            $insertId = $this->om->Id;
        }

        if ($this->session->userdata("mytype") == 'u' || $this->session->userdata("mytype") == 'a')
        {
            $data['allUserList'] = $this->om->view_data("users", "id,name", array("id" => $subscriberid));
        }

        if ($this->session->userdata("mytype") == 'b')
        {
            $data['allUserList'] = $this->om->view_data("business", "id,business_title", array("id" => $subscriberid));
        }

        foreach ($data['allUserList'] as $list)
        {
            if ($this->session->userdata("mytype") == 'u' || $this->session->userdata("mytype") == 'a')
            {
                $userName = $list->name;
            }
            if ($this->session->userdata("mytype") == 'b')
            {
                $userName = $list->business_title;
            }
        }

        $std = new stdClass();

        $std->flag = $flag;
        $std->insertId = $insertId;
        $std->userId = $subscriberid;
        $std->userName = $userName;
        $std->eventId = $eventid;


        echo json_encode($std);
    }

    public function unsubscribeclick()
    {
        $flag = 1;

        $subscriberid = $this->input->post("subscriberId");
        $subscriberType = $this->input->post("userType");
        $eventid = $this->input->post("eventId");

        $data['allSubscribers'] = $this->om->view_data_subscribers("subscribers", "*", array("eventid" => $eventid), array("user_type" => $subscriberType));

        foreach ($data['allSubscribers'] as $sublist)
        {
            if ($sublist->userid == $subscriberid && $sublist->eventid == $eventid && $sublist->user_type == $subscriberType)
            {
                $id = $sublist->id;
                $flag = 0;
            }
        }


        $data = array(
            "eventid" => $eventid,
            "userid" => $subscriberid
        );

        if ($flag == 0)
        {
            $this->om->DeleteData("subscribers", array("id" => $id));
        }


        $data['allUserList'] = $this->om->view_data("users", "id,name", array("id" => $subscriberid));

        foreach ($data['allUserList'] as $list)
        {
            $userName = $list->name;
        }

        $std = new stdClass();

        $std->flag = $flag;
        $std->id = $id;
        $std->userId = $subscriberid;
        $std->userName = $userName;
        $std->eventId = $eventid;


        echo json_encode($std);
    }

    public function subscriberList()
    {
        $eventid = $this->uri->segment(3);

        $data['allSubscribers'] = $this->om->view_data("subscribers", "*", array("eventid" => $eventid));
        $data['allUserList'] = $this->om->view_with_asc("users", "*", "id");

        $data['content'] = $this->load->view("frontEnd/subscriberList", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
    }

    public function unsubscribe()
    {
        echo $id = $this->uri->segment(3);
        echo $eventid = $this->uri->segment(4);

        $this->om->DeleteData("subscribers", array("id" => $id));

        redirect(base_url("Event_Management/subscriberList/" . $eventid));
    }

    public function createEvent()
    {
        $id = $this->uri->segment(3);

        if ($this->session->userdata('myid') != $id)
        {
            redirect("Home/errorPage");
        }


        $data['id'] = $id;
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['venueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['purposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['cityList'] = $this->om->view_with_asc("cities", "*", "id");
        if ($this->session->userdata("mytype") == "u" || $this->session->userdata("mytype") == "a")
        {
            $data['userById'] = $this->om->view_data("users", "*", array("id" => $id));
            foreach ($data['userById'] as $list)
            {
                if ($list->activeorinactive == 0)
                {
                    $data['validationcheck'] = "disabled";
                }
                else
                {
                    $data['validationcheck'] = "";
                }
            }
        }
        if ($this->session->userdata("mytype") == "b")
        {
            $data['businessById'] = $this->om->view_data("business", "*", array("id" => $id));

            foreach ($data['businessById'] as $list)
            {
                if ($list->activeorinactive == 0)
                {
                    $data['validationcheck'] = "disabled";
                }
                else
                {
                    $data['validationcheck'] = "";
                }
            }
        }
//        $data['content'] = $this->load->view("frontEnd/personalAccountPanel/eventInsertPage", $data, TRUE);
        $this->load->view('frontEnd/personalAccountPanel/createEventForm', $data);
    }

    public function profile()
    {
        if (!$this->session->userdata("mytype"))
        {
            redirect(base_url());
        }
        $id = $this->uri->segment(3);
        $type = $this->session->userdata("mytype");
        $data['allComments'] = $this->om->view_with_desc("comments", "*", "id");
        $data['allUserList'] = $this->om->view_with_asc("users", "*", "id");
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");



        if ($this->session->userdata("mytype") == "u")
        {
            $data['userInfo'] = $this->om->view_data("users", "*", array("id" => $id));
            $data['eventListById'] = $this->om->view_data("events", "*", array("userid" => $id));
            $data['allSubscribList'] = $this->om->view_data("subscribers", "*", array("userid" => $id));
        }

        if ($this->session->userdata("mytype") == "a")
        {
            $data['userInfo'] = $this->om->view_data("users", "*", array("id" => $id));
            $data['eventListById'] = $this->om->view_data("events", "*", array("userid" => $id));
            $data['allSubscribList'] = $this->om->view_data("subscribers", "*", array("userid" => $id));
        }

        if ($this->session->userdata("mytype") == "b")
        {
            $data['userInfo'] = $this->om->view_data("business", "*", array("id" => $id));
            $data['eventListById'] = $this->om->view_data("events", "*", array("businessid" => $id));
            $data['allSubscribList'] = $this->om->view_data("subscribers", "*", array("userid" => $id));
        }


//        $data['content'] = $this->load->view('frontEnd/personalAccountPanel/personalDashboard', $data, TRUE);
        $this->load->view('frontEnd/personalAccountPanel/personalDashboard', $data);


//        $this->load->view('frontEnd/personalAccountPanel/personalDashboard', $data);
    }

    public function get_events()
    {
        $page = $_GET['page'];
        $events = $this->om->getEventsList($page);

        foreach ($events as $eList)
        {
            echo '                    <li class="events">';
            echo '                            <div class="date-section">';
            echo '                                <div class="date-day">22</div>';
            echo '                                <div class="date-month">Jan,18</div>';
            echo '                            </div>';
            echo '                            <div class="details-section">';
            echo '                                <div class="event-image" style=""></div>';
            echo '                                <div class="event-details">';
            echo '                                    <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#" class="event-name"><h4>Title Title</h4></a>';
            echo '                                    <p class="organizer">Organized By: <a href="<?php echo base_url(); ?>public/frontEndDesign/userAccPanel/new/#">Darryl Stephens</a></p>';
            echo '                                    <p class="short-details">';
            echo '                                        Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placehol';
            echo '                                    </p>';
            echo '                                    <div class="time-location">';
            echo '                                        <span class="detail"><i class="la la-clock-o"></i> Saturday, 10:30 am - 5:30 pm</span>';
            echo '                                        <span class="detail"><i class="la la-map-marker"></i> Woodstock</span>';
            echo '                                    </div>';
            echo '                                </div>';
            echo '                            </div>';
            echo '                            <div class="action-section">';
            echo '                                <div class="cost">$35</div>';
            echo '                                <button class="btn btn-sm join">Join</button>';
            echo '                            </div>';
            echo '                        </li>';
        }
        exit;
    }

    public function browseAllEvents()
    {
        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");

        $cityid = $this->input->get("cityid");


        if (!$cityid)
        {
//            $cityid = 2;
            foreach ($data['allCityList'] as $list)
            {
                if ($list->city_name == 'berlin' || $list->city_name == 'Berlin')
                {
                    $cityid = $list->id;
                }
            }
        }
        else
        {
            $cityid = $cityid;
        }
//        echo $cityid;
//        return redirect(base_url("Event_Management/browseAll"));



        $feildName = 'cityid';
        $feildData = $cityid;

        return redirect(base_url("Event_Management/filterResultForAllQuery/" . $feildData . "/" . $feildName));
    }

    public function filterResultForAllQuery($feildData, $feildName)
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url("Event_Management/filterResultForAllQuery/" . $feildData . "/" . $feildName);
        $config['per_page'] = 5;
        $config['total_rows'] = $this->om->count_filterResultForOneQuery(array($feildName => $feildData), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));

        //Pagination Design
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';

        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";

        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

//        design end

        $this->pagination->initialize($config);

        $data['filterdEvents'] = $this->om->filterResultForOneQuery_pagination($config['per_page'], $this->uri->segment(5), array($feildName => $feildData), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));


        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['cityid'] = $feildData;
        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");
        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
        $data['calender'] = $this->load->view("frontEnd/calender", $data, TRUE);
        $data['content'] = $this->load->view("frontEnd/filterdEventsList", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
    }

    public function browseAll()
    {
//        $this->load->library('pagination');
//
//
//        $config['base_url'] = base_url("Event_Management/browseAll");
//        $config['total_rows'] = $this->om->count_active_events(array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));
//        $config['per_page'] = 4;
//
//        //Pagination Design
//        $config["full_tag_open"] = '<ul class="pagination">';
//        $config["full_tag_close"] = '</ul>';
//
//        $config["first_link"] = "&laquo;";
//        $config["first_tag_open"] = "<li>";
//        $config["first_tag_close"] = "</li>";
//
//        $config["last_link"] = "&raquo;";
//        $config["last_tag_open"] = "<li>";
//        $config["last_tag_close"] = "</li>";
//
//        $config['next_link'] = 'Next';
//        $config['next_tag_open'] = '<li>';
//        $config['next_tag_close'] = '<li>';
//
//        $config['prev_link'] = 'Prev';
//        $config['prev_tag_open'] = '<li>';
//        $config['prev_tag_close'] = '<li>';
//        $config['cur_tag_open'] = '<li class="active"><a href="#">';
//        $config['cur_tag_close'] = '</a></li>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '</li>';
//
//        $this->pagination->initialize($config);
//
//        $data['result'] = $this->om->all_event_pagination($config['per_page'], $this->uri->segment(3), array("activation" => 1), array("editActivation" => 1), array("activeorinactive" => 1));
//
//        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
//        $data['allEventPurposeList'] = $this->om->view_with_asc("eventPurpose", "*", "id");
//        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
//        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
//        $data['allCityList'] = $this->om->view_with_asc("cities", "*", "id");
//        $data['calender'] = $this->load->view("frontEnd/calender", $data, TRUE);
//        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
//        $data['content'] = $this->load->view("frontEnd/browseAllEventPage", $data, TRUE);
//        $this->load->view('frontEnd/master', $data);
    }

    public function dates()
    {
//        header('Content-Type: application/json');

        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");

        foreach ($data['allEventList'] as $rows)
        {
            if ($rows->activation == 1 && $rows->editActivation == 1 && $rows->activeorinactive == 1)
            {
                $date[] = $rows->startDate;
            }
        }
//        print_r($date);


        for ($i = 0; $i < sizeof($date); $i++)
        {
//            echo $date[$i];
            $date[$i] = date("Y-n-j", strtotime($date[$i]));
        }

        $std = new stdClass();

        $std->date = $date;


        echo json_encode($std);
    }

    public function report()
    {
        $flag = 1;
        $report = $this->input->post("report");
        $complainerid = $this->input->post("complainerid");
        $eventid = $this->input->post("eventid");
        $guiltyid = $this->input->post("guiltyid");
        $guiltyType = $this->input->post("guiltyType");
        $complain = $this->input->post("complain");

        $data['reportData'] = $this->om->view_with_asc("report", "*", "id");

//        print_r($data);


        foreach ($data['reportData'] as $list)
        {
            if ($list->event_id == $eventid && $list->complainer_id == $complainerid)
            {
                $flag = 0;
            }
        }

        if ($flag == 0)
        {
            $std = new stdClass();
            $std->exist = 'Alredy reported';

            echo json_encode($std);
        }
        elseif (strlen($complain) > 50)
        {
            $std = new stdClass();
            $std->limit = 'Max letter 50.';

            echo json_encode($std);
        }
        elseif ($report == 'undefined')
        {
            $std = new stdClass();
            $std->report = 'Invalid report';

            echo json_encode($std);
        }
        else
        {
            $data = array(
                "report" => $report,
                "complainer_id" => $complainerid,
                "event_id" => $eventid,
                "guilty_id" => $guiltyid,
                "guilty_type" => $guiltyType,
                "comment" => $complain,
                "show" => 0
            );
            $this->om->InsertData("report", $data);

            $std = new stdClass();
            $std->submitReport = 'Report submited.';

            echo json_encode($std);
        }
    }

    public function showReportList()
    {
        if ($this->session->userdata("mytype") != 'a')
        {
            redirect(base_url("Home/errorPage"));
        }

        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;



        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allBusinessListSearch'] = 1;
        $data['allReportList'] = $this->om->view_with_desc("report", "*", "id");
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['allUserList'] = $this->om->view_with_asc("users", "*", "id");
        $data['content'] = $this->load->view("administrator/reportListPage", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function reportDetail()
    {
        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }

        $eventid = $this->uri->segment(3);
        $reportid = $this->uri->segment(4);

        $data = array(
            "show" => 1
        );

        $dt = $this->om->UpdateData("report", $data, array("id" => $reportid));

        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;
        $data['eventDetail'] = $this->om->view_data("events", "*", array("id" => $eventid));
        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['reportById'] = $this->om->view_data("report", "*", array("event_id" => $eventid));
        $data['allReportList'] = $this->om->view_with_asc("report", "*", "id");
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['content'] = $this->load->view("administrator/reportDetailPage", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function reportDisapprove()
    {
        $eventid = $this->uri->segment(3);

        $data = array(
            "activeorinactive" => 0
        );

        $dt = $this->om->UpdateData("events", $data, array("id" => $eventid));

        if ($dt)
        {
            redirect(base_url() . "Event_Management/reportDetail/" . $eventid);
        }
    }

    public function reportDelete()
    {
        $reportid = $this->uri->segment(3);

        $dt = $this->om->DeleteData("report", array("id" => $reportid));

        if ($dt)
        {
            redirect(base_url() . "Event_Management/showReportList");
        }
    }

    public function reportApprove()
    {
        $eventid = $this->uri->segment(3);

        $data = array(
            "activeorinactive" => 1
        );

        $dt = $this->om->UpdateData("events", $data, array("id" => $eventid));

        if ($dt)
        {
            redirect(base_url() . "Event_Management/reportDetail/" . $eventid);
        }
    }

    public function userSearch()
    {
        if ($this->session->userdata("mytype") != 'a')
        {
            redirect(base_url());
        }

        $query = $this->input->post("usearch");


        $data['usearchResult'] = $this->om->search_user($query);


//        print_r($data);
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;

        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['content'] = $this->load->view("administrator/userSearchList", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function businessSearch()
    {
        if ($this->session->userdata("mytype") != 'a')
        {
            redirect(base_url());
        }

        $query = $this->input->post("bsearch");


        $data['bsearchResult'] = $this->om->business_user($query);


//        print_r($data);
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;

        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['content'] = $this->load->view("administrator/businessSearchList", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function eventSearch()
    {
        if ($this->session->userdata("mytype") != 'a')
        {
            redirect(base_url());
        }

        $query = $this->input->post("esearch");

        $data['esearchResult'] = $this->om->event_search_admin($query);

//        print_r($data);
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;

        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['content'] = $this->load->view("administrator/eventSearchList", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function editProf()
    {
        if ($this->session->userdata("mytype") == "")
        {
            redirect(base_url());
        }

        $userid = $this->uri->segment(3);


        if ($this->session->userdata("myid") != $userid)
        {
            redirect(base_url());
        }

        if ($this->session->userdata("mytype") == 'u' || $this->session->userdata("mytype") == 'a')
        {
            $data['userInfo'] = $this->om->view_data("users", "*", array("id" => $userid));
            $data['content'] = $this->load->view("frontEnd/personalAccountPanel/editProfPage", $data, TRUE);
            $this->load->view("frontEnd/master", $data);
        }
    }

    public function editProfPageBusiness()
    {
        if ($this->session->userdata("mytype") == "")
        {
            redirect(base_url());
        }

        $userid = $this->uri->segment(3);


        if ($this->session->userdata("myid") != $userid)
        {
            redirect(base_url());
        }


        $data['userInfo'] = $this->om->view_data("business", "*", array("id" => $userid));
        $data['content'] = $this->load->view("frontEnd/personalAccountPanel/editProfPageBusiness", $data, TRUE);
        $this->load->view("frontEnd/master", $data);
    }

    public function updateProf()
    {
        $uid = $this->input->post("uid");
        $uname = $this->input->post("uname");
        $pass = $this->input->post("pass");

        if ($uname && $this->session->userdata("mytype") == 'u' || $this->session->userdata("mytype") == 'a')
        {
            $data = array(
                "name" => $uname
            );
        }

        if ($pass && $this->session->userdata("mytype") == 'u' || $this->session->userdata("mytype") == 'a')
        {
            $data = array(
                "password" => md5($pass)
            );
        }
//        business

        if ($uname && $this->session->userdata("mytype") == 'b')
        {
            $data = array(
                "business_title" => $uname
            );
        }

        if ($pass && $this->session->userdata("mytype") == 'b')
        {
            $data = array(
                "password" => md5($pass)
            );
        }

        if ($this->session->userdata("mytype") == 'u' || $this->session->userdata("mytype") == 'a')
        {
            $dt = $this->om->UpdateData("users", $data, array("id" => $uid));
        }

        if ($this->session->userdata("mytype") == 'b')
        {
            $dt = $this->om->UpdateData("business", $data, array("id" => $uid));
        }

        if ($dt)
        {

            $msg['msg'] = "Update successfully";
            $this->session->set_userdata($msg);
            redirect(base_url("Event_Management/profile/" . $uid));
        }
    }

}
