<?php


class schedulerController extends scheduler{

    public function setSchedule(){
        if(isset($_POST['btn_submit_account_method'])){
            $schedule_name = $_POST['program_value'];
            $date_from = $_POST['schedule_date_from'];
            $date_to = $_POST['schedule_date_to'];
            $schedule_limit = $_POST['schedule_limit'];

            $this->Schedule($schedule_name, $date_from, $date_to, $schedule_limit);
        }
    }

    public function updateSchedule($schedule_name,$date_from, $date_Tto, $schedule_limit,$id){
        $this->editSchedule($schedule_name,$date_from, $date_Tto, $schedule_limit,$id);
    }

    public function deleteSchedule($id){
        $this->delSchedule($id);
        return json_encode(array("statusCode"=>200));
    }

    public function getSchedules(){
        return $this->showSchedules();
    }

    public function getCurrentSchedule($id){
        echo json_encode($this->scheduleId($id)) ;
    }

    public function getEvents(){
        return $this->getEventsOnDay();
    }

    public function getPrograms(){
        return $this->programs();
    }



} 




?>