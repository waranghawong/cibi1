<?php 

class childProfile extends DB{
    
    //child profile
    protected function setChilProfile($first_name, $last_name, $middle_name, $gender, $ad_consent,$dob, $height, $weight, $eye_color, $hair_color, $pastimes, $talent_hobbies, $chores, $child_sleeps_on, $language){
        $datetimetoday = date("Y-m-d H:i:s");

        $connection = $this->dbOpen();

        $stmt = $connection->prepare("INSERT INTO child_info (first_name, last_name, middle_name, gender, ad_consent,dob, height, weight, eye_color, hair_color, pastimes, talent_hobbies, chores, child_sleeps_on, language_spoken, created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
       
        if(!$stmt->execute([$first_name, $last_name, $middle_name, $gender, $ad_consent, $dob,$height, $weight, $eye_color, $hair_color, $pastimes, $talent_hobbies, $chores, $child_sleeps_on, $language, $datetimetoday])){
            $stmt = null;
            header("location: index.php?errors=stmtfailed");
            exit();
        }
    
        echo json_encode(array("id" => $connection->lastInsertId()));
    }

    protected function removeChildProfile($id){

        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM child_info WHERE id = ?");
        $stmt->execute([$id]);
    }

    protected function getId($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT id FROM child_info WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetchall();
        $total = $stmt->rowCount();

        foreach($data as $datas){
            if($total > 0){
                return $datas;
            }
            else{
                return false;
            }
        }
    }

    protected function updateChildProfile($first_name, $last_name, $middle_name, $gender, $ad_consent,$dob, $height, $weight, $eye_color, $hair_color, $pastimes, $talent_hobbies, $chores, $child_sleeps_on, $health_problems, $id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE child_info SET first_name = ?, last_name = ?,middle_name = ?, gender = ?, ad_consent = ?, dob =?, height = ?, weight = ?, eye_color = ?, hair_color =?, pastimes = ?, talent_hobbies = ?, chores = ?, child_sleeps_on =?, language_spoken = ? WHERE id = ?");
        $stmt->execute([$first_name, $last_name, $middle_name, $gender, $ad_consent,$dob, $height, $weight, $eye_color, $hair_color, $pastimes, $talent_hobbies, $chores, $child_sleeps_on, $health_problems, $id]);
        
    }


    //child profile house hold
    protected function setchildProfileHouseHold($address, $income, $beds, $no_of_persons, $walls, $roof, $floor, $condition, $ownership_status, $cooking_facility, $water_source, $electricity, $sanitary_facility, $id){
        $datetimetoday = date("Y-m-d H:i:s");

        $connection = $this->dbOpen();

        $stmt = $connection->prepare("INSERT INTO child_house_hold_information (child_id, address, income, beds, no_of_persons, walls,roof, floor, house_condition, ownership_status, cooking_facility, water_source, electricity, sanitary_facility, created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
       
        if(!$stmt->execute([$id, $address, $income, $beds, $no_of_persons, $walls, $roof, $floor, $condition, $ownership_status, $cooking_facility, $water_source, $electricity, $sanitary_facility, $datetimetoday])){
            $stmt = null;
            header("location: index.php?errors=stmtfailed");
            exit();
        }

        echo json_encode(array("id" => $id));
    }

     protected function updatechildProfileHouseHold($address, $income, $beds, $no_of_persons, $walls, $roof, $floor, $condition, $ownership_status, $cooking_facility, $water_source, $electricity, $sanitary_facility, $id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE child_house_hold_information SET address = ?, income = ?,beds = ?, no_of_persons = ?, walls = ?, roof =?, floor = ?, house_condition = ?, ownership_status = ?, cooking_facility =?, water_source = ?, electricity = ?, sanitary_facility = ? WHERE child_id = ?");
        $stmt->execute([$address, $income, $beds, $no_of_persons, $walls, $roof, $floor, $condition, $ownership_status, $cooking_facility, $water_source, $electricity, $sanitary_facility, $id]);
        
    }

    protected function houseHoldExist($id){
        $result; 
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM child_house_hold_information WHERE child_id = ?");
        $stmt->execute([$id]);

        $total = $stmt->rowCount();

        if($total > 0){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    //child profile school info 
    protected function childProfileSchoolExist($id){
        $result; 
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM child_school_info WHERE child_id = ?");
        $stmt->execute([$id]);

        $total = $stmt->rowCount();

        if($total > 0){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    protected function setchildProfileSchool($why_not_attend_school, $school_name, $school_type, $academic_year, $school_transportation, $time_travel_to_school, $most_recent_grade_level_completed, $current_grade_level,$favorite_school_subject, $id){
        $datetimetoday = date("Y-m-d H:i:s");

        $connection = $this->dbOpen();

        $stmt = $connection->prepare("INSERT INTO child_school_info (child_id, attends_school, school_name, school_type, academic_year,school_transportation, time_school_travel,recent_grade_level, current_grade_level,favorite_school_subject,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?) ");
       
        if(!$stmt->execute([$id, $why_not_attend_school, $school_name, $school_type, $academic_year, $school_transportation, $time_travel_to_school, $most_recent_grade_level_completed, $current_grade_level,$favorite_school_subject, $datetimetoday])){
            $stmt = null;
            header("location: index.php?errors=stmtfailed");
            exit();
        }

        echo json_encode(array("id" => $id));
    }

     protected function updatechildProfileSchool($why_not_attend_school, $school_name, $school_type, $academic_year, $school_transportation, $time_travel_to_school, $most_recent_grade_level_completed, $current_grade_level,$favorite_school_subject, $id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE child_school_info SET  attends_school = ?, school_name =?, school_type = ?, academic_year = ?, school_transportation = ?, time_school_travel =?, recent_grade_level = ?, current_grade_level = ?, favorite_school_subject = ? WHERE child_id = ?");
        $stmt->execute([$why_not_attend_school, $school_name, $school_type, $academic_year, $school_transportation, $time_travel_to_school, $most_recent_grade_level_completed, $current_grade_level,$favorite_school_subject, $id]);
        
    }


    //child family info
    protected function childFamilyInfoExist($id){
        $result; 
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM child_family_information WHERE child_id = ?");
        $stmt->execute([$id]);

        $total = $stmt->rowCount();

        if($total > 0){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    protected function setchildFamilyInfo($mother_name, $father_name, $guardian_name, $is_mother_guardian, $father_guardian, $father_absent, $why_mother_absent, $mother_occupation,$father_occupation, $guardian_relationship, $child_lives_with,$guardian_occupation, $id){
        $datetimetoday = date("Y-m-d H:i:s");

        $connection = $this->dbOpen();

        $stmt = $connection->prepare("INSERT INTO child_family_information (child_id, mother_name, mother_absent, mother_occupation, is_mother_guardian, father_name, fathger_absent, father_occupation, is_father_guardian, guardian_name,guardian_occupation, guardian_relationship, child_lives_with,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
       
        if(!$stmt->execute([$id, $mother_name, $why_mother_absent, $mother_occupation, $is_mother_guardian, $father_name, $father_absent, $father_occupation, $father_guardian,$guardian_name, $guardian_occupation, $guardian_relationship,$child_lives_with, $datetimetoday])){
            $stmt = null;
            header("location: index.php?errors=stmtfailed");
            exit();
        }

        echo json_encode(array("id" => $id));
    }

     protected function updatechildFamilyInfo($mother_name, $father_name, $guardian_name, $is_mother_guardian, $father_guardian, $father_absent, $why_mother_absent, $mother_occupation,$father_occupation, $guardian_relationship, $child_lives_with,$guardian_occupation, $id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE child_family_information SET  mother_name = ?, father_name =?, guardian_name = ?, is_mother_guardian = ?, is_father_guardian = ?, fathger_absent =?, mother_absent = ?, mother_occupation = ?, father_occupation = ?,guardian_relationship = ?,child_lives_with = ?,guardian_occupation  = ?   WHERE child_id = ?");
        $stmt->execute([$mother_name, $father_name, $guardian_name, $is_mother_guardian, $father_guardian, $father_absent, $why_mother_absent, $mother_occupation,$father_occupation, $guardian_relationship, $child_lives_with,$guardian_occupation, $id]);
        
     }

     //child unregistered siblings

     protected function childUnregigstedSiblings($id){
        $result; 
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM unregistered_siblings WHERE child_id = ?");
        $stmt->execute([$id]);

        $total = $stmt->rowCount();

        if($total > 0){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    protected function setUnregisteredSiblings($child_profile_id,$unreg_sibling_first_name, $unreg_sibling_last_name, $unreg_sibling_dob,$unreg_siblings_genders){

        
        $datetimetoday = date("Y-m-d H:i:s");

        $connection = $this->dbOpen();

        foreach($unreg_sibling_first_name as $key=>$value){

            $stmt = $connection->prepare("INSERT INTO unregistered_siblings (child_id, unreg_first_name,unreg_last_name,unreg_dob,unreg_gender, created_at) VALUES (?,?,?,?,?,?) ");
       
            if(!$stmt->execute([$child_profile_id,$value, $unreg_sibling_last_name[$key], $unreg_sibling_dob[$key],$unreg_siblings_genders[$key], $datetimetoday])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
        }

        echo json_encode(array("id" => $child_profile_id));
    }

     protected function updateUnregisteredSiblings($child_profile_id,$unreg_sibling_first_name, $unreg_sibling_last_name, $unreg_sibling_dob,$unreg_siblings_genders){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $del = $connection->prepare("DELETE FROM unregistered_siblings WHERE child_id = ?" );
        $del->execute([$child_profile_id]);

        foreach($unreg_sibling_first_name as $key=>$value){

            $stmt = $connection->prepare("INSERT INTO unregistered_siblings (child_id, unreg_first_name,unreg_last_name,unreg_dob,unreg_gender, created_at) VALUES (?,?,?,?,?,?) ");
       
            if(!$stmt->execute([$child_profile_id,$value, $unreg_sibling_last_name[$key], $unreg_sibling_dob[$key],$unreg_siblings_genders[$key], $datetimetoday])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
        }

     }


        //child registered siblings

        protected function childregigstedSiblings($id){
            $result; 
            $connection = $this->dbOpen();
            $stmt = $connection->prepare("SELECT * FROM registered_siblings WHERE child_id = ?");
            $stmt->execute([$id]);
    
            $total = $stmt->rowCount();
    
            if($total > 0){
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;
        }
    
        protected function setregisteredSiblings($child_profile_id,$siblings_first_name, $siblings_last_name, $sibling_dob,$array){
    
            
            $datetimetoday = date("Y-m-d H:i:s");
    
            $connection = $this->dbOpen();
    
            foreach($siblings_first_name as $key=>$value){
    
                $stmt = $connection->prepare("INSERT INTO registered_siblings (child_id, sibling_first_name,sibling_last_name,sibling_dob,sibling_gender, created_at) VALUES (?,?,?,?,?,?) ");
           
                if(!$stmt->execute([$child_profile_id,$value, $siblings_last_name[$key], $sibling_dob[$key],$array[$key], $datetimetoday])){
                    $stmt = null;
                    header("location: index.php?errors=stmtfailed");
                    exit();
                }
            }
    
            echo json_encode(array("id" => $child_profile_id));
        }
    
         protected function updateregisteredSiblings($child_profile_id,$siblings_first_name, $siblings_last_name, $sibling_dob,$array){
            $datetimetoday = date("Y-m-d H:i:s");
            $connection = $this->dbOpen();
            $del = $connection->prepare("DELETE FROM registered_siblings WHERE child_id = ?" );
            $del->execute([$child_profile_id]);
    
            foreach($siblings_first_name as $key=>$value){
    
                $stmt = $connection->prepare("INSERT INTO registered_siblings (child_id, sibling_first_name,sibling_last_name,sibling_dob,sibling_gender, created_at VALUES (?,?,?,?,?,?) ");
           
                if(!$stmt->execute([$child_profile_id,$value, $siblings_last_name[$key], $sibling_dob[$key],$array[$key], $datetimetoday])){
                    $stmt = null;
                    header("location: index.php?errors=stmtfailed");
                    exit();
                }
            }
    
         }

         protected function showAllChildProfile(){
            $connection = $this->dbOpen();
            $stmt = $connection->prepare("SELECT t1.id, t1.first_name, t1.last_name, t1.middle_name, t1.gender, t1.dob, t2.address, t1.created_at  FROM child_info t1 LEFT JOIN child_house_hold_information t2 ON t1.id = t2.child_id");
           
            $stmt->execute();
            $data = $stmt->fetchall();
            $total = $stmt->rowCount();
    
            if($total > 0){
                return $data;
            }
            else{
                return false;
            }
         }


}



?>