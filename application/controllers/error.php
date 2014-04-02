<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Error extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();

	}

	public function index(){
		$data ['title']="CountyEye | 404 Error";
		$this->load->view('/layout/header');
		$this->load->view('404',$data);
		$this->load->view('/layout/footer');
	}//end index function..
} //end controller..



?>