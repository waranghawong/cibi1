<?php 

class childAccount extends DB{
    protected function hasNoAccount(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM child_info WHERE has_account = 0 ");
        $stmt->execute();


        $data = $stmt->fetchall();
        if($stmt->rowCount() > 0){
            return $data;
        }
        else{
            return false;
        }
    }

    protected function childData($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT t1.id, t1.first_name, t1.last_name, t2.address FROM child_info t1 LEFT JOIN child_house_hold_information t2 ON t1.id = t2.child_id WHERE t1.id = ?");
        $stmt->execute([$id]);


        $data = $stmt->fetch();
        if($stmt->rowCount() > 0){
            return $data;
        }
        else{
            return false;
        }
    }

    protected function checkUsername($username){
        $resultCheck;
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT username FROM child_account WHERE username = ?");
        $stmt->execute([$username]);

        if($stmt->rowCount() > 0 ){
            $resultCheck = true;
        }
        else{
            $resultCheck = false;
        }
        return $resultCheck;
     
    }

    protected function addChildAccount($fname, $lname, $username,$email,  $address, $password, $phone, $child_id){
        $datetimetoday = date("Y-m-d H:i:s");
        $password = md5($password);
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO child_account (child_id, first_name, last_name,username, email, address, password,phoneNumber, role ,created_at) VALUES (?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$child_id,$fname, $lname, $username,$email,  $address, $password, $phone,'child-account', $datetimetoday])){
            $stmt = null;
            header("location: ../admin/child-accounts.php?errors=stmtfailed");
            exit();
        }
            header("location: ../admin/child-accounts.php");
    }
}


?>