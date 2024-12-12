<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reservation page</title>
    <link rel="stylesheet" href="../menu/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <!------------------------------Naviagation bar section starts here------------------------------------->
        <div id="nav">
            <ul>
                
            <li><i class="fa-solid fa-house"></i> <a href="dashboard-admin.php">Home</a>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i><a href="profile-admin.php">Profile</a>
                </li>
                <li>
                    <i class="fa-solid fa-house"></i><a href="rooms-admin.php">Rooms</a>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i><a href="reservation-admin.php">Reservation</a>
                </li>
                <li>
                    <i class="fa-solid fa-file-invoice-dollar"></i><a href="payment-admin.php">Payment</a>
                </li>
                <li>
                    <i class="fa-solid fa-gear"></i><a href="notification-admin.php">Notification</a>
                </li>
                <li>
                    <i class="fa-solid fa-question"></i> <a href="">Help</a>
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
            <div class="profile" >
                <img src="../menu/usericon.png " id="img">
                <div style=" padding-left: 10px;padding-top: 20px; ">
                    <h3 style="font-size: 30px;">Welcome Admin</h3>
                    <p> 
                        <?php
                            echo $_SESSION['first_name']." " . $_SESSION['last_name'];
                        ?>

                    </p>
                    <p style="color: grey;font-style: oblique;">
                        <?php
                            echo $_SESSION['user_email'];
                        ?>
                    </p>
                </div>
            </div>

            
            <form action="../classes/change_password.class.php" method="post"  style="margin-left: 14%;">
                <div class="password" style="color: green; font-size:20px; height:fit-content; padding-bottom:15px; padding-right:30px;">
                    <?php
                        include '../classes/dbh.class.php';
                        include '../classes/reserve-contr.class.php';

                        if(isset($_POST['reserve'])){
                            $user_id = $_POST['user_id'];
                            $room_number = $_POST['room_number'];
                            $check_in = $_POST['check_in'];
                            $check_out = $_POST['check_out'];
                        
                            
                        
                            if($_SESSION['user_email'] == "hastings@gmail.com"){
                                $reserve = new Reservation();
                                $reserve -> reservation($user_id, $room_number, $check_in, $check_out);
                               
                            }
                            else{
                                $reserve = new Reservation();
                                $reserve -> reservation($_SESSION['user_id'], $room_number, $check_in, $check_out);
                                header("location: ../menu/payment.php?zatheka");
                            }
                           
                        }
                        elseif(isset($_POST['update'])){
                            $reserve_id = $_POST['number'];
                            $reserve_status = $_POST['status'];
                            $reserve = new Reservation();
                            $reserve -> update_reservation($reserve_id, $reserve_status);
                            
                        }
                        elseif(isset($_POST['view_guest']))
                        {                        
                            include '../classes/guest-info.class.php';
                            
                            $info = new Guest_info();
                            $info -> guest_detail();
                        }
                        elseif(isset($_POST['view_reservation'])){
                           
                            $reserve = new Reservation();
                            $reserve -> view_reservation();
                        }
                        elseif(isset($_POST['delete_reserve'])){
                            $reserve_id = $_POST['id'];
                            $reserve = new Reservation();
                            $reserve -> delete_reservation($reserve_id);
                        }
                        
                    ?>
                    
                </div>
                <script></script>

            </form>
            

        </section>
        <!-----------------------------Main content section ends here---------------------------------------------------------->

    </div>
    </script>
</body>

</html>
