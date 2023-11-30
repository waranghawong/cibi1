<?php 
class Logs extends DB{

    protected function setLogs($user_id, $program_id,$notification_name, $notification_body, $notif_type){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("INSERT INTO notification (user_id,program_id, notification_name, notification_body,notif_type,created_at) VALUES (?,?,?,?,?,?)");
        $checkStmt = $stmt->execute([$user_id, $program_id,$notification_name, $notification_body,$notif_type, $datetimetoday]);

        if(!$checkStmt){
            $stmt = null; 
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
    }

    public function getLogs(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM tbl_logs INNER JOIN user ON user.id = tbl_logs.user_id order by datetime");
        $stmt->execute();
        $records = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0){
            return $records;
        }
        else{
            return false;
        }
    }



}
?>