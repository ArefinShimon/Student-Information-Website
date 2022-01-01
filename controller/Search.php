<?php
require_once ('model/DataBase.inc.php');
require_once ('model/Students.inc.php');
class Search
{

    private $con, $students;

    public function __construct(){
        $this->con = new DataBase();
        $this->students = new Students($this->con);
    }


    public function getSeacredStudentList($search_key)
    {
        return $this->students->getStudentsByKey($search_key);
    }

    public function getStudentByID($id)
    {
        return $this->students->getStudentsByID($id);
    }



    public function updateStudentByID($id, $std_id, $name, $email, $address)
    {
        return $this->students->updateStudent($id, $std_id, $name, $email, $address);
    }

}