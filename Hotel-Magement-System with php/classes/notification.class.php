<?php

class Notification extends Dbh{
        public function check_due_date($user_id){
            $today = date('Y-m-d');

            $stmt =  $this -> connect() -> prepare("SELECT * FROM reservation WHERE check_out_date = ?");

            if(!$stmt ->execute(array($today))){
                $stmt = null;
                header('location: ../notification.php?stmt=falied');
                exit();
            }
            if($stmt -> rowCount() == 0){ 
                $stmt = null;
                echo "
                <p style='background-color: green; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
                No due date found
                </p>";
            
                exit();
            }
            $due_date = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($due_date) > 0){
                foreach($due_date as $rows){
                    $message = "Reminder: The reservation of the room number '{$rows['room_id']}' has reach due date  ";

                    $stmt = $this->connect()->prepare("INSERT INTO notifications (user_id, messege_reminder) VALUES(?,?)");
                    if(!$stmt ->execute(array($user_id, $message))){
                        $stmt = null;
                        header('location: ../index.php?stmt=falied');
                        exit();
                    }
                }

                $stmt = $this-> connect()-> prepare("UPDATE rooms SET availability_status = 'true' WHERE room_id = ?");

                if(!$stmt ->execute(array($due_date[0]['room_id']))){
                    $stmt = null;
                    echo "an error occur";
                    exit();
                }                
                echo "
                <p style='background-color: green; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
                Notification have sent
                </p>";
               
            }
            else{
                echo "
                <p style='background-color: green; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
                Notification not sent
                </p>";
            }
        }

        public function update_notification($message,$notificaton_id){
            $stmt = $this->connect()-> prepare("SELECT * FROM notifications WHERE notification_id = ?");
            if(!$stmt ->execute(array($notificaton_id))){
                $stmt = null;
                header('location: ../admin/notification.php?stmt=falied');
                exit();
            }
            if($stmt -> rowCount() == 0){
                $stmt = null;
                echo "
                <p style='background-color: red; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
                Notification ID not found
                </p>";
                exit();
            } 

            $stmt = $this->connect()->prepare("UPDATE notifications SET messege_reminder = ? 
                WHERE notification_id = ?");
            if(!$stmt ->execute(array($message, $notificaton_id))){
                $stmt = null;
                header('location: ../admin/notification.php?stmt=falied');
                exit();
            }
            $stmt = null;
        }

        public function delete_notification($notificaton_id){
            $stmt = $this->connect()-> prepare("SELECT * FROM notifications WHERE notification_id = ?");
            if(!$stmt ->execute(array($notificaton_id))){
                $stmt = null;
                header('location: ../admin/notification.php?stmt=falied');
                exit();
            }
            if($stmt -> rowCount() == 0){
                $stmt = null;
                echo "
                <p style='background-color: red; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
                NotificationID not found
                </p>";
                exit();
            } 
            $stmt = $this -> connect()->prepare("DELETE FROM notifications WHERE notification_id = ?");
            if(!$stmt ->execute(array($notificaton_id))){
                $stmt = null;
                header('location: ../admin/notification.php?stmt=falied');
                exit();
            }
            echo "
            <p style='background-color: green; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
            Notification delete successfully
            </p>";
        }

        public function view_nofitification(){
             $stmt = $this->connect()-> prepare("SELECT * FROM notifications");
            if(!$stmt ->execute()){
                $stmt = null;
                header('location: ../admin/notification.php?stmt=falied');
                exit();
            }
        
            $notification = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($notification) > 0){
                echo "<table border=2px>";
                echo "<tr>
                    <th>Notifaction_id</th>
                    <th>User_id</th>
                    <th>Messege</th>
                    <th>Time</th>
                </tr>";
                foreach($notification as $rows){
                    echo "<tr>
                        <td>{$rows['notification_id']}</td>
                        <td>{$rows['user_id']}</td>
                        <td>{$rows['messege_reminder']}</td>
                        <td>{$rows['created_at']}</td>
                    </tr>";
                }
                echo "</table>";
            }
            else{
                echo "No notification";
            }
         
        }
}