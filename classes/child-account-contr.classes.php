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

    public function getListofChildAccounts(){

        return $this->getChildACcounts();
    }

    public function getChildById($id){
        echo json_encode(array($this->childDataById($id)));
    }

    public function updateChildAccount(){
        $child_id = $_POST['edit_sub_id'];
        $fname = $_POST['edit_first_name'];
        $lname = $_POST['edit_last_name'];
        $username = $_POST['edit_username'];
        $email = $_POST['edit_email'];
        $address = $_POST['edit_address'];
        $password = $_POST['edit_password'];
        $phone = $_POST['edit_phone'];

     
       return $this->editChildAccount($fname, $lname, $username, $email,  $address, $password, $phone, $child_id);
    }

    public function deleteChildById($id,$child_id){
        return $this->deleteChild($id,$child_id);
    }

    // public function programsAlgorith(){
    //    

       

    //     foreach( $this->getProgramSchedules() as $schedules){

    //     }

       
    // }
}


?>