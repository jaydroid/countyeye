<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Index extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('commons_model'); //contains common functions
	}

	public function index(){
		$data['county'] = $this->commons_model->countyfetch();
		$this->load->view('/layout/header');
		$this->load->view('index',$data);
		$this->load->view('/layout/footer');
	}//end index function..
} //end controller..

?>