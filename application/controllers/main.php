<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');


class Main extends CI_Controller {

    public $data;
    public function __construct() {
        parent::__construct();
            $this->load->library('Googlemaps');

    }

    public function index(){
        $data ['title']="CountyEye | 404 Error";
        $this->load->view('main',$data);
        $this->load->view('/layout/footer_two');
    }//end index function..

    public function test(){

        $config['center'] = '37.409, -122.1319';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);

        $marker=array();
        $marker['position']=array('');
        $marker['position'] = '37.409, -122.1319';
        $marker['icon']= '../../assets2/img/1.png' ;
        $marker['onclick'] = 'alert("You just clicked me!!")';
        $this->googlemaps->add_marker($marker);

        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('test',$data);
    }//end test


} //end controller..

?>