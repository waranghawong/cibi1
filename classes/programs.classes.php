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
}


?>