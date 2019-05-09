<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EventPurpose_Management extends CI_Controller
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
        $data['content'] = $this->load->view("administrator/eventPurposeInsert", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function viewPurposeList()
    {
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['purposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['content'] = $this->load->view("administrator/purposeListView", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function insert()
    {
//            echo 'Country Insert';

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('purpose', 'Purpose', 'required|trim|max_length[15]');


        if ($this->form_validation->run() == TRUE)
        {
            $data = array(
                "purpose_type" => $this->input->post("purpose")
            );

            if ($this->om->InsertData("eventpurpose", $data))
            {
                $msg['msg'] = "Event purpose Info Saved.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/EventPurpose_Management");
            }
        }
        else
        {
            $data['allEventListSearch'] = 0;
            $data['allUserListSearch'] = 0;
            $data['allBusinessListSearch'] = 0;


            $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
            $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
            $data['content'] = $this->load->view("administrator/eventPurposeInsert", 1, TRUE);
            $this->load->view('administrator/adminMaster', $data);
        }
    }

    public function editPurposeData()
    {
        $id = $this->uri->segment(4);
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['purposeDataById'] = $this->om->view_data("eventpurpose", "*", array("id" => $id));
        $data['content'] = $this->load->view("administrator/purposeDataEdit", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function update()
    {
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('purpose', 'Purpose', 'required|trim|max_length[15]');


        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post("purposeid");
            $data = array(
                "purpose_type" => $this->input->post("purpose")
            );

            if ($this->om->UpdateData("eventpurpose", $data, array("id" => $id)))
            {
                $msg['msg'] = "Purpose info update successfully.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/EventPurpose_Management/viewPurposeList");
            }
        }
        else
        {
            $msg['msg'] = "Purpose info not updated.";
            $this->session->set_userdata($msg);
            redirect(base_url() . "administrator/EventCategory_Management/viewPurposeList");
        }
    }

}
