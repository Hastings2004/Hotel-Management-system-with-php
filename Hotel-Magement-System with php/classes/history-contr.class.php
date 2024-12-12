<?php

class History extends Dbh{
    private $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }
    public function view_history(){
        $stmt = $this->connect()->prepare("SELECT * FROM reservation WHERE user_id = ?");

        if(!$stmt->execute(array($this->user_id))){
            $stmt = null;
            header("location: ../menu/history.inc.php?error=stmtfailed");
            exit();
        }

        if($stmt -> rowCount() == 0){
            $stmt = null;
            header("location: ../menu/history.inc.php?error=no-history-found");
            exit();
        } else{
            $history = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<table border=1>";
            echo "<tr>
            <th>user_id</th>
            <th>room_id</th>  
            <th>check_in_date</th>
            <th>check_out_date</th> 
            <th>reservation_status</th>              
            </t>";
            foreach($history as $row){
                
                echo "
                <tr>
                    <td>{$row['user_id']}</td>
                    <td>{$row['room_id']}</td>  
                    <td>{$row['check_in_date']}</td>
                    <td>{$row['check_out_date']}</td>   
                    <td>{$row['reservation_status']}</td>             
                </t>";
                
            }
            echo "</table>";
        }
    }
}