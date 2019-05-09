<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CityInfo_Management extends CI_Controller
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
        $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['content'] = $this->load->view("administrator/cityInsert", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function viewCityList()
    {
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['cityList'] = $this->om->view_city();
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['content'] = $this->load->view("administrator/cityListView", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function insert()
    {
//            echo 'Country Insert';

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('city', 'City', 'required|trim|max_length[10]');
        $this->form_validation->set_rules('countryid', 'Country selection', 'required|trim');


        if ($this->form_validation->run() == TRUE)
        {
            $data = array(
                "city_name" => $this->input->post("city"),
                "countryid" => $this->input->post("countryid")
            );

            if ($this->om->InsertData("cities", $data))
            {
                $msg['msg'] = "City Info Saved.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/CityInfo_Management");
            }
        }
        else
        {
            $data['allEventListSearch'] = 0;
            $data['allUserListSearch'] = 0;
            $data['allBusinessListSearch'] = 0;


            $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
            $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
            $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
            $data['content'] = $this->load->view("administrator/cityInsert", $data, TRUE);
            $this->load->view('administrator/adminMaster', $data);
        }
    }

    public function editCityData()
    {
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;


        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $id = $this->uri->segment(4);
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['cityDataById'] = $this->om->view_data("cities", "*", array("id" => $id));
        $data['countryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['content'] = $this->load->view("administrator/cityDataEdit", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function update()
    {
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('city', 'City', 'required|trim|max_length[15]');


        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post("cityid");
            $data = array(
                "city_name" => $this->input->post("city"),
                "countryid" => $this->input->post("countryid")
            );

            if ($this->om->UpdateData("cities", $data, array("id" => $id)))
            {
                $msg['msg'] = "City info update successfully.";
                $this->session->set_userdata($msg);
                redirect(base_url() . "administrator/CityInfo_Management/viewCityList");
            }
        }
        else
        {
            $msg['msg'] = "City info update unsuccessfully.";
            $this->session->set_userdata($msg);
            redirect(base_url() . "administrator/CityInfo_Management/viewCityList");
        }
    }

}
