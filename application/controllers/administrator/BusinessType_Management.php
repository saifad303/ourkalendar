<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BusinessType_Management extends CI_Controller
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
        $data['content'] = $this->load->view("administrator/businessTypeInsert", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function viewTypeList()
    {
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['typeList'] = $this->om->view_with_asc("business_types", "*", "id");
        $data['content'] = $this->load->view("administrator/businessTypesView", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function insert()
    {
//            echo 'Country Insert';

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('businesstype', 'Type', 'required|trim|max_length[15]');


        if ($this->form_validation->run() == TRUE)
        {
            $data = array(
                "type_name" => $this->input->post("businesstype")
            );

            if ($this->om->InsertData("business_types", $data))
            {
                $msg['msg'] = "Type Info Saved.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/BusinessType_Management");
            }
        }
        else
        {
            $data['allEventListSearch'] = 0;
            $data['allUserListSearch'] = 0;
            $data['allBusinessListSearch'] = 0;


            $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
            $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
            $data['content'] = $this->load->view("administrator/businessTypeInsert", $data, TRUE);
            $this->load->view('administrator/adminMaster', $data);
        }
    }

    public function editTypeData()
    {
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $id = $this->uri->segment(4);
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['typeDataById'] = $this->om->view_data("business_types", "*", array("id" => $id));
        $data['content'] = $this->load->view("administrator/typeDataEdit", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function update()
    {
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('businesstype', 'Type', 'required|trim|max_length[15]');


        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post("businesstypeid");
            $data = array(
                "type_name" => $this->input->post("businesstype")
            );

            if ($this->om->UpdateData("business_types", $data, array("id" => $id)))
            {
                $msg['msg'] = "Type info update successfully.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/BusinessType_Management/viewTypeList");
            }
        }
        else
        {
            $msg['msg'] = "Type info not updated.";
            $this->session->set_userdata($msg);
            redirect(base_url() . "administrator/BusinessType_Management/viewTypeList");
        }
    }

}
