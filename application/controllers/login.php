<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Login extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('commons_model'); //contains common functions
        $this->load->model('account_model'); //contains common functions
	}

    //function to load view
    function _load_view(){
        $data['title']= "County Eye | Login";
        $this->load->view('/layout/header');
        $this->load->view('login',$data);
    }
	public function index(){
        $this->user();
	}//end index function..

    function user(){
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'xss_clean');
        $this->form_validation->set_error_delimiters('<p class="err_custom">','</p>');

        if($this->form_validation->run() === FALSE){
            $this->_load_view();
        }//end login function

        else{
            //validation will come later
            $email=  $this->input->post('email');
            $password=  $this->input->post('password');

            $result=  $this->account_model->verify($email,$password);
            if(!$result){
                $flash_data=array(
                    'email' => $email,
                    'login_error' =>TRUE
                );

                $this->session->set_flashdata($flash_data);
                redirect('login');
            }
            else{
                $session_data=array(
                    'name'=> $result->Username,
                    'id' => $result->Id,
                    'is_logged_in'=>TRUE
                );
                $this->session->set_userdata($session_data);
                #echo $this->session->userdata('id');
                redirect('index');
            }
        }
    }//end user function

    //Logout function to destroy session data
    public function logout(){
        if ($this->session->userdata('is_logged_in')) {
            $this->session->sess_destroy();
            redirect('index');
        }
    }

}//end controller..

?>