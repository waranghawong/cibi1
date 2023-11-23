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



?>