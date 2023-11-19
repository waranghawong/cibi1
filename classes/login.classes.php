<?php

class login extends DB{

    protected function getUser($username, $pwd){
        
            $con = $this->dbOpen(); 
            $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
            if(!$stmt->execute(array($username))){
                $stmt = null;
                header("location: ../login.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../login.php?error=user_not_found");
                exit();
            }
            $password = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //$pass1 = md5($pwd);
          
            $pass = $password[0]['password'];
          
            if($pass != $pwd){
                $stmt = null;
                header("Location: ../login.php?error=wrong_password");
                exit();

            } 
            elseif($pwd == $pass){
                $stmt = $con->prepare("SELECT UserID, first_name, last_name, usernamen role  FROM users WHERE username = ? AND password = ?");
                if(!$stmt->execute(array($username, $pwd))){
                    $stmt = null;
                    header("Location: ../login.php?error=stmt_failed");
                    exit();
                }
                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("Location: ../login.php?error=user_not_found");
                    exit();
                }
                    
                $user = $stmt->fetch();
                var_dump($user['role']);
                if($stmt->rowCount() > 0){
                    if($user['role'] == 'Admin'){
                        $admin = new StartSession($user);
                        header("location: ../admin/index.php");
                     
                    }
                    elseif($user['role'] == 'sub-admin'){
                        $admin = new StartSession($user);
                        header("location: ../users/index.php");
                    }
            
                }
                else{
                    header("location: ../login.php?error=UserNotFound");
                }
                
       
            }
    
            $stmt = null;
             
    }

}


?>