<?php

class Students
{
    private $db;

    public function __construct($db_object)
    {
        $this->db = $db_object;
    }

    public function getStudents()
    {
        $sql = "Select * from students";
        $data = $this->db->executeQuery($sql);
        if($data != Null){
            if(sizeof($data) > 0){
                return $data;
            }
            else
            { 
                return Null; 
            }
        }
        else 
        { 
            return Null; 
        }
    }

    public function getStudentsByKey($search_key)
    {
        $sql = "Select * from students where name LIKE '%$search_key%' or std_id LIKE '%$search_key%' or email LIKE '%$search_key%' or address LIKE '%$search_key%'";
        $data = $this->db->executeQuery($sql);
        if($data != Null){
            if(sizeof($data) > 0){
                return $data;
            }
            else
            { 
                return Null;
            }
        }else { 
            return Null; 
        }
    }

    public function getStudentsByID($id)
    {
        $sql = "Select * from students where id = '$id'";
        $data = $this->db->executeQuery($sql);
        if($data != Null){
            if(sizeof($data) > 0){
                return $data[0];
            }
            else{
                 return Null; 
                }
        }
        else 
        { 
            return Null;
        }
    }


    public function updateStudent($id, $std_id, $name, $email, $address)
    {
        $sql = "Update students set std_id = '$std_id', name = '$name', email = '$email', address = '$address' where id = '$id'";
        if ($this->db->insertQuery($sql)){
            return True;
        }
        else 
        {
            return False;
        }
    }

}
?>