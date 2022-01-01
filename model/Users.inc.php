<?php

class Users
{
    private $db;

    public function __construct($db_object)
    {
        $this->db = $db_object;
    }

    public function getUsers()
    {
        $sql = "Select * from users where status='active' limit 1";
        $data = $this->db->executeQuery($sql);
        if($data != Null){
            if(sizeof($data) > 0){
               return $data[0];
            }else{ return Null; }
        }else { return Null; }
    }


    public function addUser($first_name, $last_name, $email, $username, $password)
    {
        $sql = "Insert into users (first_name, last_name, email,username, password, status) values ('$first_name', '$last_name', '$email','$username', '$password', 'active')";
        if ($this->db->insertQuery($sql)){
            return True;
        }else {return False;}
    }

}