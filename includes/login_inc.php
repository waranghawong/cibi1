<?php
include "../classes/session.class.php";
if(isset($_POST['sbmt_login'])){
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    include_once '../classes/db.classes.php';
    include_once '../classes/login.classes.php';
    include_once '../classes/login-cntrl.classes.php';

    $login = new LoginContr($username, $pwd);

    $login->loginUser();

    
  
    // header("location: ../index.php?error=none");
}

// var_dump($_POST);
// print_r($_POST);


?>
