<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Search extends CI_Controller {

    public $data;

    //constructor
    public function __construct() {
        parent::__construct();
        $this->load->model('commons_model'); //contains common functions
        $this->load->library('Googlemaps');
	}

	//function to grab user input...search db.. and return results
	public function index()
	{
		//get data
		$name = $this->input->post('county');
		//call model functions
        $query =$this->commons_model->search($name);
		$coords =$this->commons_model->getcoord($name);

		//store the data..
        $data['jina']=$this->session->userdata('name');
        #$data['user']=$this->session->userdata('id');
		$data['projects']=$query->result();
		$data['title'] = "Countyeye |" . $name ."Projects" ;
		$data['records']= $query->num_rows();
		$data['county'] = $name;


		 if ($query->num_rows() > 0)
		 {
             //config map data
             $config['center'] = 'Nairobi,Kenya';
             $config['zoom'] = 'auto';
             $config['map_height'] = '540px';
             $this->googlemaps->initialize($config);
             $coordinates=$coords->result();

             //markers..
             $marker = array();

             foreach ( $coordinates as $result)
             {
                 $marker['position'] = $result->Coordinates;
                 $row =$this->commons_model->details($result->Id);

                 #$marker['icon']= '../assets2/img/1.png' ;

                 foreach($row->result() as $rw){
                     //onclick event listener
                     //call load_info function and pass it all necessary array information
                     if(strtolower($rw->Sector) == "education"){
                         $marker['icon']= './assets2/img/1.png' ;
                         $marker['onclick']= 'load_info("'.$rw->Project_name.'|'.$rw->County.'|'.$rw->Constituency.'|'.$rw->Sector.'|'.$rw->MTFE_Sector.'|'.$rw->Tasks.'|'.$rw->Expected_output.'|'.$rw->Status.'|'.$rw->Remarks.'|'.$rw->Estimated_cost.'|'.$rw->P_one.'|'.$rw->P_two.'|'.$rw->P_three.'|'.$rw->P_four.'|'.$rw->P_five.'|'.$rw->P_six.'|'.$rw->P_seven.'|'.$rw->Id.'")';
                         $this->googlemaps->add_marker($marker);
                     }
                     if(strtolower($rw->Sector) =="water"){
                         $marker['icon']= './assets2/img/2.png' ;
                         $marker['onclick']= 'load_info("'.$rw->Project_name.'|'.$rw->County.'|'.$rw->Constituency.'|'.$rw->Sector.'|'.$rw->MTFE_Sector.'|'.$rw->Tasks.'|'.$rw->Expected_output.'|'.$rw->Status.'|'.$rw->Remarks.'|'.$rw->Estimated_cost.'|'.$rw->P_one.'|'.$rw->P_two.'|'.$rw->P_three.'|'.$rw->P_four.'|'.$rw->P_five.'|'.$rw->P_six.'|'.$rw->P_seven.'|'.$rw->Id.'")';
                         $this->googlemaps->add_marker($marker);
                     }
                     if(strtolower($rw->Sector) =="agriculture"){
                         $marker['icon']= './assets2/img/4.png' ;
                         $marker['onclick']= 'load_info("'.$rw->Project_name.'|'.$rw->County.'|'.$rw->Constituency.'|'.$rw->Sector.'|'.$rw->MTFE_Sector.'|'.$rw->Tasks.'|'.$rw->Expected_output.'|'.$rw->Status.'|'.$rw->Remarks.'|'.$rw->Estimated_cost.'|'.$rw->P_one.'|'.$rw->P_two.'|'.$rw->P_three.'|'.$rw->P_four.'|'.$rw->P_five.'|'.$rw->P_six.'|'.$rw->P_seven.'|'.$rw->Id.'")';
                         $this->googlemaps->add_marker($marker);
                     }
                     if(strtolower($rw->Sector) =="health"){
                         $marker['icon']= './assets2/img/3.png' ;
                         $marker['onclick']= 'load_info("'.$rw->Project_name.'|'.$rw->County.'|'.$rw->Constituency.'|'.$rw->Sector.'|'.$rw->MTFE_Sector.'|'.$rw->Tasks.'|'.$rw->Expected_output.'|'.$rw->Status.'|'.$rw->Remarks.'|'.$rw->Estimated_cost.'|'.$rw->P_one.'|'.$rw->P_two.'|'.$rw->P_three.'|'.$rw->P_four.'|'.$rw->P_five.'|'.$rw->P_six.'|'.$rw->P_seven.'|'.$rw->Id.'")';
                         $this->googlemaps->add_marker($marker);
                     }
                     if(strtolower($rw->Sector) =="roads/bridges"){
                         $marker['icon']= './assets2/img/5.png' ;
                         $marker['onclick']= 'load_info("'.$rw->Project_name.'|'.$rw->County.'|'.$rw->Constituency.'|'.$rw->Sector.'|'.$rw->MTFE_Sector.'|'.$rw->Tasks.'|'.$rw->Expected_output.'|'.$rw->Status.'|'.$rw->Remarks.'|'.$rw->Estimated_cost.'|'.$rw->P_one.'|'.$rw->P_two.'|'.$rw->P_three.'|'.$rw->P_four.'|'.$rw->P_five.'|'.$rw->P_six.'|'.$rw->P_seven.'|'.$rw->Id.'")';
                         $this->googlemaps->add_marker($marker);
                     }
                     if(strtolower($rw->Sector) =="youth/sports"){
                         $marker['icon']= './assets2/img/6.png' ;
                         $marker['onclick']= 'load_info("'.$rw->Project_name.'|'.$rw->County.'|'.$rw->Constituency.'|'.$rw->Sector.'|'.$rw->MTFE_Sector.'|'.$rw->Tasks.'|'.$rw->Expected_output.'|'.$rw->Status.'|'.$rw->Remarks.'|'.$rw->Estimated_cost.'|'.$rw->P_one.'|'.$rw->P_two.'|'.$rw->P_three.'|'.$rw->P_four.'|'.$rw->P_five.'|'.$rw->P_six.'|'.$rw->P_seven.'|'.$rw->Id.'")';
                         $this->googlemaps->add_marker($marker);
                     }
                     if(strtolower($rw->Sector) =="bursary"){
                         $marker['icon']= './assets2/img/6.png' ;
                         $marker['onclick']= 'load_info("'.$rw->Project_name.'|'.$rw->County.'|'.$rw->Constituency.'|'.$rw->Sector.'|'.$rw->MTFE_Sector.'|'.$rw->Tasks.'|'.$rw->Expected_output.'|'.$rw->Status.'|'.$rw->Remarks.'|'.$rw->Estimated_cost.'|'.$rw->P_one.'|'.$rw->P_two.'|'.$rw->P_three.'|'.$rw->P_four.'|'.$rw->P_five.'|'.$rw->P_six.'|'.$rw->P_seven.'|'.$rw->Id.'")';
                         $this->googlemaps->add_marker($marker);
                     }
                     if(strtolower($rw->Sector) =="other"){
                         $marker['icon']= './assets2/img/6.png' ;
                         $marker['onclick']= 'load_info("'.$rw->Project_name.'|'.$rw->County.'|'.$rw->Constituency.'|'.$rw->Sector.'|'.$rw->MTFE_Sector.'|'.$rw->Tasks.'|'.$rw->Expected_output.'|'.$rw->Status.'|'.$rw->Remarks.'|'.$rw->Estimated_cost.'|'.$rw->P_one.'|'.$rw->P_two.'|'.$rw->P_three.'|'.$rw->P_four.'|'.$rw->P_five.'|'.$rw->P_six.'|'.$rw->P_seven.'|'.$rw->Id.'")';
                         $this->googlemaps->add_marker($marker);
                     }
                     if(strtolower($rw->Sector) =="security"){
                         $marker['icon']= './assets2/img/6.png' ;
                         $marker['onclick']= 'load_info("'.$rw->Project_name.'|'.$rw->County.'|'.$rw->Constituency.'|'.$rw->Sector.'|'.$rw->MTFE_Sector.'|'.$rw->Tasks.'|'.$rw->Expected_output.'|'.$rw->Status.'|'.$rw->Remarks.'|'.$rw->Estimated_cost.'|'.$rw->P_one.'|'.$rw->P_two.'|'.$rw->P_three.'|'.$rw->P_four.'|'.$rw->P_five.'|'.$rw->P_six.'|'.$rw->P_seven.'|'.$rw->Id.'")';
                         $this->googlemaps->add_marker($marker);
                     }
                     if(strtolower($rw->Sector) =="electricity"){
                         $marker['icon']= './assets2/img/6.png' ;
                         $marker['onclick']= 'load_info("'.$rw->Project_name.'|'.$rw->County.'|'.$rw->Constituency.'|'.$rw->Sector.'|'.$rw->MTFE_Sector.'|'.$rw->Tasks.'|'.$rw->Expected_output.'|'.$rw->Status.'|'.$rw->Remarks.'|'.$rw->Estimated_cost.'|'.$rw->P_one.'|'.$rw->P_two.'|'.$rw->P_three.'|'.$rw->P_four.'|'.$rw->P_five.'|'.$rw->P_six.'|'.$rw->P_seven.'|'.$rw->Id.'")';
                         $this->googlemaps->add_marker($marker);
                     }
                     if(strtolower($rw->Sector) =="environment"){
                         $marker['icon']= './assets2/img/6.png' ;
                         $marker['onclick']= 'load_info("'.$rw->Project_name.'|'.$rw->County.'|'.$rw->Constituency.'|'.$rw->Sector.'|'.$rw->MTFE_Sector.'|'.$rw->Tasks.'|'.$rw->Expected_output.'|'.$rw->Status.'|'.$rw->Remarks.'|'.$rw->Estimated_cost.'|'.$rw->P_one.'|'.$rw->P_two.'|'.$rw->P_three.'|'.$rw->P_four.'|'.$rw->P_five.'|'.$rw->P_six.'|'.$rw->P_seven.'|'.$rw->Id.'")';
                         $this->googlemaps->add_marker($marker);
                     }

                 }//End foreach
             }

            $data['map'] = $this->googlemaps->create_map();
            $this->load->view('main',$data);
            $this->load->view('/layout/footer_two');
		 }

		 else
         {
		 	$data['title'] = "Countyeye | 404 Error" ;
		 	$this->load->view('404',$data);
		 }

	} //end search function


    //TBD
    public function sector(){
        echo 'cool';
    }

    //Function to do save data
    public function save()
    {
        $comment= $_POST['comment'];
        $user=$_POST['user'];
        $id= $_POST['id'];
        $data=$this->commons_model->save($id,$user,$comment);

        #testing returned data
        if($data==1){
            echo "<i class='icon-ok-sign'></i>"."Thank you for your comment";
        }
        else if($data !=1){
             echo "<i class='icon-remove-circle'></i>"."An Error occured: Please Try Again";
        }
    } //end save function

    public  function  save_flag(){
        $allegment = $_POST['allegement'];
        $comment = $_POST['reason'];
        $userId = $_POST['user'];
        $projectId = $_POST['id'];

        $data=$this->commons_model->save_flag($userId,$projectId,$allegment,$comment);

        #testing returned data
        if($data==1){
            echo "<i class='icon-ok-sign'></i> "."Thank you for your exercising your right";
        }
        else if($data !=1){
            echo "<i class='icon-remove-circle'></i> "."An Error occured: Please Try Again";
        }

    } //end save flag


} //end controller..

?>