<?php

class userClass extends DB{

    protected function addUser($fname, $lname, $username,$email,  $address, $password, $phone,$child_profile_restriction, $scheduler_restriction, $reports_restriction, $utilities_restriction, $user_management_restriction){
        $datetimetoday = date("Y-m-d H:i:s");
        $password = md5($password);
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO users (first_name, last_name,username, email, address, password,phoneNumber, role, user_management, child_profile, scheduler, reports, utilities ,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$fname, $lname, $username,$email,  $address, $password, $phone,'sub-admin',$user_management_restriction, $child_profile_restriction, $scheduler_restriction, $reports_restriction, $utilities_restriction, $datetimetoday])){
            $stmt = null;
            header("location: index.php?errors=stmtfailed");
            exit();
        }
            header("location: ../admin/users.php");

        
    }

    protected function listofUsers(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM users WHERE role='sub-admin'" );
        $stmt->execute();

        $users = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0){
            return $users;
        }
        else{
            return false;
        }
    }

    protected function delAdmin($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM users WHERE userID = ?");
        $stmt->execute([$id]);
    }

    protected function subAdmin($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM users WHERE userID = ?");
        $stmt->execute([$id]);

        $data = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0){
            return $data;
        }
        else{
            return false;
        }
    }

    protected function editSubAdmin($edit_first_name, $edit_last_name, $edit_username,$edit_password, $edit_email, $edit_address,$child_profile_restriction,$scheduler_restriction,$reports_restriction,$utilities_restriction,$user_management_restriction , $edit_sub_id){
        $connection = $this->dbOpen();
        if($edit_password != ''){
            $edit_password = md5($password);
            $stmt = $connection->prepare("UPDATE users SET first_name = ?, last_name = ?,username =?, email = ?, address = ?, password = ?, user_management = ?, child_profile = ?,  scheduler = ?, reports = ?,utilities = ? WHERE UserID = ?");
            if(!$stmt->execute([$edit_first_name, $edit_last_name, $edit_username, $edit_email,  $edit_address, $edit_password ,$user_management_restriction, $child_profile_restriction, $scheduler_restriction, $reports_restriction, $utilities_restriction, $edit_sub_id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
                header("location: ../admin/users.php?success=1");

        }
        else{
   
            $stmt = $connection->prepare("UPDATE users SET first_name = ?, last_name = ?,username =?, email = ?, address = ?, user_management = ?, child_profile = ?,  scheduler = ?, reports = ?,utilities = ? WHERE UserID = ?");
            if(!$stmt->execute([$edit_first_name, $edit_last_name, $edit_username, $edit_email,  $edit_address ,$user_management_restriction, $child_profile_restriction, $scheduler_restriction, $reports_restriction, $utilities_restriction, $edit_sub_id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
                header("location: ../admin/users.php?success=1");

        }

     
    }

    protected function getCurrentSchoolYear(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT school_year FROM school_year ORDER BY id DESC LIMIT 1");
        $stmt->execute();

        $data = $stmt->fetch();
        $total = $stmt->rowCount();

        if($total > 0){
            return $data;
        }
        else{
            return false;
        }
    }

    protected function checkUsername($username){
        $resultCheck;
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if($stmt->rowCount() > 0 ){
            $resultCheck = true;
        }
        else{
            $resultCheck = false;
        }
        return $resultCheck;
     
    }



}



?>