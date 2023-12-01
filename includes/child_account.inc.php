<?php

    date_default_timezone_set('Asia/Manila');
    include_once '../classes/db.classes.php';
    include_once '../classes/child_account.classes.php';
    include_once '../classes/child-account-contr.classes.php';


    $child_account = new childAccountCntrl();


    $child_account->setChildAccount();

    if(isset($_GET['child_id'])){
        $child_account->getChildData($_GET['child_id']);
    }


    if(isset($_GET['childid'])){
        $child_account->getChildById($_GET['childid']);
    }

    
    if(isset($_POST['btn_edit_submit'])){
        $child_account->updateChildAccount();
    }

    if(isset($_GET['delete_child'] ) && isset($_GET['child_id'])){
        $child_account->deleteChildById($_GET['delete_child'], $_GET['child_id']);
    }

    if(isset($_POST['user_id'])){
            $user_id = $_POST['user_id'];
            $status = $_POST['status'];
            $timestamp = $_POST['timestamp'];
            $program_id = $_POST['program_id'];
            $user  = strstr($user_id, '/', true);

         
            $date = date('m/d/Y');
            $date1 = strtotime($date);
        
            $asd = substr($timestamp, strrpos($timestamp, '/') + 1);
        
            if($date1 != $asd){
                echo json_encode(array('status'=>'404'));
            
            }
            else{
        
                $child_account->childAttendance($user_id, $status, $timestamp, $program_id);
            }
            
 
    }

    



?>