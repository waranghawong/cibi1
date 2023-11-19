<?php


class scheduler extends DB{
    

    protected function Schedule($schedule_name,$schedule_category, $date, $time){
        
        $datetimetoday = date("Y-m-d H:i:s");

        $con = $this->dbOpen();
        $stmt = $con->prepare("INSERT INTO schedule (schedule_name, schedule_category, date, time ,created_at) VALUES (?,?,?,?,?) ");
        if(!$stmt->execute(array($schedule_name,$schedule_category, $date, $time,$datetimetoday))){
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
        $stmt = $connection->prepare("SELECT * FROM schedule WHERE id = ?");
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

    protected function editSchedule($schedule_name,$schedule_category, $date, $time,$id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE schedule SET schedule_name = ?, schedule_category = ?, date =?, time = ? WHERE id = ?");
        $stmt->execute([$schedule_name,$schedule_category, $date, $time, $id]);
        header('location: ../admin/scheduler.php?success=1');
    }

    protected function showSchedules(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM schedule");
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

 
}
?>