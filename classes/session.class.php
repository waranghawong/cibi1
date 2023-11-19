<?php

    class StartSession {
        private $array;

        public function __construct($array){
            $this->array = $array;

            $this->session($array);
        }

        public function session($array){
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['userdata'] = array(
                'user_id' => $array['UserID'],
                'full_name' => $array['first_name'].' '.$array["last_name"],
                'username' => $array['username'],
                'role' => $array['role']  
            );
            return $_SESSION['userdata'];
        }
    }
    

?>