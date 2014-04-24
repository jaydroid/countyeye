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
//        $this->load->library('/lib/insight/Sentiment');
       include_once __DIR__ . '/../libraries/autoload.php';
    }


    public function  index(){
//        $sector="health";
//        $name="Marakwet_Elgeyo";
//        $jina=mysql_real_escape_string($name);
//
//        $refines= $this->commons_model->refine($sector,$jina);
//
//        foreach ($refines->result() as $row )
//        {
//            echo $row->Coordinates. "<br>";
//        }
        $string="I hate school";
//        require_once __DIR__ . '/../autoload.php';
        $sentiment = new \PHPInsight\Sentiment();

#foreach ($strings as $string) {

        // calculations:
        $scores = $sentiment->score($string);
        $class = $sentiment->categorise($string);

        // output:
        echo "String: $string\n";
        echo "Dominant: $class, scores: ";
        print_r($scores);
        echo "\n";

        $this->load->view('test');
    }//end index function
}
//end test class
?>