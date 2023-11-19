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

}


?>