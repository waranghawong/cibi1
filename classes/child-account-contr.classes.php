<?php

class childAccountCntrl extends childAccount{

    public function getHasNoAccountChild(){
        return $this->hasNoAccount();
    }

    public function getChildData($id){
        echo json_encode(array($this->childData($id)));
    }
}


?>