<?php
require_once('model/DataBase.inc.php');
require_once('model/Users.inc.php');
 class User{
     private $con, $users;

     public function __construct(){
         $this->con = new DataBase();
         $this->users = new Users($this->con);
     }

    function checkLogin(){
       
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){

            //Model
            $userName = md5($this->users->getUsers()['username']);
            $password = md5($this->users->getUsers()['password']);

            if ($_COOKIE['username'] == $userName && $_COOKIE['password'] == $password) {
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        } 
    }


    function userAuthentication($userName, $password){

        //Model
        $m_userName = $this->users->getUsers()['username'];
        $m_password = $this->users->getUsers()['password'];

        if($userName == $m_userName && $password == $m_password){
            return true;
        }else{
            return false;
        }
    }


    function addNewUser($first_name, $last_name, $email, $username, $password){
         if($this->users->addUser($first_name, $last_name, $email, $username, $password)){
             return true;
         }else{
             return false;
         }

    }

    public function setCookies($userName, $password)
    {
        setcookie("username", md5($userName), time() + (86400 * 30));
        setcookie("password", md5($password), time() + (86400 * 30));
    }


    function deleteCookie(){
        if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            
            unset($_COOKIE['username']); 
            unset($_COOKIE['password']); 
            
            setcookie('username', null, -1,); 
            setcookie('password', null, -1,); 
            
            return true;
        } else {
            return false;
        }
    }

 }

?>