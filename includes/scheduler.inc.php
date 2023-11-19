<?php
    date_default_timezone_set('Asia/Manila');
    include_once '../classes/db.classes.php';
    include_once '../classes/scheduler.classes.php';
    include_once '../classes/scheduler-cntrl.classes.php';

    $sched = new schedulerController();


    $sched->setSchedule();


    if(isset($_POST['btn_edit_submit'])){
        $id = $_POST['edit_schedule_id'];
        $schedule_name = $_POST['edit_schedule_name'];
        $schedule_category = $_POST['edit_schedule_type'];
        $date = $_POST['edit_schedule_date'];
        $time = $_POST['edit_schedule_time'];


        $sched->updateSchedule($schedule_name,$schedule_category, $date, $time,$id);
    }

    if(isset($_GET['delete_sched'])){
        $sched->deleteSchedule($_GET['delete_sched']);
    }

    if(isset($_GET['id'])){
       $sched->getCurrentSchedule($_GET['id']); 
    }
