<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="../menu/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <!------------------------------Naviagation bar section starts here------------------------------------->
        <div id="nav">
            <ul>
                <li><i class="fa-solid fa-house"></i> <a href="../menu/dashboarduser.php">Home</a>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i><a href="../menu/profile.php">Profile</a>
                </li>
                <li>
                    <i class="fa-solid fa-house"></i><a href="../menu/rooms.php">Rooms</a>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i><a href="../menu/reservation.php">Reservation</a>
                </li>
                <li>
                    <i class="fa-solid fa-file-invoice-dollar"></i><a href="../menu/payment.php">Payment</a>
                </li>
                <li>
                    <i class="fa-solid fa-gear"></i><a href="../menu/notification.php">Notification</a>
                </li>
                <li>
                    <i class="fa-solid fa-question"></i> <a href="../menu/history.php">History</a>
                </li>

                <div class="logout">
                    <form action="../includes/logout.php" method="post">
                        <button type="submit" name="logout_btn" id="logout"> Logout</button>
                    </form>

                </div>
            </ul>
        </div>
        <!------------------------------Naviagation bar section ends here----------------------------------------->
        <!------------------------------Main content section starts here------------------------------------------------------>

        <section class="main">
            <div class="pay">
                <h2>Payment</h2>
                <div class="payment-details ">
                    
                    
                        <?php


                        include '../classes/dbh.class.php';
                        include '../classes/payment.class.php';

                        if(isset($_POST['upload'])){
                            $date = $_POST['date'];
                            $amount = $_POST['amount'];


                            $pay = new Payment();
                            $pay -> verify_payment($_SESSION['user_id'], $amount, $date);

                            $file = $_FILES['file'];
                            $file_name = $_FILES['file']['name'];
                            $file_tmp = $_FILES['file']['tmp_name'];
                            $file_type = $_FILES['file']['type'];
                            $file_size = $_FILES['file']['size'];
                            $file_error = $_FILES['file']['error'];

                            $file_ex = explode(".",$file_name);
                            $fileActualEx = strtolower(end($file_ex));

                            $allowed = array('jpg','jpeg', 'png','pdf');

                            if(in_array($fileActualEx, $allowed)){
                                if($file_error === 0){
                                    if($file_size < 10000000){
                                        $fileNewName = uniqid('',true). ".".$fileActualEx;

                                        $fileFolder = 'upload/'. $fileNewName;
                                        move_uploaded_file($file_tmp, $fileFolder);
                                            
                                        echo "<p style='background-color: green; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
                                        File uploaded successfully</p>";
                                    }
                                    else{
                                        echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
                                            file is too large try again</p>";
                                        
                                    }
                                }
                                else{
                                    echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
                                        An error occur during upload</p>";
                                }
                            }
                            else{
                                echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
                                Invalid file format</p>";
                            }

                            
                        } 

                        ?>
                </div>
                
            </div>

        </section>
        <!-----------------------------Main content section ends here---------------------------------------------------------->

    </div>
</body>

</html>


