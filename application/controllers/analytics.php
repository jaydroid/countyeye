<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Analytics extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('commons_model'); //contains common functions
    }

    public function index(){
        $data['title']="CountyEye: Analytics View";
        $data['county'] = $this->commons_model->countyfetch();
        $this->load->view('analytics',$data);
        $this->load->view('/layout/footer_two');
    }//end index function..

    //chart data get functions
    public  function sector_count_get(){

        $county= $_POST['county'];
        $info=$this->commons_model->sector_count($county);

        #testing returned data
        if($info->num_rows() > 0 ){
            foreach($info->result() as $rw){
                $arr= array();
                $arr[0]=$rw->Sector;
                $arr[1]=$rw->Sector_Count;
            }
            echo (json_encode($arr));

            #print_r($info->result());

        }
        else{
           echo ('Something Went Wrong');
        }
    } //end sector_count_get function

    //function to get total project budgets per year per county
    public  function project_budgets(){
        $county= $_POST['county'];
        $info=$this->commons_model->project_totals($county);

        #testing returned data
        if($info->num_rows() > 0 ){
            #print_r($info->result());
            foreach($info->result() as $rw){
                $data=array();
                $data[0]=$rw->year1;
                $data[1]=$rw->year2;
                $data[2]=$rw->year3;
                $data[3]=$rw->year4;
                $data[4]=$rw->year5;
                $data[5]=$rw->year6;
                $data[6]=$rw->year7;
            }
            echo (json_encode($data));
        }
        else{
            echo 0;
        }
    }

} //end controller..

?>