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

    public function comment_get(){
        $county= $_POST['county'];
        $info=$this->commons_model->comments($county);

        if($info->num_rows() > 0){
            $data=array();
            foreach($info->result() as $rw){
                $row[0] = $rw->Project_name;
                $row[1] = $rw->County;
                $row[2] = $rw->Date;
                $row[3] = $rw->COMMENT;
                $row[4] = $rw->Sentiment;
                array_push($data,$row);
            }
            print json_encode($data,JSON_NUMERIC_CHECK);
        }
        else{
            echo 0;
        }

    }



} //end data Controller
?>