<?php

class childAccountCntrl extends childAccount{

    public function getHasNoAccountChild(){
        return $this->hasNoAccount();
    }

    public function getChildData($id){
        echo json_encode(array($this->childData($id)));
    }

    public function setChildAccount(){
        if(isset($_POST['account_submit'])){
            $child_id = $_POST['child_id'];
            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];

         
            if($this->checkUsernameExist($username) == True){
                header("location: ../admin/users.php?error=username_already_exist");
            }
             $this->addChildAccount($fname, $lname, $username,$email,  $address, $password, $phone,$child_id);
        }
    }

    public function checkUsernameExist($username){
        $result;

        if($this->checkUsername($username)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
}


?>