<?php

class Room extends Dbh{
    public function add_rooms($room_no, $room_type, $availabilty, $price){
        $stmt = $this-> connect()-> prepare("SELECT * FROM rooms WHERE room_id = ?");

        if(!$stmt ->execute(array($room_no))){
            $stmt = null;
            echo "an error occur";
             exit();
        }
        if($stmt -> rowCount() > 0){
            $stmt = null;
            echo "
                <p style='background-color: red; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
                Room number already exist
                </p>";
      
            exit();
        }                       
        $stmt = $this-> connect()-> prepare("INSERT INTO rooms (room_number, room_type, availability_status, price)
         VALUES (?,?,?,?)");

         if(!$stmt ->execute(array($room_no, $room_type, $availabilty, $price))){
            $stmt = null;
            echo "an error occur";
            exit();                       
        }
        echo "
        <p style='background-color: green; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
        Room successfully added
        </p>";

    }
                                              
    public function update_status($room_no,$availabilty){
        $stmt = $this-> connect()-> prepare("SELECT * FROM rooms WHERE room_id = ?");

        if(!$stmt ->execute(array($room_no))){
            $stmt = null;
            echo "an error occur";
            exit();                      
        }
        if($stmt -> rowCount() == 0){
            $stmt = null;
            echo "
                <p style='background-color: green; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
                Room number does notexist
                </p>";
            exit();
        }                      
        
        $stmt = $this-> connect()-> prepare("UPDATE rooms SET availability_status = ? WHERE room_id = ?");
                                
        
        if(!$stmt ->execute(array($availabilty,$room_no))){
            $stmt = null;
            echo "an error occur";
            exit();
        }
        echo "
        <p style='background-color: red; color:white; padding-right:30px; padding-left:30px; padding:10px; border-radius: 10px;'>
        The room has updated successfully
        </p>";
    }

    public function delete_rooms($room_no){
        $stmt = $this-> connect()-> prepare("SELECT * FROM rooms WHERE room_id = ?");

        if(!$stmt ->execute(array($room_no))){
            $stmt = null;
            echo "an error occur";
            exit();
        }                        
        if($stmt -> rowCount() == 0){
            $stmt = null;
            echo "room number doest not exit";
            exit();
        }                        
        $stmt = $this-> connect()-> prepare("DELETE FROM rooms WHERE room_id = ?");
                                
        if(!$stmt ->execute(array($room_no))){
            $stmt = null;
            echo "an error occur";
            exit();
        }
        echo "
        <p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
        The has been deleted successfully
        </p>";
    }                                               

    public function view_available_rooms(){
        $stmt = $this-> connect()-> prepare("SELECT * FROM rooms");

        if(!$stmt ->execute()){
            $stmt = null;
            echo "an error occur";
            exit();
        }

        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border=1>";
        echo "<tr>
        <th>Room_id</th>
        <th>Room_number</th>  
        <th>Room_type</th>
        <th>Availabity</th> 
        <th>Price</th>              
        </t>";                           
                                    
        if(count($details) > 0){
            foreach($details as $row){                            
                echo "
                <tr>
                    <td>{$row['room_id']}</td>
                    <td>{$row['room_number']}</td>  
                    <td>{$row['room_type']}</td>
                    <td>{$row['availability_status']}</td>   
                    <td>{$row['price']}</td>             
                </t>";
                }
                echo "</table>";                                                 
                }
                else{
                    echo "
                    <p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
                    Room found
                    </p>";
                }                       
                                    
    }
}
                        
                    


