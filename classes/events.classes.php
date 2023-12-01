<?php

class events extends DB{
    
    protected function programs(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT schedule.id,programs.id ,programs.program_name FROM `programs` INNER JOIN schedule ON programs.id = schedule.schedule_id WHERE schedule.date_from <= CURDATE() AND schedule.date_to >= CURDATE();");
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

        $datetimetoday = date("Y-m-d");
            for($i = 1; $i <= $days; $i++){
               $day = date('Y-m-d', strtotime($datetimetoday. ' + '.$i.' days'));
               
                $id = date('d',strtotime($event_date));
                $connection = $this->dbOpen();
                $stmt = $connection->prepare('INSERT INTO schedule_of_events (program_id, program_description, date, event_time, no_of_days, created_at) VALUES (?,?,?,?,?,?)');
        
                if(!$stmt->execute([$event_name,$event_description ,$day, $event_time, 1, $datetimetoday])){
                    $stmt = null;
                    header("location: index.php?errors=stmtfailed");
                    exit();
                }

            }
            header("location: ../admin/events.php?id=".$id);

    }

    protected function getEventsOnDay($date){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT t1.program_id, t2.program_name, t1.program_description, t1.no_of_days, t1.event_time FROM schedule_of_events t1 LEFT JOIN programs t2 ON t2.id = t1.program_id WHERE date = ?");
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