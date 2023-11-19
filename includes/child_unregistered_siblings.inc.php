<?php
    date_default_timezone_set('Asia/Manila');
    include_once '../classes/db.classes.php';
    include_once '../classes/child-profile.classes.php';
    include_once '../classes/child-profile-cntrl.classes.php';

    $child_profile = new childProfileCntrl();
    
    $child_profile_id = $_POST['child_profile_id'];
    $unreg_sibling_first_name = $_POST['unreg_sibling_first_name'];
    $unreg_sibling_last_name = $_POST['unreg_sibling_last_name'];
    $unreg_sibling_dob = $_POST['unreg_sibling_dob'];
    $gender = '';

    $count1 =  count($unreg_sibling_first_name) - 1;
  

    // 

    
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


        $array = [];
        for ($i = 0; $i <= $count1; $i++) {
            
        $as = $_POST['unreg_siblings_gender' . $i.''];
            foreach($as as $genders){
                $array[] = $genders;
            }
        }



    

           $child_profile->unregisteredSiblings($child_profile_id,$unreg_sibling_first_name, $unreg_sibling_last_name, $unreg_sibling_dob,$array );
          
       
 
   
    

   


