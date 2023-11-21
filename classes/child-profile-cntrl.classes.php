<?php

class childProfileCntrl extends childProfile{

    //child profile
    public function childProfile($first_name, $last_name, $middle_name, $gender, $ad_consent,$dob, $height, $weight, $eye_color, $hair_color, $pastimes, $talent_hobbies, $chores, $child_sleeps_on, $health_problems){
      return $this->setChilProfile($first_name, $last_name, $middle_name, $gender, $ad_consent,$dob, $height, $weight, $eye_color, $hair_color, $pastimes, $talent_hobbies, $chores, $child_sleeps_on, $health_problems);
    }

    public function editChildProfile($first_name, $last_name, $middle_name, $gender, $ad_consent,$dob, $height, $weight, $eye_color, $hair_color, $past_time, $talent_hobbies, $chores, $child_sleeps_on, $language, $id){
      return $this->updateChildProfile($first_name, $last_name, $middle_name, $gender, $ad_consent,$dob, $height, $weight, $eye_color, $hair_color, $past_time, $talent_hobbies, $chores, $child_sleeps_on,$language, $id);
    }

    //child profile house hold
    public function childProfileHouseHold($address, $income, $beds, $no_of_persons, $walls, $roof, $floor, $condition, $ownership_status, $cooking_facility, $water_source, $electricity, $sanitary_facility, $id, $points){
      if($this->checkRecordExist($id) == true){
        $this->updatechildProfileHouseHold($address, $income, $beds, $no_of_persons, $walls, $roof, $floor, $condition, $ownership_status, $cooking_facility, $water_source, $electricity, $sanitary_facility, $id, $points);
      }
      else{
        return $this->setchildProfileHouseHold($address, $income, $beds, $no_of_persons, $walls, $roof, $floor, $condition, $ownership_status, $cooking_facility, $water_source, $electricity, $sanitary_facility, $id, $points);
      
      }
    }

    //child profile school info 
    public function childProfileSchool($why_not_attend_school, $school_name, $school_type, $academic_year, $school_transportation, $time_travel_to_school, $most_recent_grade_level_completed, $current_grade_level,$favorite_school_subject, $id, $points){
      if($this->checkchildProfileSchoolExist($id) == true){

        $this->updatechildProfileSchool($why_not_attend_school, $school_name, $school_type, $academic_year, $school_transportation, $time_travel_to_school, $most_recent_grade_level_completed, $current_grade_level,$favorite_school_subject, $id, $points);
      }
      else{
        return $this->setchildProfileSchool($why_not_attend_school, $school_name, $school_type, $academic_year, $school_transportation, $time_travel_to_school, $most_recent_grade_level_completed, $current_grade_level,$favorite_school_subject, $id, $points);
      
      }
    }

      //child family info 
      public function childFamilyInfo($mother_name, $father_name, $guardian_name, $is_mother_guardian, $father_guardian, $father_absent, $why_mother_absent, $mother_occupation,$father_occupation, $guardian_relationship, $child_lives_with,$guardian_occupation, $id, $child_points){
        if($this->checkchildFamilyInfoExist($id) == true){
  
          $this->updatechildFamilyInfo($mother_name, $father_name, $guardian_name, $is_mother_guardian, $father_guardian, $father_absent, $why_mother_absent, $mother_occupation,$father_occupation, $guardian_relationship, $child_lives_with,$guardian_occupation, $id, $child_points);
        }
        else{
          return $this->setchildFamilyInfo($mother_name, $father_name, $guardian_name, $is_mother_guardian, $father_guardian, $father_absent, $why_mother_absent, $mother_occupation,$father_occupation, $guardian_relationship, $child_lives_with,$guardian_occupation, $id, $child_points);
        
        }
      }
      //child unregistered siblngs 
      public function unregisteredSiblings($child_profile_id,$unreg_sibling_first_name, $unreg_sibling_last_name, $unreg_sibling_dob,$unreg_siblings_genders, $count){

        if($this->checkUnregifExist($child_profile_id) == true){
            return $this->updateUnregisteredSiblings($child_profile_id,$unreg_sibling_first_name, $unreg_sibling_last_name, $unreg_sibling_dob,$unreg_siblings_genders, $count);
        }else{
         return $this->setUnregisteredSiblings($child_profile_id,$unreg_sibling_first_name, $unreg_sibling_last_name, $unreg_sibling_dob,$unreg_siblings_genders, $count);
        }

      }

         //child registered siblngs 
         public function registeredSiblings($child_profile_id,$siblings_first_name, $siblings_last_name, $sibling_dob,$array, $count){

          if($this->checkregifExist($child_profile_id) == true){
              return $this->updateregisteredSiblings($child_profile_id,$siblings_first_name, $siblings_last_name, $sibling_dob,$array, $count);
          }else{
           return $this->setregisteredSiblings($child_profile_id,$siblings_first_name, $siblings_last_name, $sibling_dob,$array, $count);
          }
  
        }

    public function checkRecordExist($id){

      if($this->houseHoldExist($id) == true){
        return true;
      }
      else{
        return false;
      }
       
    }

    public function checkchildProfileSchoolExist($id){

      if($this->childProfileSchoolExist($id) == true){
        return true;
      }
      else{
        return false;
      }
       
    }

    public function checkchildFamilyInfoExist($id){

      if($this->childFamilyInfoExist($id) == true){
        return true;
      }
      else{
        return false;
      }
       
    }

    public function checkUnregifExist($id){

      if($this->childUnregigstedSiblings($id) == true){
        return true;
      }
      else{
        return false;
      }
       
    }

    public function checkregifExist($id){

      if($this->childregigstedSiblings($id) == true){
        return true;
      }
      else{
        return false;
      }
       
    }

    public function allChildProfile(){
      return $this->showAllChildProfile();

    }

}





?>