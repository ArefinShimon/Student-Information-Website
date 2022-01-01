<?php
require_once ('model/DataBase.inc.php');
require_once ('model/Students.inc.php');
class Home{

    private $con, $students;

    public function __construct(){
        $this->con = new DataBase();
        $this->students = new Students($this->con);
    }

    function getHomeData(){
        //model    
//        $data = array(
//            array("id"=>"1", "name"=>"Abu shahed", "std_id"=>"183-25-12000", "image"=>"shahed.jpg"),

//        );

        $data = $this->students->getStudents();
    
        //model
    
        return $data;
    
    }
}




