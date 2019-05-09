<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BusinessSubtype_Management extends CI_Controller
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
        $data['typeList'] = $this->om->view_with_asc("business_types", "*", "id");
        $data['content'] = $this->load->view("administrator/businessSubtypeInsert", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function viewSubtypeList()
    {
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['subtypeList'] = $this->om->view_subtypes();
        $data['content'] = $this->load->view("administrator/businessSubtypeView", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function insert()
    {
//            echo 'Country Insert';

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subtype', 'Subtype', 'required|trim|max_length[15]');
        $this->form_validation->set_rules('typeid', 'Type selection', 'required|trim');


        if ($this->form_validation->run() == TRUE)
        {
            $data = array(
                "subtype_name" => $this->input->post("subtype"),
                "typeid" => $this->input->post("typeid")
            );

            if ($this->om->InsertData("business_subtypes", $data))
            {
                $msg['msg'] = "Subtype Info Saved.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/BusinessSubtype_Management");
            }
        }
        else
        {
            $data['allEventListSearch'] = 0;
            $data['allUserListSearch'] = 0;
            $data['allBusinessListSearch'] = 0;


            $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
            $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
            $data['typeList'] = $this->om->view_with_asc("business_types", "*", "id");
            $data['content'] = $this->load->view("administrator/businessSubtypeInsert", $data, TRUE);
            $this->load->view('administrator/adminMaster', $data);
        }
    }

    public function editSubtypeData()
    {
        $id = $this->uri->segment(4);
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['subtypeDataById'] = $this->om->view_data("business_subtypes", "*", array("id" => $id));
        $data['typeList'] = $this->om->view_with_asc("business_types", "*", "id");
        $data['content'] = $this->load->view("administrator/subtypeDataEdit", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function update()
    {
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subtype', 'Subtype', 'required|trim|max_length[15]');


        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post("subtypeid");
            $data = array(
                "subtype_name" => $this->input->post("subtype"),
                "typeid" => $this->input->post("typeid")
            );

            if ($this->om->UpdateData("business_subtypes", $data, array("id" => $id)))
            {
                $msg['msg'] = "Subtype info update successfully.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/BusinessSubtype_Management/viewSubtypeList");
            }
        }
        else
        {
            $msg['msg'] = "Subtype info update unsuccessfully.";
            $this->session->set_userdata($msg);
            redirect(base_url() . "administrator/BusinessSubtype_Management/viewSubtypeList");
        }
    }

}
