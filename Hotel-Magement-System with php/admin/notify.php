<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile page</title>
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
                    <h3 style="font-size: 30px;">Welcome </h3>
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

            <form action="../classes/change_password.class.php" method="post" id="security">
                <div class="password" style="color: green; font-size:20px; height:fit-content; padding-bottom:15px; padding-right:30px;">
                    <?php
                        include '../classes/dbh.class.php';
                        include '../classes/notification.class.php';

                        $notify = new Notification();

                        if(isset($_POST['notify'])){
                            $user_id = $_POST['user_id'];
                            
                            $notify -> check_due_date($user_id);
                            
                        } 
                        elseif(isset($_POST['view_note'])){
                           
                            $notify = new Notification();
                            $notify -> view_nofitification();
                         }

                        else if(isset($_POST['update'])){
                            $note_id = $_POST['id'];
                            $message = $_POST['message'];

                            $notify -> update_notification($message, $note_id);
                            header("location: notification.php");
                        }
                        else if(isset($_POST['delete'])){
                            $note_id = $_POST['id'];
                            
                            $notify -> delete_notification($note_id);
                            header("location: notification.php");
                        }
                    ?>
                </div>
                <script></script>

            </form>
            

        </section>
        <!-----------------------------Main content section ends here---------------------------------------------------------->

    </div>
</body>

</html>

