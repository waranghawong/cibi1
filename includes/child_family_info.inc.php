<?php
    date_default_timezone_set('Asia/Manila');
    include_once '../classes/db.classes.php';
    include_once '../classes/child-profile.classes.php';
    include_once '../classes/child-profile-cntrl.classes.php';

    $child_profile = new childProfileCntrl();
    
if(isset($_POST['child_profile_id']) == '' &&  $_POST['mother_name'] == '' && $_POST['father_name' == '']){
        var_dump($_POST);
    }   
    else{
        $id = $_POST['child_profile_id'];
        $mother_name = $_POST['mother_name'];
        $father_name = $_POST['father_name'];
        $guardian_name = $_POST['guardian_name'];
        $is_mother_guardian = $_POST['is_mother_guardian'];
        $father_guardian = $_POST['father_guardian'];
        $why_mother_absent = $_POST['why_mother_absent'];
        $father_absent = $_POST['father_absent'];
        $mother_occupation = $_POST['mother_occupation'];
        $father_occupation = $_POST['father_occupation'];
        $guardian_relationship = $_POST['guardian_relationship'];
        $child_lives_with = $_POST['child_lives_with'];
        $guardian_occupation = $_POST['guardian_occupation'];
        
    
        $child_profile->childFamilyInfo($mother_name, $father_name, $guardian_name, $is_mother_guardian, $father_guardian, $father_absent, $why_mother_absent, $mother_occupation,$father_occupation, $guardian_relationship, $child_lives_with,$guardian_occupation, $id);

    }

