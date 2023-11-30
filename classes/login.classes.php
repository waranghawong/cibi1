<?php

class login extends DB{

    protected function getUser($username, $pwd){
        
            $con = $this->dbOpen(); 
            $stmt = $con->prepare("SELECT UserID, first_name, last_name, username, password, email, phoneNumber, address, role FROM child_account WHERE username = ? UNION SELECT UserID, first_name, last_name, username, password, email, phoneNumber, address, role FROM users WHERE username = ?");
            if(!$stmt->execute(array($username,$username))){
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
            $pass1 = md5($pwd);
          
            $pass = $password[0]['password'];
          

            if($pass1 != $pass){
                $stmt = null;
                header("Location: ../login.php?error=wrong_password");
                exit();

            } 
            elseif($pass1 == $pass){
                $stmt = $con->prepare("SELECT UserID, first_name, last_name, username, password, email, phoneNumber, address, role FROM child_account WHERE username = ? AND password = ? UNION SELECT UserID, first_name, last_name, username, password, email, phoneNumber, address, role FROM users WHERE username = ? AND password = ?");
                if(!$stmt->execute(array($username, $pass1,$username, $pass1))){
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
                if($stmt->rowCount() > 0){
                    if($user['role'] == 'Admin'){
                        $admin = new StartSession($user);
                        header("location: ../admin/index.php");
                     
                    }
                    elseif($user['role'] == 'sub-admin'){
                        $admin = new StartSession($user);
                        header("location: ../users/index.php");
                    }
                    else{
                        $admin = new StartSession($user);
                        header("location: ../child_account/index.php");
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