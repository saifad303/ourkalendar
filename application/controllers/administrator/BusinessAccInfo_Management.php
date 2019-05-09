<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BusinessAccInfo_Management extends CI_Controller
{

    public function allBusinessAccList()
    {
//            echo 'Admin';

        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }


        $this->load->library('pagination');


        $config['base_url'] = base_url("administrator/BusinessAccInfo_Management/allBusinessAccList");
        $config['total_rows'] = $this->om->count_businessList();
        $config['per_page'] = 4;


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

        $data['businessList'] = $this->om->all_businessAcc_pagination($config['per_page'], $this->uri->segment(4));


        $data['subtypeList'] = $this->om->view_subtypes();
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['allBusinessListSearch'] = 1;
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
//        $data['businessList'] = $this->om->view_with_asc("business", "*", "id");
        $data['content'] = $this->load->view("administrator/viewBusinessAccList", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    function file_selected_test()
    {
//        if (empty($_FILES['pic']['name']))
//        {
//            $this->form_validation->set_message('file_selected_test', 'Please select picture.');
//            return false;
//        }
//        else if ($_FILES['pic']['size'] > 512000)
//        {
//            $this->form_validation->set_message('file_selected_test', 'File is too large.');
//            return false;
//        }
//        else
//        {
//            return true;
//        }
    }

    public function businessRegistration()
    {
        date_default_timezone_set('asia/dhaka');
        $this->load->helper("form");
        $this->load->helper('email');
        $this->load->helper('string');
        $this->load->library('form_validation');
        
        $config = array(
            "mailtype" => "html"
        );



        $this->form_validation->set_rules('title', 'Title', 'required|trim|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('bemail', 'Email', 'trim|required|valid_email|is_unique[business.email]');
        $this->form_validation->set_rules('bpass', 'Password', 'required|trim|min_length[5]|max_length[10]');
        $this->form_validation->set_rules('bpass1', 'Confirm Password', 'required|matches[bpass]');
//        $this->form_validation->set_rules('bdescr', 'Description', 'required|trim|min_length[10]|max_length[300]');
//        $this->form_validation->set_rules('bpic', 'Picture', 'callback_file_selected_test');


//        $ext = pathinfo($_FILES['bpic']['name']);
//        $ext = strtolower($ext['extension']);
//
//        if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "tiff")
//        {
//            
//        }
//        else
//        {
//            $msg['picmsg'] = "Invalid file type";
//            $this->session->set_userdata($msg);
//            redirect(base_url("Home/signUp"));
//        }




        if ($this->form_validation->run() == TRUE)
        {

//            $ext = pathinfo($_FILES['pic']['name']);
//            $ext = strtolower($ext['extension']);
//            if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif")
//            {
//                $ext = "";
//            }

            $str = random_string('alnum', 20);
            $to = $this->input->post("bemail");

            //$str = RandString(10);
            $data = array(
                "business_title" => $this->input->post("title"),
                "email" => $this->input->post("bemail"),
                "password" => md5($this->input->post("bpass")),
//                "company_info" => $this->input->post("bdescr"),
                "cityid" => 7,
                "bustypeid" => 6,
                "bussubtypeid" => 9,
                "picture" => 'jpg',
                "status" => $str,
                "type" => 'b',
                "activeorinactive" => 1,
                "joinDate" => date("Y-m-d H:i:s")
            );




            if ($a = $this->om->InsertData("business", $data))
            {
                $Id = $this->om->Id;

//                if ($ext != "")
//                {
//                    $this->load->library('upload');
//                    $config['upload_path'] = './public/businesspicture/';
//                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                    $config['max_size'] = '500';
//                    $config['max_width'] = '8048';
//                    $config['max_height'] = '5500';
//                    $config['file_name'] = "upic_{$Id}.{$ext}";
//                    $this->upload->initialize($config); //upload image data
//                    $this->upload->do_upload('pic');
//                }
//                else
//                {
//                    $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
//                    $data['content'] = $this->load->view("administrator/signUp", $data, TRUE);
//                    $this->load->view('administrator/adminMaster', $data);
//                }

                $msg = "To activate your account<br>. <a href='" . base_url() . "administrator/BusinessAccInfo_Management/accountVerify/" . $str . "'>Click Here</a>";

                //Emial Confirmation Message

                $this->email->initialize($config);

                $this->email->set_newline("\r\n");

                $this->email->from('saifad303@gmail.com', 'Saif Ahmed');
                $this->email->to($to);

                $this->email->subject('ourKalender');
                $this->email->message($msg);


                $this->email->send();

                //
                $num['num'] = 1;
                $this->session->set_userdata($num);
                redirect(base_url() . "Home/regConfirmation");
            }
        }
        else
        {
            $this->load->view('frontEnd/signUp');
        }
    }

    public function accountVerify()
    {
        $status = $this->uri->segment(4);
        if ($status != "")
        {
            $data = $this->om->view_data("business", "id, type", array("status" => $status));
            if ($data)
            {
                foreach ($data as $dt)
                {
                    $data['myid'] = $dt->id;
                    $data['mytype'] = $dt->type;
                    $this->session->set_userdata($data);
                    $this->om->UpdateData("business", array("status" => ""), array("id" => $dt->id));
                    redirect(base_url());
                }
            }
            else
            {
                echo "Invalid Code";
            }
        }
    }

    public function businessAccCheck()
    {

        $password = md5($this->db->escape_str($this->input->post("pass")));
        $password = $this->db->escape_like_str($password);

        $email = $this->db->escape_str($this->input->post("email"));
        $email = $this->db->escape_like_str($email);


        $data = array(
            "email" => $email,
            "password" => $password
        );
        $dt = $this->om->view_data("business", "id,type,status", $data);

//        print_r($dt);

        if ($dt)
        {
            foreach ($dt as $d)
            {

                if ($d->status == "")
                {
                    $data['myid'] = $d->id;
                    $data['mytype'] = $d->type;
                    $this->session->set_userdata($data);
                    redirect(base_url());
                }
                else
                {
                    $msg['msg'] = "The account is not activated yet";
                    $this->session->set_userdata($msg);
                    redirect(base_url() . "Home/signIn");
                }
            }
        }
        else
        {
            $msg['msg'] = "Incorrect email or password";
            $this->session->set_userdata($msg);
            redirect(base_url() . "Home/signIn");
//            echo 'Incorrect';
        }
    }

    public function viewProfileDetail()
    {
        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }
//        echo '<p>View Profile Detaile</p>';
        $id = $this->uri->segment(4);
        $data['allEventListSearch'] = 0;
        $data['allUserListSearch'] = 0;
        $data['allBusinessListSearch'] = 0;

        $data['reportAlert'] = $this->om->view_data("report", "show", array("show" => 0));
        $data['allEventList'] = $this->om->view_with_asc("events", "*", "activation");
        $data['businessDataById'] = $this->om->view_data("business", "*", array("id" => $id));
        $data['content'] = $this->load->view("administrator/viewBusinessAccProfile", $data, TRUE);
        $this->load->view('administrator/adminMaster', $data);
    }

    public function bussinessInactive()
    {
        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }
        $id = $this->uri->segment(4);

        $this->om->UpdateData("business", array("activeorinactive" => 0), array("id" => $id));

        redirect(base_url("administrator/BusinessAccInfo_Management/allBusinessAccList"));
    }

    public function bussinessActive()
    {
        if ($this->session->userdata("mytype") != "a")
        {
            redirect(base_url());
        }
        $id = $this->uri->segment(4);

        $this->om->UpdateData("business", array("activeorinactive" => 1), array("id" => $id));

        redirect(base_url("administrator/BusinessAccInfo_Management/allBusinessAccList"));
    }

    //forget pass


    public function resetPassCheckEmail()
    {

        $this->load->helper("form");
        $this->load->helper('email');
        $this->load->helper('string');
        $this->load->library('form_validation');

        $config = array(
            "mailtype" => "html"
        );

        $this->load->library('email', $config);


        $email = $this->input->post("email");

        $flag = 0;

        $data['userData'] = $this->om->view_with_asc("business", "*", "id");

        foreach ($data['userData'] as $list)
        {
            if ($list->email == $email)
            {
                $flag = 1;
            }
        }

        if ($flag == 1)
        {
            $to = $email;
            $str = random_string('alnum', 20);
            $msg = "Dear user,<p>We want to help you reset your password.Please . <a href='" . base_url() . "administrator/BusinessAccInfo_Management/reEnterPass/" . $str . "'>click Here</a> to reset your password</p>.<p>Thank you!</p>";

            $this->om->UpdateData("business", array("passRenew" => $str), array("email" => $email));

            //Emial Confirmation Message

            $this->email->initialize($config);

            $this->email->set_newline("\r\n");

            $this->email->from('saifad303@gmail.com', 'Saif Ahmed');
            $this->email->to($to);

            $this->email->subject('Password reset');
            $this->email->message($msg);


            $this->email->send();

            //
            $num['num'] = 1;
            $this->session->set_userdata($num);
            redirect(base_url() . "Home/regConfirmation");
        }
        else
        {
            $msg['msg'] = "No account associated with this email!";
            $this->session->set_userdata($msg);
            redirect(base_url("Home/businessForgetPass"));
        }
    }

    public function reEnterPass()
    {
        $flag = 0;
        $random = $this->uri->segment(4);
        $data['userData'] = $this->om->view_data("business", "*", array("passRenew" => $random));


        foreach ($data['userData'] as $list)
        {
            if ($list->passRenew == $random)
            {
                $flag = 1;
                $data['oldPass'] = $list->password;
                $data['random'] = $random;
//                $this->om->UpdateData("users", array("passRenew" => ""), array("passRenew" => $random));
            }
            else
            {
                $msg['complete'] = 1;
                $this->session->set_userdata($msg);
            }
        }

        if ($flag == 1)
        {
            $num['num'] = 1;
            $this->session->set_userdata($num);

            $this->load->view('frontEnd/businessRenewPassPage', $data);
        }
        else if ($this->session->userdata("complete") == 1)
        {
            $this->session->unset_userdata("complete");
            redirect(base_url("Home/errorPage"));
        }
        else
        {
            if ($this->session->userdata("complete") != 1)
            {
                redirect(base_url("Home/errorPage"));
            }
            $num['num'] = 1;
            $this->session->set_userdata($num);
            redirect(base_url("Home/urlExpired"));
        }
    }

    public function passReset()
    {
        $flag = 1;

        $pass = $this->input->post("pass");
        $passConfirm = $this->input->post("pass1");

        $num = $pass;
        $numlength = mb_strlen($num);


        if ($numlength > 10)
        {
            $flag = 0;
            $msg['pass'] = 'Your password must between 5-10 digits';
            $this->session->set_userdata($msg);
        }
        else if ($numlength < 5)
        {
            $flag = 0;
            $msg['pass'] = 'Your password must between 5-10 digits.';
            $this->session->set_userdata($msg);
        }

        if ($pass != $passConfirm)
        {
            $flag = 0;
            $msg['confPass'] = 'Invalid password match.';
            $this->session->set_userdata($msg);
        }

        if ($flag == 1)
        {
            $oldPassword = $this->input->post("oldpass");

            $this->om->UpdateData("business", array("passRenew" => ""), array("password" => $oldPassword));
            $this->om->UpdateData("business", array("password" => md5($pass)), array("password" => $oldPassword));


            $msg['complete'] = 1;
            $this->session->set_userdata($msg);

            if ($this->session->userdata("complete") == 1)
            {

                redirect(base_url("Home/successMsgPage"));
            }

            redirect(base_url());
        }
        else
        {
            redirect(base_url("administrator/BusinessAccInfo_Management/reEnterPass/" . $this->input->post("random")));
        }
    }

}
