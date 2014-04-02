<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Register extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('commons_model'); //contains common functions
        $this->load->model('account_model'); //contains common functions
	}

	public function index(){
        $this->user();
	}//end index function..

    function  _load_view(){
        $data['county'] = $this->commons_model->countyfetch();
        $data['title']= 'CountyEye | Register';
        $this->load->view('/layout/header');
        $this->load->view('register',$data);
    }

    //function to do validation of user data and actual registration..
    function user(){
        #----------------------------------------
        #logic to validate and register user
        #----------------------------------------
        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.Email]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|md5');
        $this->form_validation->set_rules('conf_pass', 'Confirm Password', 'required|trim|matches[password]');
        $this->form_validation->set_error_delimiters('<p class="err_custom">','</p>');

        //run form validation script
        if ($this->form_validation->run() === FALSE) {
            #echo ($this->input->post('county'));
            $this->_load_view();
        }
        else{
            $value=array(
                'username'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'county'=>$this->input->post('county'),
                'password'=>$this->input->post('password')
            );

            $reg =$this->account_model->register($value);

            if($reg == 1){
                redirect('login');
            }

        } //end else

    }
} //end controller..

?>