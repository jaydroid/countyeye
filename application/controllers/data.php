<?php
/**
 * Created by PhpStorm.
 * User: Jay
 * Date: 4/11/14
 * Time: 11:12 AM
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Data extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('commons_model'); //contains common functions
       // $this->load->model('data_model'); //contains data functions
    }

    //default function..
    public function index(){
        $data['title']="CountyEye: Data View";
        $data['county'] = $this->commons_model->countyfetch();
        $this->load->view('data',$data);
        $this->load->view('/layout/footer_two');
    }//end index function..



} //end data Controller
?>