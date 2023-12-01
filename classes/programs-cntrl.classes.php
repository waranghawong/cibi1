<?php

class programsCntrl extends programs{
    public function setProgram(){


      if(isset($_POST['submit'])){
        $tags_array =  explode(',', $_POST['program_tags']);
        return $this->addProgram($_POST['program_name'], $_POST['program_description'],$tags_array);
      }

   
    }

    public function getProgram(){
        return $this->showALlPRograms();
    }

    public function getProgramId($id){
        echo json_encode(array($this->getProgramById($id)));
    }

    public function deleteProgram($id){
        echo json_encode(array($this->programDelete($id)));
    }

    public function updateProgram($edit_program_name, $edit_program_description, $edit_program_tags, $edit_program_id){
        $tags_array =  explode(',', $edit_program_tags);
        return $this->updatedProgram($edit_program_name, $edit_program_description, $tags_array, $edit_program_id);
    }

    public function getProgramsForUser($id){



    //    return $this->getSchoolData($this->getChildID($id)['child_id']);
       //return $this->getChildIncome($this->getChildID($id)['child_id'])['income'];
     // return  $this->getChildAge($this->getChildID($id)['child_id']);
    //  return $this->isChildMalnourish($this->getChildID($id)['child_id']);

        return $this->getProgramSchedules();
         
        // foreach( $this->getProgramSchedules() as $programs){
        //     $datetimetoday = date("Y-m-d");

        //     $date_from = date('Y-m-d', strtotime($programs['date_from']));
        //     $date_to = new DateTime($programs['date_to']);
        //     $datetimetoday = new DateTime($datetimetoday);
        //     $days  = $date_to->diff($datetimetoday)->format('%a');
           

        //     var_dump($days);

        // }
    
    }




    //get the child age
    public function getChildAge($id){
        return $this->childAge($id);
    }
    //get the child income
    public function getChildIncome($id){
        return $this->childIncome($id);
        
    }
    public function getSchoolData($id){
        return $this->childSchoolData($id);
    }

    public function getUserGender($id){
        return $this->userGender($id);
    }

    //Check if the child is malnourished
    public function isChildMalnourish($id){
        return $this->checkChildHeightandWeight($id);
    }

    public function getProgramDetails($id){
        return $this->programDetails($id);
    }

    public function enrollChild($id, $program_id){
        echo json_encode([$this->setEnrollChild($id, $program_id)]);
    }
    public function getActivePrograms(){
    
        return $this->getProgramSchedules();
    }

    public function showActiveChildProgram($id){
        
         return $this->activeChildProgram($id);
    }

    public function getCurrentProgram($id){
        
        return $this->currentProgram($id);
   }

   public function dropChild($id, $program_id){
        return $this->dropThisChild($id, $program_id);
   }

   public function getScheduleLimit($program_id){
    
    return $this->checkScheduleLimit($program_id);
  
   }

   public function countEnrolledChildren($program_id){
    return $this->countEnrolled($program_id);
   }

   public function getChildId($id){
    return $this->childID($id);
   }

    

    

}


?>