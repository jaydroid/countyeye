<?php
/**
 * Created by PhpStorm.
/ * User: Jay
 * Date: 2/18/14
 * Time: 9:34 PM
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Engine extends CI_Controller {

    public $data;

    //constructor
    public function __construct() {
        parent::__construct();
        $this->load->model('commons_model'); //contains common functions
        include_once __DIR__ . '/../libraries/autoload.php';
    }
    public function index(){
        $data['title']="CountyEye: Analytics View";
        $data['county'] = $this->commons_model->countyfetch();
        $this->load->view('engine',$data);
        $this->load->view('/layout/footer_two');
    }

    public function sentiment(){
//        $str=$_POST['sentiment'];
        $string=$_POST['sentiment'];
        $sentiment = new \PHPInsight\Sentiment();

        // calculations:
        $scores = $sentiment->score($string);
        $class = $sentiment->categorise($string);

        // output:
        $rows = array();
        $row[0] = $string;
        $row[1] = $class;
        $row[2] = $scores;
        array_push($rows,$row);
        print_r ($rows);
        //print_r($rows);
        //echo "String: $string\n";
        //echo "Dominant: $class, scores: ";
        //print_r($scores);
        //echo "\n";
    }

}//end controller

?>