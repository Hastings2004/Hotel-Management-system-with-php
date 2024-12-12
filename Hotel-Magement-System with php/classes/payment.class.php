<?php

class Payment extends Dbh{
    public function verify_payment($user_id,$amount,$date){
        $stmt = $this -> connect() -> prepare("SELECT * FROM reservation WHERE
             user_id = ?");

        if(!$stmt->execute(array($user_id))){
            $stmt = null;
            header("location: ../menu/payment.php");
            exit();
        }

        if($stmt -> rowCount() == 0){
            $stmt = null;
            echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
                Reservation not found</p>";
            exit();
        }

        $details = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        $stmt = $this->connect()->prepare('SELECT price FROM rooms WHERE room_id = ?');
        if(!$stmt->execute(array($details[0]['room_id']))){
            $stmt = null;
            header("location: ../menu/payment.php");
            exit();
        }

        if($stmt -> rowCount() == 0){
            $stmt = null;
            echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
            Room does not exist</p>";
            exit();
        }

        $price = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        if($amount < $price[0]['price']){
            $stmt = null;
            echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
                Your amount is low</p>";
            exit();
        }
        
        $stmt = $this->connect()->prepare("INSERT INTO payment (reservation_id,payment_date,amount)
         VALUES(?,?,?)");

        if(!$stmt->execute(array($details[0]['reservation_id'], $date, $amount))){
            $stmt = null;
            header("location: ../menu/payment.php?error");
            exit();
        }  

        $stmt = $this -> connect()->prepare("UPDATE reservation 
            SET reservation_status = 'true' WHERE reservation_id = ?");

        if(!$stmt->execute(array($details[0]['reservation_id']))){
            $stmt = null;
            header("location: ../menu/reservation.php");
            exit();
        }
        echo "<p style='background-color: green; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
                Payment succefully done</p>";
        
        $stmt = null;
    }
   
}