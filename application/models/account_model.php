<?php

class Account_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('security');
        $this->load->database();
    }

    public function register($value){

      	# $value['password'] = md5($value['password']);
    	 $this->db->insert('users',$value);

	     if($this->db->affected_rows() === 1){
         	 return 1;
	     }
	     else{
	     	return 0;
	     }

	} // acc_model

    public  function verify($email,$pass){

        $query="SELECT * FROM users WHERE email= ? and password = ?"; //query
        //check from user table..
        $md_pass=md5($pass);

        $results=$this->db->query($query, array($email, $md_pass));

        $num = $results->num_rows();

        if ($num == 1)
        {
            #$user = $results->row();
            return $results->row();
        }
        else
        {
            return 0;
        }
    }

}// end account_model

?>