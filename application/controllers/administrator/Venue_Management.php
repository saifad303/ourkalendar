<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Venue_Management extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }
    }

    public function index()
    {
//            echo 'Admin';
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['content'] = $this->load->view("administrator/venueTypeInsert", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function viewVenueList()
    {
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['venueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['content'] = $this->load->view("administrator/venueListView", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function insert()
    {
//            echo 'Country Insert';

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('venue', 'Venue', 'required|trim|max_length[15]');


        if ($this->form_validation->run() == TRUE)
        {
            $data = array(
                "venue_type" => $this->input->post("venue")
            );

            if ($this->om->InsertData("venues", $data))
            {
                $msg['msg'] = "Event venue Info Saved.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/Venue_Management");
            }
        }
        else
        {
            $data['allEventListSearch'] = 0;
            $data['allUserListSearch'] = 0;
            $data['allBusinessListSearch'] = 0;


            $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
            $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
            $data['content'] = $this->load->view("administrator/venueTypeInsert", 1, TRUE);
            $this->load->view('administrator/adminMaster', $data);
        }
    }

    public function editVenueData()
    {
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $id = $this->uri->segment(4);
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['venueDataById'] = $this->om->view_data("venues", "*", array("id" => $id));
        $data['content'] = $this->load->view("administrator/venueDataEdit", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function update()
    {
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('venue', 'Venue', 'required|trim|max_length[15]');


        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post("venueid");
            $data = array(
                "venue_type" => $this->input->post("venue")
            );

            if ($this->om->UpdateData("venues", $data, array("id" => $id)))
            {
                $msg['msg'] = "Venue info update successfully.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/Venue_Management/viewVenueList");
            }
        }
        else
        {
            $msg['msg'] = "Category info not updated.";
            $this->session->set_userdata($msg);
            redirect(base_url() . "administrator/Venue_Management/viewVenueList");
        }
    }

}
