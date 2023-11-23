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
        $points = '';
        $family_involvement_points = 0;
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
        $family_involvement = $_POST['family_involvement'];
        if($family_involvement == ""){
            $family_involvement_points = 10;
        }

        if($income == '12000'){
            $points = 60;
        }
        elseif($income == '13000'){
            $points = 55;
        }
        elseif($income == '14000'){
            $points = 50;
        }
        elseif($income == '15000'){
            $points = 45;
        }
        elseif($income == '16000'){
            $points = 40;
        }
        elseif($income == '17000'){
            $points = 35;
        }
        elseif($income == '18000'){
            $points = 30;
        }
        elseif($income == '19000'){
            $points = 25;
        }
        elseif($income == '20000'){
            $points = 20;
        }
        elseif($income == '21000'){
            $points = 15;
        }
        elseif($income == '22000'){
            $points = 10;
        }
        elseif($income == '23000'){
            $points = 5;
        }
        else{
            $points = 0;
        }

        $total_points = $points + $family_involvement_points;
        

       $child_profile->childProfileHouseHold($address, $income, $beds, $no_of_persons, $walls, $roof, $floor, $condition, $ownership_status, $cooking_facility, $water_source, $electricity, $sanitary_facility, $_POST['child_profile_id'],$family_involvement, $total_points);

    }
    

