<?php

class Reservation extends Dbh{
  
    public function reservation($user_id, $room_id, $check_in, $check_out){
        if($this -> check_availabity($room_id) == false){
            echo "
            <p style='background-color: red; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
            Room already booked
            </p>";
            exit();
        }
        else{
            $this -> make_reservation($user_id,$room_id,$check_in, $check_out);
            $this -> update_room($room_id);
        }
    }

    private function check_availabity($room_id){
        $stmt = $this->connect()->prepare("SELECT * FROM rooms WHERE room_number = ?");

        if(!$stmt->execute(array($room_id))){
            $stmt = null;
            header("location: ../menu/reservation.php");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            echo "
            <p style='background-color: red; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
            Room number not found
            </p>";
            exit();
        }
        $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $availabity = $fetch[0]['availability_status'];

        $result = false;
        if($availabity == 'false'){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function make_reservation($user_id, $room_id, $check_in, $check_out){
        $stmt = $this->connect()->prepare("INSERT INTO reservation(user_id,room_id,check_in_date,
        check_out_date,reservation_status)
        VALUES (?,?,?,?,?)");
         if(!$stmt->execute(array($user_id, $room_id, $check_in, $check_out,'false'))){
            $stmt = null;
            header("location: ../menu/reservation.php");
            exit();
        }
        $stmt = null;
    }
    
    private function update_room($room_id){
        $stmt = $this -> connect()->prepare("UPDATE rooms SET availability_status = 'false' WHERE room_number = ?");
        if(!$stmt->execute(array($room_id))){
            $stmt = null;
            header("location: ../menu/reservation.php");
            exit();
        }
        $stmt = null;
    }

    public function update_reservation($room_id, $status){
        $stmt = $this -> connect()->prepare("SELECT * FROM reservation WHERE reservation_id = ?");

        if(!$stmt->execute(array($room_id))){
            $stmt = null;
            header("location: ../menu/reservation.php");
            exit();
        }
        if($stmt->rowCount() == 0){
            $stmt = null;
            echo "
            <p style='background-color: red; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
            Reservation ID not found
            </p>";
            exit();
        }

        $stmt = $this -> connect()->prepare("UPDATE reservation SET reservation_status = ? WHERE reservation_id = ?");
        if(!$stmt->execute(array($status,$room_id))){
            $stmt = null;
            header("location: ../menu/reservation.php");
            exit();
        }
        echo "
        <p style='background-color: green; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
        Reservation updated successfully
        </p>";
        $stmt = null;

    }

    public function view_reservation(){
        $stmt = $this-> connect()-> prepare("SELECT * FROM reservation");

        if(!$stmt ->execute()){
            $stmt = null;
            echo "an error occur";
            exit();
        }

        $history = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<table border=1>";
            echo "<tr>
            <th>reservation_id</th>
            <th>user_id</th>
            <th>room_id</th>  
            <th>check_in_date</th>
            <th>check_out_date</th> 
            <th>reservation_status</th>              
            </t>";
            foreach($history as $row){
                
                echo "
                <tr>
                    <td>{$row['reservation_id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['room_id']}</td>  
                    <td>{$row['check_in_date']}</td>
                    <td>{$row['check_out_date']}</td>   
                    <td>{$row['reservation_status']}</td>             
                </t>";
                
            }
            echo "</table>";  
    }

    public function delete_reservation($reserve_id){
        $stmt = $this -> connect()->prepare("SELECT * FROM reservation WHERE reservation_id = ?");

        if(!$stmt->execute(array($reserve_id))){
            $stmt = null;
            header("location: ../menu/reservation.php");
            exit();
        }
        if($stmt->rowCount() == 0){
            $stmt = null;
            echo "
            <p style='background-color: red; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
            Reservation ID not found
            </p>";
            exit();
        } 
        $stmt = $this -> connect() -> prepare("DELETE FROM reservation WHERE reservation_id = ?");
        if(!$stmt->execute(array($reserve_id))){
            $stmt = null;
            header("location: ../menu/reservation.php");
            exit();
        }
            echo "
            <p style='background-color: red; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
            Reservation deleted succefully
            </p>";

    }
}