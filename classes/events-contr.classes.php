<?php 


class EventsCntrl extends events{

    public function getPrograms(){
        return $this->programs();
    }

    public function addEvent($event_name,$event_description ,$event_date, $days,$event_time){
        return $this->setEvent($event_name,$event_description ,$event_date, $days,$event_time);
    }

    public function getEvents($date){
        return $this->getEventsOnDay($date);
    }
}



?>