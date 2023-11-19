<?php
    date_default_timezone_set('Asia/Manila');
    include_once '../classes/db.classes.php';
    include_once '../classes/child-profile.classes.php';
    include_once '../classes/child-profile-cntrl.classes.php';

    $child_profile = new childProfileCntrl();
    
if(isset($_POST['child_profile_id']) == '' &&  $_POST['address'] == '' && $_POST['income' == '']){
        var_dump($_POST);
    }   
    else{
        $address = $_POST['address'];
        $income = $_POST['income'];
        $beds = $_POST['beds'];
        $no_of_persons = $_POST['no_of_persons'];
        $walls = $_POST['walls'];
        $roof = $_POST['roof'];
        $floor = $_POST['floor'];
        $condition = $_POST['condition'];
        $ownership_status = $_POST['ownership_status'];
        $cooking_facility = $_POST['cooking_facility'];
        $water_source = $_POST['water_source'];
        $electricity = $_POST['electricity'];
        $sanitary_facility = $_POST['sanitary_facility'];
    
        $child_profile->childProfileHouseHold($address, $income, $beds, $no_of_persons, $walls, $roof, $floor, $condition, $ownership_status, $cooking_facility, $water_source, $electricity, $sanitary_facility, $_POST['child_profile_id']);

    }

