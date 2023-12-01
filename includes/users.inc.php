<?php 
date_default_timezone_set('Asia/Manila');

include_once '../classes/db.classes.php';
include_once '../classes/users.classes.php';
include_once '../classes/users-contrl.classes.php';

$users = new usersController();

$users->setUsers();


if(isset($_GET['delete_user'])){
    $users->deleteSubAdmin($_GET['delete_user']);
    
}

if(isset($_GET['userid'])){
    $users->getSubAdmin($_GET['userid']);
    
}

if(isset($_POST['btn_edit_submit'])){
   $edit_sub_id = $_POST['edit_sub_id'];
   $edit_first_name = $_POST['edit_first_name'];
   $edit_last_name = $_POST['edit_last_name'];
   $edit_username = $_POST['edit_username'];
   $edit_password =$_POST['edit_password'];
   $edit_confirm_password =$_POST['edit_confirm_password'];
   $edit_email = $_POST['edit_email'];
   $edit_address = $_POST['edit_address'];
   $edit_phone = $_POST['edit_phone'];

    $subadmin_sttngs = $_POST['edit_subadmin_sttngs'];

    if(empty($edit_password) && empty($edit_confirm_password)){
      
        $users->updateSubAdmin($edit_first_name, $edit_last_name, $edit_username,$edit_password, $edit_email, $edit_address,$subadmin_sttngs, $edit_sub_id);
    }
    else{
        if($edit_password == $edit_confirm_password){
            $users->updateSubAdmin($edit_first_name, $edit_last_name, $edit_username,$edit_password, $edit_email, $edit_address,$subadmin_sttngs, $edit_sub_id);
        }
        else{
            header("location: ../admin/users.php?error=password_didnt_match");
            exit();
        }
    }

}

if(isset($_GET['program_id'])){
    $users->getUserPerProgram($_GET['program_id']);
}


?>