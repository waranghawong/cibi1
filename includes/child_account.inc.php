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
?>