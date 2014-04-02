<?php
/**
 * Created by PhpStorm.
/ * User: Jay
 * Date: 2/18/14
 * Time: 9:34 PM
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Test extends CI_Controller {

    public $data;

    //constructor
    public function __construct() {
        parent::__construct();
        $this->load->model('commons_model'); //contains common functions
    }


    public function  index(){
//        $sector="health";
//        $name="Kiambu";
//        $jina=mysql_real_escape_string($name);
//
//        $refines= $this->commons_model->refine($sector,$jina);
//
//        foreach ($refines->result() as $row )
//        {
//            echo $row->Coordinates. "<br>";
//        }
        $this->load->view('test');
    }//end index function
}
//end test class
?>