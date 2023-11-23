<?php


class scheduler extends DB{
    

    protected function Schedule($schedule_id, $date_from, $date_to, $schedule_limit){
        
        $datetimetoday = date("Y-m-d H:i:s");

        $con = $this->dbOpen();
        $stmt = $con->prepare("INSERT INTO schedule (schedule_id, date_from, date_to, isSet ,created_at, schedule_limit) VALUES (?,?,?,?,?,?) ");
        if(!$stmt->execute(array($schedule_id,$date_from, $date_to, 1,$datetimetoday,$schedule_limit))){
            $stmt = null;
            header("location: ../admin/scheduler.php?error=stmtfailed");
            exit();
        }
        //$transaction = new transactionsctnr($user_id, null,$methodName, $datetimetoday, 'added account method '.$methodName.'', $cashin_reference);
        header("location: ../admin/scheduler.php?success=1");

    }

 
    protected function delSchedule($id){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM schedule WHERE id = ?");
        $stmt->execute([$id]);

        //$transaction = new transactionsctnr(null, null ,$method, $datetimetoday, 'successfully deleted payment method with account name: '.$account_name.' and account number: '.$account_number.'', null);
    }

    protected function scheduleId($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM schedule WHERE schedule.id = ?");
        $stmt->execute([$id]);

        $data = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0){
            return $data;
        }
        else{
            return false;
        }
        
    }

    protected function editSchedule($schedule_name,$date_from, $date_Tto, $schedule_limit,$id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE schedule SET schedule_id = ?, date_from = ?, date_to =?, schedule_limit = ? WHERE id = ?");
        $stmt->execute([$schedule_name,$date_from, $date_Tto, $schedule_limit,$id]);

        header('location: ../admin/scheduler.php?success=1');
    }

    protected function showSchedules(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT schedule.id, programs.program_name, programs.program_description, schedule.date_from, schedule.date_to FROM schedule LEFT JOIN programs ON schedule.schedule_id = programs.id;");
        $stmt->execute();

        $data = $stmt->fetchall();
        return $data;
    }

    
    protected function getEventsOnDay(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT t1.id, t2.program_name, t1.program_description, t1.no_of_days, t1.event_time, t1.date FROM schedule_of_events t1 LEFT JOIN programs t2 ON t2.id = t1.program_id");
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

 
}
?>