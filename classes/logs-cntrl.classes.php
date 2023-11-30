<?php

class LogsController extends Logs{

    private $user_id;
    private $program_id;
    private $notification_name;
    private $notification_body;
    private $notif_type;



    public function __construct($user_id, $program_id, $notification_name, $notification_body,$notif_type){
        $this->user_id = $user_id;
        $this->program_id = $program_id;
        $this->notification_name = $notification_name;
        $this->notification_body = $notification_body;
        $this->notif_type = $notif_type;
   
        $this->addToLogs($this->user_id, $this->program_id, $this->notification_name, $this->notification_body, $this->notif_type);
    }

    public function addToLogs($user_id, $program_id,$notification_name, $notification_body, $notif_type){

        $this->setLogs($user_id, $program_id,$notification_name, $notification_body, $notif_type);

    }

    public function showListofLogs(){
        return $this->getLogs();
    }


}

?>