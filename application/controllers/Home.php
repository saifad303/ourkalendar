<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function indexxxxx()
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



        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['cityid'] = $cityid;
        $data['allEventList'] = $this->om->view_data_home("events", "*", array("cityid" => $cityid));


        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
//        $data['content'] = $this->load->view("frontEnd/home", $data, TRUE);
        $this->load->view('frontEnd/home', $data);
    }

    public function index()
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



        $data['allCountryList'] = $this->om->view_with_asc("countries", "*", "id");
        $data['allCategoryList'] = $this->om->view_with_asc("category", "*", "id");
        $data['allEventPurposeList'] = $this->om->view_with_asc("eventpurpose", "*", "id");
        $data['cityid'] = $cityid;
        $data['allEventList'] = $this->om->view_data_home("events", "*", array("cityid" => $cityid));
        $data['allVenueList'] = $this->om->view_with_asc("venues", "*", "id");
        $data['filter'] = $this->load->view("frontEnd/filterPage", $data, TRUE);
        
        $data['content'] = $this->load->view("frontEnd/duplicateHomePage", $data, TRUE);
        $this->load->view('frontEnd/master', $data);
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

    public function dashboard()
    {
//            echo 'Admin';
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $data['allUserList'] = $this->om->view_with_asc("users", "*", "id");
        $data['allBusinessList'] = $this->om->view_with_asc("business", "*", "id");
        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['content'] = $this->load->view("administrator/dashboard", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function signUp()
    {

        if ($this->session->userdata("myid"))
        {
            redirect("Home");
        }
//        $data['subtypeList'] = $this->om->view_subtypes();
        $data['cityList'] = $this->om->view_city();
        $this->load->view('frontEnd/signUp', $data);
    }

    public function signIn()
    {
        if ($this->session->userdata("myid"))
        {
            redirect("Home");
        }
        $this->load->view('frontEnd/signIn');
    }

    public function adminAccountPanel()
    {
        $id = $this->session->userdata('myid');
        $data['adminDataById'] = $this->om->view_data("users", "*", array("id" => $id));
        $data['content'] = $this->load->view("frontEnd/personalAccountPanel/personalDashboard", $data, TRUE);
        $this->load->view("frontEnd/personalAccountPanel/master", $data);
    }

    public function userAccountPanel()
    {
        $id = $this->session->userdata('myid');
        $data['adminDataById'] = $this->om->view_data("users", "*", array("id" => $id));
        $data['content'] = $this->load->view("frontEnd/personalAccountPanel/personalDashboard", $data, TRUE);
        $this->load->view("frontEnd/personalAccountPanel/master", $data);
    }

    public function homePage()
    {
        $data['cityList'] = $this->om->view_city();
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "id");
        $this->load->view('frontEnd/duplicateHomePage', $data);
    }

    public function businessAccountPanel()
    {
        $id = $this->session->userdata('myid');
        $data['adminDataById'] = $this->om->view_data("users", "*", array("id" => $id));
        $data['content'] = $this->load->view("frontEnd/personalAccountPanel/personalDashboard", $data, TRUE);
        $this->load->view("frontEnd/personalAccountPanel/master", $data);
    }

    public function regConfirmation()
    {
        if ($this->session->userdata('num') == 1)
        {
            $this->session->unset_userdata('num');
            $data['content'] = $this->load->view("frontEnd/sentEmailMsgPage", 1, TRUE);
            $this->load->view("frontEnd/master", $data);
        }
        else
        {
            redirect(base_url("Home/errorPage"));
        }
    }

    public function duplicatePage()
    {
        $this->load->view("frontEnd/duplicateMaster");
    }

    public function errorPage()
    {
        $data['content'] = $this->load->view("frontEnd/404", 1, TRUE);
        $this->load->view("frontEnd/master", $data);
    }

    public function about()
    {
        $data['content'] = $this->load->view("frontEnd/aboutPage", 1, TRUE);
        $this->load->view("frontEnd/master", $data);
    }

    public function forgetPass()
    {
        $this->load->view('frontEnd/forgetPassPage');
    }

    public function businessForgetPass()
    {
        $this->load->view('frontEnd/businessForgetPassPage');
    }

    public function urlExpired()
    {
        if ($this->session->userdata('num') == 1)
        {
            $this->session->unset_userdata('num');
            $data['content'] = $this->load->view("frontEnd/urlExpiredPage", 1, TRUE);
            $this->load->view("frontEnd/master", $data);
        }
        else
        {
            redirect(base_url("Home/errorPage"));
        }
    }

    public function successMsgPage()
    {
        if ($this->session->userdata("complete") != 1)
        {
            redirect(base_url("Home/errorPage"));
        }


        if ($this->session->userdata("complete"))
        {
            $this->session->unset_userdata("complete");
        }


        $data['content'] = $this->load->view("frontEnd/successMsgPage", 1, TRUE);
        $this->load->view("frontEnd/master", $data);
    }

}
