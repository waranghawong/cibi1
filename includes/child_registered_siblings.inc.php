<?php
    date_default_timezone_set('Asia/Manila');
    include_once '../classes/db.classes.php';
    include_once '../classes/child-profile.classes.php';
    include_once '../classes/child-profile-cntrl.classes.php';

    $child_profile = new childProfileCntrl();
    $child_count = $_POST['child_count'];
    $child_profile_id = $_POST['child_profile_id'];
    $siblings_first_name = $_POST['siblings_first_name'];
    $siblings_last_name = $_POST['siblings_last_name'];
    $sibling_dob = $_POST['sibling_dob'];
    $points = intval($_POST['child_points3']);

    $count1 =  count($siblings_first_name) - 1;
    $count = count($siblings_first_name);

    // 

    $total_points = '';
    // foreach($unreg_siblings_genders as $gender){
    //     foreach($unreg_sibling_first_name as $first_name){
    //         foreach($unreg_sibling_last_name as $last_name){
    //             foreach($unreg_sibling_dob as $dob){
    //                 echo $gender.'<br>';
    //                 echo $first_name.'<br>';
    //                 echo $last_name.'<br>';
    //                 echo $dob.'<hr>';
    //             }

    //         }
    //     }
    // }
        
        $total =  $count + $child_count;
        $array = [];
        for ($i = 0; $i <= $count1; $i++) {
            
        $as = $_POST['siblings_gender' . $i.''];
            foreach($as as $genders){
                $array[] = $genders;
            }
        }
        
        if($total == 8){
            $total_points = 20;
        }
        if($total == 7){
            $total_points = 18;
        }
        if($total == 6){
            $total_points = 16;
        }

        if($total == 5){
            $total_points = 14;
        }
        if($total == 4){
            $total_points = 12;
        }
        if($total == 3){
            $total_points = 10;
        }
        if($total == 2){
            $total_points = 8;
        }
        if($total == 1){
            $total_points = 6;
        }

        

$total = $points + intval($total_points);



    

$child_profile->registeredSiblings($child_profile_id,$siblings_first_name, $siblings_last_name, $sibling_dob,$array,$total);
          
       
 
   
    

   


