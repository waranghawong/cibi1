<?php


class schedulerController extends scheduler{

    public function setSchedule(){
        if(isset($_POST['btn_submit_account_method'])){
            $schedule_name = $_POST['schedule_name'];
            $schedule_category = $_POST['schedule_type'];
            $date = $_POST['schedule_date'];
            $time = $_POST['schedule_time'];

            $this->Schedule($schedule_name,$schedule_category, $date, $time);
        }
    }

    public function updateSchedule($schedule_name,$schedule_category, $date, $time, $id){
        $this->editSchedule($schedule_name,$schedule_category, $date, $time,$id);
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

} 




?>