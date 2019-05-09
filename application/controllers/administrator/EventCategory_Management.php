<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EventCategory_Management extends CI_Controller
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
        $data['content'] = $this->load->view("administrator/categoryInsert", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function viewCategoryList()
    {
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['categoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['content'] = $this->load->view("administrator/categoryListView", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function insert()
    {
//            echo 'Country Insert';

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Category', 'required|trim|max_length[20]');


        if ($this->form_validation->run() == TRUE)
        {
            $data = array(
                "category_name" => $this->input->post("category")
            );

            if ($this->om->InsertData("category", $data))
            {
                $msg['msg'] = "Category Info Saved.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/EventCategory_Management");
            }
        }
        else
        {
            $data['allEventListSearch'] = 0;
            $data['allUserListSearch'] = 0;
            $data['allBusinessListSearch'] = 0;


            $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
            $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
            $data['content'] = $this->load->view("administrator/categoryInsert", 1, TRUE);
            $this->load->view('administrator/adminMaster', $data);
        }
    }

    public function editCategoryData()
    {
        $id = $this->uri->segment(4);

        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['categoryDataById'] = $this->om->view_data("category", "*", array("id" => $id));
        $data['content'] = $this->load->view("administrator/categoryDataEdit", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function update()
    {
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Category', 'required|trim|max_length[20]');


        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post("categoryid");
            $data = array(
                "category_name" => $this->input->post("category")
            );

            if ($this->om->UpdateData("category", $data, array("id" => $id)))
            {
                $msg['msg'] = "Category info update successfully.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/EventCategory_Management/viewCategoryList");
            }
        }
        else
        {
            $msg['msg'] = "Category info not updated.";
            $this->session->set_userdata($msg);
            redirect(base_url() . "administrator/EventCategory_Management/viewCategoryList");
        }
    }

}
