<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <!------------------------------Naviagation bar section starts here------------------------------------->
        <div id="nav">
            <ul>
                <li><i class="fa-solid fa-house"></i> <a href="dashboarduser.php">Home</a>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i><a href="profile.php">Profile</a>
                </li>
                <li>
                    <i class="fa-solid fa-house"></i><a href="rooms.php">Rooms</a>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i><a href="reservation.php">Reservation</a>
                </li>
                <li>
                    <i class="fa-solid fa-file-invoice-dollar"></i><a href="payment.php">Payment</a>
                </li>
                <li>
                    <i class="fa-solid fa-gear"></i><a href="notification.php">Notification</a>
                </li>
                <li>
                    <i class="fa-solid fa-question"></i> <a href="history.php">History</a>
                </li>

                <div class="logout">
                    <form action="../includes/logout.php" method="post">
                        <button type="submit" name="logout_btn" id="logout"> Logout</button>
                    </form>

                </div>
            </ul>
        </div>
        <!------------------------------Naviagation bar section ends here----------------------------------------->
        <!------------------------------Main content section starts here------------------------------------------>

        <section class="main">

            <div class="profile" style="width: 85%;">
                <img src="usericon.png" id="img">
                <div style=" padding-left: 10px;padding-top: 50px;">
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

                <div class="profile2">
                    <a href="profile.php" style="color:green;">
                        <h5>Let's Complete Your Profile</h5>
                    </a>
                </div>
            </div>
            <div>
                <h3 style="text-align: center; font-size: 30px;">Notification</h3>
            
                <div class="details" >
                    <div style="margin-left: 15%; padding-bottom:10px">
                        <?php
                            include '../classes/dbh.class.php';
                            include '../classes/notification-reminder.class.php';

                            $notify = new Notification();
                            $notify -> notifacation($_SESSION['user_id']);
                                
                        ?>
                        
                                
                    </div>
                        
                </div>

            </div>


            
            
        </section>
        <!-----------------------------Main content section ends here---------------------------------------------------------->

    </div>
</body>

</html>