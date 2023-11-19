<?php
    date_default_timezone_set('Asia/Manila');
    include_once '../classes/db.classes.php';
    include_once '../classes/child-profile.classes.php';
    include_once '../classes/child-profile-cntrl.classes.php';


    $child_profile = new childProfileCntrl();

    if(isset($_POST['first_name']) && isset($_POST['last_name'])){
        $id = $_POST['child_profile_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $middle_name = $_POST['middle_name'];
        $gender = $_POST['gender'];
        $ad_consent = $_POST['consent'];
        $dob = $_POST['dob'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $eye_color = $_POST['eye_color'];
        $hair_color = $_POST['hair_color'];
        $past_time = $_POST['past_time'];
        $talent_hobbies = $_POST['hobbies'];
        $chores = $_POST['chores'];
        $child_sleeps_on = $_POST['child_sleeps_on'];
        $language = $_POST['language'];
        if($first_name == '' && $last_name = ''){
            echo 'stop';
        }
        if($_POST['child_profile_id'] == ''){
    
            $child_profile->childProfile($first_name, $last_name, $middle_name, $gender, $ad_consent,$dob, $height, $weight, $eye_color, $hair_color, $past_time, $talent_hobbies, $chores, $child_sleeps_on, $language);
        }
        else{

            $child_profile->editChildProfile($first_name, $last_name, $middle_name, $gender, $ad_consent,$dob, $height, $weight, $eye_color, $hair_color, $past_time, $talent_hobbies, $chores, $child_sleeps_on, $language, $id);
            
        }
       
     
    }

  



?>