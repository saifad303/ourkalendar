<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CountryInfo_Management extends CI_Controller
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
        $data['content'] = $this->load->view("administrator/countryInsert", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function viewCountryList()
    {
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['content'] = $this->load->view("administrator/countryListView", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function insert()
    {
//            echo 'Country Insert';

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'Country', 'required|trim|max_length[15]');


        if ($this->form_validation->run() == TRUE)
        {
            $data = array(
                "country_name" => $this->input->post("country")
            );

            if ($this->om->InsertData("countries", $data))
            {
                $msg['msg'] = "Country Info Saved.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/CountryInfo_Management");
            }
        }
        else
        {
            $data['allEventListSearch'] = 0;
            $data['allUserListSearch'] = 0;
            $data['allBusinessListSearch'] = 0;


            $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
            $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
            $data['content'] = $this->load->view("administrator/countryInsert", $data, TRUE);
            $this->load->view('administrator/adminMaster', $data);
        }
    }

    public function editCountryData()
    {
        $id = $this->uri->segment(4);
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['countryDataById'] = $this->om->view_data("countries", "*", array("id" => $id));
        $data['content'] = $this->load->view("administrator/countryDataEdit", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function update()
    {
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'Country', 'required|trim|max_length[15]');


        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post("countryid");
            $data = array(
                "country_name" => $this->input->post("country")
            );

            if ($this->om->UpdateData("countries", $data, array("id" => $id)))
            {
                $msg['msg'] = "Country info update successfully.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/CountryInfo_Management/viewCountryList");
            }
        }
        else
        {
            redirect(base_url() . "administrator/CountryInfo_Management/viewCountryList");
        }
    }

}
