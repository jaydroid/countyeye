<?php
#----------------todo----
/*
    # Employ the ci active record to make the code db augnostic
*/

class Commons_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('security');
        $this->load->database();
    }
    public function countyfetch(){
        $query = $this->db->query('SELECT name FROM counties ORDER BY name ASC LIMIT 47');
        return $query->result(); //return results;
	} // acc_model

    #search for projects via county name
     public function search($name){
        $query = $this->db->query('SELECT  `Id`,`Coordinates` FROM  `projects` WHERE County = "'.$name.'"');
        return $query;
    }
    #get project Details via project Id
    public function details($id){
        $query= $this->db->query('SELECT * FROM  `projects` WHERE Id="'.$id.'"');
        return $query;
    }
     #getcoords
     public function getcoord($name){
        $query = $this->db->query('SELECT `Coordinates`,`Id` FROM  `projects` WHERE County = "'.$name.'" LIMIT 400');
        return $query;
     }
     #refine function for refining map data via county name and sector
     public function refine($sector,$name){
        $query = $this->db->query('SELECT `Coordinates`,`Id` FROM `projects` WHERE `Sector` ="'.$sector.'" AND `County` ="'.$name.'" ;');
        return $query;
     }


    #--------------------------------------DATA SAVER FUNCTIONS---------------------------------------------
    public function save($id,$user,$comment){
       //$query= $this->db->query('UPDATE TABLE `comment` ');
        if($id==""){
            return 0;
        }
        else{
            $query=$this->db->query("INSERT INTO `comment` (`Comment`, `User_id`, `Project_id`) VALUES ('".$comment."', '".$user."','".$id."' )");
            return $query;
        }
    }

    #-------------------------------------PROJECT ANALYTICS FUNCTIONS----------------------------------------
    #Get count of projects per sector
    public function sector_count($county){
        $query= $this->db->query("SELECT `Sector`, COUNT(*) AS 'Sector_Count' FROM `Projects` WHERE `County`= '".$county."' GROUP BY `Sector`");
        return $query;
    }
    #get mtfe_sector count for a county
    public function mtfe_count($county){
        $query= $this->db->query("SELECT `MTFE_Sector`, COUNT(*) AS 'Sector_Count' FROM `Projects` WHERE `County`= '".$county."' GROUP BY `MTFE_Sector`");
        return $query;
    }

    #get the budget totals per year for a county
    public function project_totals($county){
        $query =$this->db->query('SELECT SUM( P_one ) AS  "year1", SUM( P_two ) AS  "year2", SUM( P_three ) AS  "year3", SUM( P_four ) AS  "year4", SUM( P_five ) AS  "year5", SUM( P_six ) AS  "year6", SUM( P_seven ) AS  "year7" FROM projects WHERE `County` = "'.$county.'"');
        return $query;
    }


}// end commons_model



#---------------------------Queries-------------------------------------------------------------------------------------------

#$query= $this->db->query('SELECT COUNT(*) AS ".$sector." FROM projects WHERE County="'.$name.'" AND Sector ="'.$sector.'"');
#Sector_count query
#("SELECT `Sector`, COUNT(*) AS "Sector_Count" FROM `Projects` WHERE `County`= "Narok" GROUP BY `Sector`");

#select distinct sector count
#$query= $this->db->query('SELECT DISTINCT "'.$sector.'", COUNT("'.$sector.'" ) FROM `projects`WHERE County="'.$name.' "GROUP BY "'.$sector.'"');
#SELECT DISTINCT `Sector`, COUNT("health" ) FROM `projects`WHERE County="Kiambu" GROUP BY "health"


#County specific project status filter
# SELECT * FROM `projects` WHERE `County`="Kiambu" AND `Status` LIKE "%complete%"



?>