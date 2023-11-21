<?php
    date_default_timezone_set('Asia/Manila');
    include_once '../classes/db.classes.php';
    include_once '../classes/child-profile.classes.php';
    include_once '../classes/child-profile-cntrl.classes.php';

    $child_profile = new childProfileCntrl();
    
if(isset($_POST['child_profile_id']) == '' &&  $_POST['school_name'] == '' && $_POST['school_type' == '']){
        var_dump($_POST);
    }   
    else{
        $points = '';
        $child_points = $_POST['child_points'];
        $id = $_POST['child_profile_id'];
        $attaintment = $_POST['school_attainment'];
        $why_not_attend_school = $_POST['why_not_attend_school'];
        $school_name = $_POST['school_name'];
        $school_type = $_POST['school_type'];
        $academic_year = $_POST['academic_year'];
        $school_transportation = $_POST['school_transportation'];
        $time_travel_to_school = $_POST['time_travel_to_school'];
        $most_recent_grade_level_completed = $_POST['most_recent_grade_level_completed'];
        $current_grade_level = $_POST['current_grade_level'];
        $favorite_school_subject = $_POST['favorite_school_subject'];

        if($why_not_attend_school){
            $points = 10;
        }
        if($attaintment == 'elementary'){
            $points = 8;
        }
        if($attaintment == 'hs_undergrad'){
            $points = 6;
        }
        if($attaintment == 'hs_grad'){
            $points = 4;
        }
        if($attaintment == 'college_grad'){
            $points = 2;
        }   

       $ds = $child_points + $points;
        


        $child_profile->childProfileSchool($why_not_attend_school, $school_name, $school_type, $academic_year, $school_transportation, $time_travel_to_school, $most_recent_grade_level_completed, $current_grade_level,$favorite_school_subject, $id, $ds);

    }

