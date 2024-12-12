<?php

class Change extends Dbh{
    protected function update_password($email, $odlPass, $newPass){
        $stmt = $this->connect()->prepare("SELECT user_password FROM users WHERE user_email = ? OR user_password = ?;");

        if(!$stmt ->execute(array($email, $odlPass))){
            $stmt = null;
            header('location: ../menu/profile.php?stmt=falied');
            exit();
        }
       
        if($stmt -> rowCount() == 0){
            $stmt = null;
            header("location: ../menu/profile.php?error=not exit ");
            exit();
        }
        $hash = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $verifiedpassword = password_verify($odlPass, $hash[0]['user_password']);

        if($verifiedpassword == false){
            $stmt = null;
            header("location: ../menu/profile.php?error=wrong-password");
            exit();
        }
        /*if($verifiedpassword !== $newPass){
            $stmt = null;
            header("location: ../menu/profile.php?error=old-password-is-matching-with-new-password");
            exit();
        }*/
        elseif($verifiedpassword == true){
            $stmt = $this->connect()->prepare("UPDATE users SET user_password = ? WHERE  user_email = ?");
            $hash = password_hash($newPass, PASSWORD_DEFAULT);
            if(!$stmt ->execute(array($hash, $email))){
                $stmt = null;
                header('location: ../menu/profile.php?stmt=failed');
                exit();
            }
            
           
        }
        $stmt = null;
    }
}