<?php

class Notification extends Dbh{
        public function notifacation($user_id){
            $today = date('Y-m-d');

            $stmt =  $this -> connect() -> prepare("SELECT * FROM notifications WHERE user_id = ?");

            if(!$stmt ->execute(array($user_id))){
                $stmt = null;
                header('location: ../index.php?stmt=falied');
                exit();
            }
            $notification = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($notification) > 0){
                foreach($notification as $rows){
                    echo "{$rows['messege_reminder']}<br>";
                    echo "Posted on {$rows['created_at']}";
                }
              
            }
            else{
                echo "No notification";
            }
        }
}