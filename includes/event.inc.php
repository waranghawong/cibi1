<?php
include "../classes/db.classes.php";
include "../classes/events.classes.php";
include "../classes/events-contr.classes.php";


$events = new EventsCntrl();

if(isset($_GET['id'])){
    $date = new DateTime();
    $date->setDate($date->format('Y'), $date->format('m'), $_GET['id']);
    $new_date =  $date->format('Y-m-d');
    $sd = $events->getEvents($new_date);
}

if(isset($_POST['add_event'])){

    $event_name = $_POST['program_value'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    $days = $_POST['no_days'];
    $event_time = $_POST['event_time'];

    //$events = new eventsContr($event_name,$event_description ,$event_date, $days);
    $events->addEvent($event_name,$event_description ,$event_date, $days, $event_time);

}
?>