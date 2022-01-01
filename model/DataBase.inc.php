<?php

class DataBase
{
    private $conn;

    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "weblab";

        if(!$this->conn){
            // Create connection
            $this->conn = mysqli_connect($servername, $username, $password, $dbname);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }

        }
    }



    public function executeQuery($sql)
    {

        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } 
        else 
        {
            return Null;
        }


    }

    public function insertQuery($sql)
    {
        if($this->conn->query($sql)){
            return True;
        }
        else
         { 
             return False; 
        }

    }

    function __destruct(){
        $this->conn->close();
    }

}

?>