<?php

class Guest_info extends Dbh{
    public function guest_details($user_id){
        $stmt = $this->connect()->prepare("SELECT * FROM guest_info WHERE user_id = ?");

        if(!$stmt->execute(array($user_id))){
            $stmt = null;
            header("location: ../menu/profile.php?error=stmtfailed");
            exit();
        }

        if($stmt -> rowCount() == 0){
            $stmt = null;
            echo "
            <p style='background-color: red; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
            Guest ID not found
            </p>";
            exit();

        } 
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<table border=1px solid>";
            echo "
                <tr>
                    <th>Firstname</th>
                    <td>{$data[0]['first_name']}</td>
                </tr>
                <tr>
                    <th>Surname</th>
                    <td>{$data[0]['surname']}</td>
                </tr>
                <tr>
                    <th>Initials</th>
                    <td>{$data[0]['initials']}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{$data[0]['gender']}</td>
                </tr>
                <tr>
                    <th>Nationality</th>
                    <td>{$data[0]['nationality']}</td>
                </tr>
                <tr>
                    <th>Marital status</th>
                    <td>{$data[0]['marital_status']}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{$data[0]['title']}</td>
                </tr>
                <tr>
                    <th>Email address</th>
                    <td>{$data[0]['email_address']}</td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <td>{$data[0]['phone_number']}</td>
                </tr>
                <tr>
                    <th>National ID</th>
                    <td>{$data[0]['id_number']}</td>
                </tr>
                <tr>
                    <th>Passport</th>
                    <td>{$data[0]['passport']}</td>
                </tr>
            ";
            echo "</table>";
           
    }
    public function guest_detail(){
        $stmt = $this->connect()->prepare("SELECT * FROM guest_info");

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../menu/profile.php?error=stmtfailed");
            exit();
        }

        if($stmt -> rowCount() == 0){
            $stmt = null;
            echo "
            <p style='background-color: red; color:white; padding-left:30px; padding-right:30px; padding:10px; border-radius: 10px;'>
            Guest ID not found
            </p>";
            exit();

        } 
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<table border=1>";
            echo "<tr>
            <th>guest_id</th>
            <th>user_id</th>
            <th>first_name</th>  
            <th>surname</th>
            <th>intials</th>
            <th>Gender</th> 
            <th>nationality</th> 
            <th>marital</th>
            <th>title</th>
            <th>email</th>  
            <th>phone</th>
            <th>ID</th> 
            <th>passpoert</th>             
            </t>";
            foreach($data as $row){
                
                echo "
                <tr>
                 
                    <td>{$row['guest_id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['surname']}</td>
                    <td>{$row['initials']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['nationality']}</td>
                    <td>{$row['marital_status']}</td>
                    <td>{$row['title']}</td>  
                    <td>{$row['email_address']}</td>
                    <td>{$row['phone_number']}</td>
                    <td>{$row['id_number']}</td>
                    <td>{$row['passport']}</td>
                             
                </t>";
                
            }
            
            echo "</table>";
           
    }
}