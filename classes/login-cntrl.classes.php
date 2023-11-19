<?php 

class LoginContr extends Login{
    private $username;
    private $pwd;

    public function __construct($username, $pwd){
        $this->username = $username;
        $this->pwd = $pwd;
    }

    public function loginUser(){
        if($this->emptyInput() == false){
            header('location: ../index.php?error=emptyInput');
            exit();
        }

        $this->getUser($this->username, $this->pwd);
    }

    public function emptyInput(){
        $result;

        if(empty($this->username || empty($this->pwd))){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}


?>