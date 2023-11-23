<?php
    date_default_timezone_set('Asia/Manila');
    include_once '../classes/db.classes.php';
    include_once '../classes/scheduler.classes.php';
    include_once '../classes/scheduler-cntrl.classes.php';

    $sched = new schedulerController();


    $sched->setSchedule();


    if(isset($_POST['btn_edit_submit'])){
        $id = $_POST['edit_schedule_id'];
        $schedule_name = $_POST['program_value'];
        $date_from = $_POST['schedule_date_from'];
        $date_Tto = $_POST['schedule_date_to'];
        $schedule_limit = $_POST['schedule_limit'];


        $sched->updateSchedule($schedule_name,$date_from, $date_Tto, $schedule_limit,$id);
    }

    if(isset($_GET['delete_sched'])){
        $sched->deleteSchedule($_GET['delete_sched']);
    }

    if(isset($_GET['id'])){
       $sched->getCurrentSchedule($_GET['id']); 
    }
