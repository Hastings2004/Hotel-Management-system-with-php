<?php

class SignUpContr extends Dbh{
      
    protected function setUser($fname, $sname, $email, $pass){

        $stmt = $this->connect()->prepare("INSERT INTO users(first_name, last_name, user_email, user_password)
        VALUES (?,?,?,?)");
        
       $hash = password_hash($pass, PASSWORD_DEFAULT);
       
        if(!$stmt ->execute(array($fname, $sname, $email, $hash))){
            $stmt = null;
            header('location: ../includes/sign_up.php?error=stmt-failed');
            exit();
        }
        $stmt = null;
    }
      
    protected function checkUser($email, $pass){
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE  user_email = ?");

        if(!$stmt ->execute(array($email))){
            $stmt = null;
            header('location: ../includes/sign_up.php?error=stmt-failed');
            exit();
        }

        $resultCheck =false;
        if($stmt -> rowCount() > 0){
            $resultCheck =false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck;
    }
}