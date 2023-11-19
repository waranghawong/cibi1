<?php

class events extends DB{
    
    protected function programs(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT id, program_name FROM programs");
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

    protected function setEvent($event_name,$event_description ,$event_date, $days,$event_time){

            $datetimetoday = date("Y-m-d H:i:s");
            $id = date('d',strtotime($event_date));
            $connection = $this->dbOpen();
            $stmt = $connection->prepare('INSERT INTO schedule_of_events (program_id, program_description, date, event_time, no_of_days, created_at) VALUES (?,?,?,?,?,?)');
    
            if(!$stmt->execute([$event_name,$event_description ,$event_date, $event_time, $days, $datetimetoday])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
                header("location: ../admin/events.php?id=".$id);

    }

    protected function getEventsOnDay($date){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT t1.id, t2.program_name, t1.program_description, t1.no_of_days, t1.event_time FROM schedule_of_events t1 LEFT JOIN programs t2 ON t2.id = t1.program_id WHERE date = ?");
        $stmt->execute([$date]);

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