<?php 

class usersController extends userClass {
    public function setUsers(){
        if(isset($_POST['submit'])){
            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $restriction = $_POST['subadmin_sttngs'];
            $child_profile_restriction = false;
            $scheduler_restriction = false;
            $reports_restriction = false;
            $utilities_restriction = false;
            $user_management_restriction = false;

            foreach($restriction as $rs){
                switch ($rs){
                    case 'child_profile':
                        $child_profile_restriction = true;
                        break;
                    case 'scheduler':
                        $scheduler_restriction = true;
                        break;
                    case 'reports':
                        $reports_restriction = true;
                        break;
                    case 'utilities':
                        $utilities_restriction = true;
                        break;
                    case 'user_management':
                        $user_management_restriction = true;
                        break;

                }
            }
            if($this->checkUsernameExist($username) == True){
                header("location: ../admin/users.php?error=username_already_exist");
            }
             $this->addUser($fname, $lname, $username,$email,  $address, $password, $phone,$child_profile_restriction, $scheduler_restriction, $reports_restriction, $utilities_restriction, $user_management_restriction);
        }
    }

    public function getListofUsers(){
        return $this->listofUsers();
    }

    public function deleteSubAdmin($id){
 
        $this->delAdmin($id);
        return json_encode(array("statusCode"=>200));
    }

    public function getSubAdmin($id){
        echo json_encode($this->subAdmin($id));
  
    }

    public function updateSubAdmin($edit_first_name, $edit_last_name, $edit_username,$edit_password, $edit_email, $edit_address,$subadmin_sttngs, $edit_sub_id){
        $account_restriction = false;
        $subject_restriction = false;
        $records_restriction = false;
        $sms_restriction = false;
        $barcode_restriction = false;

        foreach($subadmin_sttngs as $rs){
            switch ($rs){
                case 'child_profile':
                    $child_profile_restriction = true;
                    break;
                case 'scheduler':
                    $scheduler_restriction = true;
                    break;
                case 'reports':
                    $reports_restriction = true;
                    break;
                case 'utilities':
                    $utilities_restriction = true;
                    break;
                case 'user_management':
                    $user_management_restriction = true;
                    break;

            }
        }


        return $this->editSubAdmin($edit_first_name, $edit_last_name, $edit_username,$edit_password, $edit_email, $edit_address,$child_profile_restriction,$scheduler_restriction,$reports_restriction,$utilities_restriction,$user_management_restriction , $edit_sub_id);
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