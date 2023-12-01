<?php

class programs extends DB{

    protected function addProgram($program_name, $program_description, $tags_array){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO programs (program_name, program_description,created_at) VALUES (?,?,?)');

        if($stmt->execute([$program_name, $program_description,$datetimetoday])){
            foreach($tags_array as $array){
                 $connection2 = $this->dbOpen();
                 $stmt2 = $connection2->prepare('INSERT INTO program_tags (program_id, tag_name) VALUES (?,?)');
                 $stmt2->execute([$connection->lastInsertId(), $array]);
            } 
           
            header("location: ../admin/programs.php");
        }
        else{
            $stmt = null;
            header("location: ../admin/programs.php?errors=stmtfailed");
            exit();
        }
      
    }

    protected function showALlPRograms(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT id, program_name, program_description, ( SELECT group_concat(tag_name, ' ')  from program_tags where program_id = t1.id) as tags FROM programs t1" );
        $stmt->execute();

        $users = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0){
            return $users;
        }
        else{
            return false;
        }
    }

    protected function getProgramById($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT id, program_name, program_description, ( SELECT group_concat(tag_name, ' ')  from program_tags where program_id = t1.id) as tags FROM programs t1 WHERE id = ?");
        $stmt->execute([$id]);

        $data = $stmt->fetch();
        $total = $stmt->rowCount();

        if($total > 0){
            return $data;
        }
        else{
            return false;
        }
    }

    protected function programDelete($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM programs WHERE id = ?");
        $stmt->execute([$id]);
    }

    protected function updatedProgram($edit_program_name, $edit_program_description, $edit_program_tags, $edit_program_id){
        $connection = $this->dbOpen();
            $stmt = $connection->prepare("UPDATE programs SET program_name = ?, program_description = ? WHERE id = ?");
            if(!$stmt->execute([$edit_program_name, $edit_program_description,  $edit_program_id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
            else{
                if($edit_program_tags == ''){
                    header("location: ../admin/programs.php");
                }
                else{
                    $stmt1 = $connection->prepare("DELETE FROM program_tags WHERE program_id = ?");
                    if($stmt1->execute([$edit_program_id])){
                        foreach($edit_program_tags as $array){
                            $connection2 = $this->dbOpen();
                            $stmt2 = $connection2->prepare('INSERT INTO program_tags (program_id, tag_name) VALUES (?,?)');
                            $stmt2->execute([$edit_program_id, $array]);
                            header("location: ../admin/programs.php");
                        } 
                                
                       
                    }
                    else{
                        header("location: ../admin/programs.php");
                    }
                    
                }
            }
    
    }

    protected function getProgramSchedules(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT programs.id, programs.program_name, programs.program_description, GROUP_CONCAT(program_tags.tag_name, ' ') as tags, schedule.date_from, schedule.date_to, schedule.schedule_limit FROM programs LEFT JOIN program_tags ON programs.id = program_tags.program_id LEFT JOIN schedule ON schedule.schedule_id = programs.id WHERE schedule.date_from <= CURDATE() AND schedule.date_to >= CURDATE() GROUP BY programs.id;");
        $stmt->execute();
        $data = $stmt->fetchall();

        if($stmt->rowCount() > 0 ){
           return $data;
        }
        else{
            return false;
        }
    }


    protected function checkChildHeightandWeight($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT height, weight, dob FROM child_info WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();


        $weight = $data['weight'];
        $height = $data['height'];

        $HInches = $height * 0.393701;
        $WPound = $weight*2.2;

        $BMIIndex = round($WPound/($HInches*$HInches)* 703,2);

        if ($BMIIndex < 18.5) {
             return $Message="underweight";
        } else if ($BMIIndex <= 24.9) {
             return $Message="normal";
        } else if ($BMIIndex <= 29.9) {
             return $Message="overweight";
        } else {
             return $Message="obese";
        }
    }


    protected function childAge($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT dob FROM child_info WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        $birthday = new DateTime($data['dob']);
        $now = new DateTime();
        $years_old = $now->diff($birthday);


        return $years_old->y;
    }   

    protected function getChildID($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT child_id FROM child_account WHERE UserID  = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if($stmt->rowCount() > 0 ){
           return $data;
        }
        else{
            return false;
        }
    }

    protected function childIncome($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT income FROM child_house_hold_information WHERE child_id  = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if($stmt->rowCount() > 0 ){
           return $data;
        }
        else{
            return false;
        }
    }

    protected function childSchoolData($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM child_school_info WHERE child_id  = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if($stmt->rowCount() > 0 ){
           return $data;
        }
        else{
            return false;
        }
    }

    protected function programDetails($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT programs.id, programs.program_name, programs.program_description, GROUP_CONCAT(program_tags.tag_name, ' ') as tags, schedule.date_from, schedule.date_to, schedule.schedule_limit FROM programs LEFT JOIN program_tags ON programs.id = program_tags.program_id LEFT JOIN schedule ON schedule.schedule_id = programs.id WHERE schedule.date_from <= CURDATE() AND schedule.date_to >= CURDATE() AND programs.id = ? GROUP BY programs.id;");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if($stmt->rowCount() > 0 ){
           return $data;
        }
        else{
            return false;
        }
    }

    protected function setEnrollChild($id, $program_id){
  
        if($this->checkScheduleLimit($program_id)['schedule_limit'] == $this->countEnrolled($program_id)['total_enrolled']){

            return array('error' => 'Maximum Enrolled Child has been reached!','id'=>$id, 'program_id'=>$program_id);

        }else{

            $datetimetoday = date("Y-m-d H:i:s");
            $connection = $this->dbOpen();
            $stmt = $connection->prepare('INSERT INTO child_program (child_id, program_id,is_enrolled, created_at) VALUES (?,?,?,?)');
            if($this->checkEnrolledExist($id, $program_id) == true){
               
                return array('error' => 'You are already enrolled in this program ','id'=>$id, 'program_id'=>$program_id);
            }
            else{
                if(!$stmt->execute([$id, $program_id, 1, $datetimetoday])){
                    $stmt = null;
                    header("location: ../admin/programs.php?errors=stmtfailed");
                    exit();
                }
                $logs = new LogsController($id, $program_id, 'has successfully enrolled a program', 'has successfully enrolled to this program at '.$datetimetoday.'', 'enroll');
                return array('success' => 'You have successfully enrolled ','id'=>$id, 'program_id'=>$program_id);
            }

        }
       
     
    }

    protected function checkEnrolledExist($id, $program_id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM child_program WHERE child_id  = ? AND program_id = ?");
        $stmt->execute([$id, $program_id]);
        if($stmt->rowCount() > 0 ){
           return true;
        }
        else{
            return false;
        }
    }

    protected function activeChildProgram($id){

        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT child_account.first_name, child_account.last_name, child_program.child_id, child_program.program_id FROM child_program LEFT JOIN programs ON programs.id = child_program.program_id LEFT JOIN child_account ON child_account.UserID = child_program.child_id WHERE child_program.program_id = ? AND child_program.is_enrolled = 1");
      
        $stmt->execute([$id]);
        if($stmt->rowCount() > 0 ){
           return $stmt->fetchall();
        }
        else{
            return false;
        }
    }

    protected function currentProgram($id){

        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT program_name FROM programs WHERE id = ?");
      
        $stmt->execute([$id]);
        if($stmt->rowCount() > 0 ){
           return $stmt->fetch();
        }
        else{
            return false;
        }
    }

    protected function dropThisChild($id, $program_id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE child_program SET is_enrolled = ? WHERE child_id = ? AND program_id = ?");
      
        $stmt->execute([0,$id, $program_id]);
        if($stmt->rowCount() > 0 ){
        echo json_encode(array("success"=>"1"));
        }
        else{
            return false;
        }
    }

    protected function checkScheduleLimit($program_id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT schedule_limit FROM schedule WHERE schedule_id = ?");
      
        $stmt->execute([$program_id]);
        if($stmt->rowCount() > 0 ){
           return $stmt->fetch();
        }
        else{
            return false;
        }
    }

    protected function countEnrolled($program_id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT count(program_id) as total_enrolled FROM child_program WHERE program_id = ? and is_enrolled = 1;");
      
        $stmt->execute([$program_id]);
        if($stmt->rowCount() > 0 ){
           return $stmt->fetch();
        }
        else{
            return false;
        }
    }

    protected function childID($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT child_id FROM child_account WHERE UserID = ?");
      
        $stmt->execute([$id]);
        if($stmt->rowCount() > 0 ){
           return $stmt->fetch();
        }
        else{
            return false;
        }
    }

    protected function userGender($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT gender FROM child_info WHERE id = ?");
      
        $stmt->execute([$id]);
        if($stmt->rowCount() > 0 ){
           return $stmt->fetch();
        }
        else{
            return false;
        }
    }




}


?>