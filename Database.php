<?php

class Database{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $dbname = "crud_oop";

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }
    private function connectDB(){
       $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
       if(!$this->link){
           $this->error = "Connection Failed".$this->link->connect_error;
           return false;
       }
    }
    public function select($query){
        $result = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function insert($query){
        $resultIns = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($resultIns){
            header("Location: index.php?msg=".urlencode('Sccuessfully Inserted.'));
            exit();
        }else{
            die("Error: (".$this->link->errno.")".$this->link->error);
        }
    }

    public function update($query){
        $resultUp = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($resultUp){
            header("Location: index.php?msg=".urlencode('Sccuessfully Updated.'));
            exit();
        }else{
            die("Error: (".$this->link->errno.")".$this->link->error);
        }
    }
    public function delete($query){
        $delete = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($delete){
            header("Location: index.php?msg=".urlencode('Sccuessfully deleted.'));
            exit();
        }else{
            die("Error: (".$this->link->errno.")".$this->link->error);
        }
    }
}