<?php

class Login extends Dbh{
            
    protected function getUser($email, $pass){
        $stmt = $this->connect()->prepare("SELECT user_password FROM users WHERE  user_email = ? OR first_name=?;");

        if(!$stmt ->execute(array($email,$pass))){
            $stmt = null;
            header('location: ../index.php?stmt=falied');
            exit();
        }
       
        if($stmt -> rowCount() == 0){
            $stmt = null;
            echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
            Email does not exist</p>";
            exit();
        }

        $hash = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $verifiedpassword = password_verify($pass, $hash[0]['user_password']);

        if($verifiedpassword == false){
            $stmt = null;
            echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
            wrong-password</p>";          
            exit();
        }
        elseif($verifiedpassword == true){
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE  user_email = ? OR first_name  AND user_password =?;");

            if(!$stmt ->execute(array($email, $pass))){
                $stmt = null;
                header('location: ../index.php ');
                exit();
            }
            
            if($stmt -> rowCount() == 0){
                $stmt = null;
                echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
                Email does not exist</p>";
                exit();
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();

            $_SESSION['user_id'] = $user[0]['user_id'];
            $_SESSION['first_name'] = $user[0]['first_name'];
            $_SESSION['last_name'] = $user[0]['last_name'];
            $_SESSION['user_email'] =  $user[0]['user_email'];
            
        }
        $stmt = null;
    }
   
}