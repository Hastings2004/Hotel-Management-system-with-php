<?php

class Guest extends Dbh{
    protected function add_guestinfo($user_id,$first_name,
        $surname,$initils,$gender,$nationality,$marital_status,
        $title,$email_address,$phone_number,$id_number,$passport){

        $stmt = $this->connect()->prepare("INSERT INTO guest_info(user_id,first_name,
            surname,initials,gender,nationality,marital_status,title,
            email_address,phone_number,id_number,passport)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        
       
        if(!$stmt ->execute(array($user_id,$first_name,
            $surname,$initils,$gender,$nationality,$marital_status,
            $title,$email_address,$phone_number,$id_number,$passport))){

            $stmt = null;
            header('location: ../menu/profile.php?error=stmt-failed');
            exit();
        }
        $stmt = null;
    }
      
    protected function check_guest($user_id,$first_name,$email_address, $phone_number){
        $stmt = $this->connect()->prepare("SELECT * FROM guest_info WHERE user_id = ? OR first_name = ? 
            OR email_address = ? OR phone_number = ?");

        if(!$stmt ->execute(array($user_id,$first_name,$email_address, $phone_number))){
            $stmt = null;
            header('location: ../menu/profile.php?error=stmt-failed');
            exit();
        }
        $resultCheck =false;
        if($stmt -> rowCount() >0){
            $resultCheck =false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck;
    }
}