<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Notification page</title>
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
        <!------------------------------Main content section starts here------------------------------------------>

        <section class="main">
            <div style="display: flex;">
                <div class="add">
                    <form action="notify.php" method="post">
                        <h3 style="text-align: center; font-size: 20px;">Create Notification</h3>
                        <label for="">User ID</label> <br>
                        <input type="number" min="1" name="user_id" required> <br>
                        <label for="">Room number</label> <br>
                        <input type="number"  name="room_number" required> <br>
                        <button type="submit" name="notify" id="add_btn">create notification</button>
                    </form>
                </div>
                <div class="add">
                    <form action="notify.php" method="post">
                        <h3 style="text-align: center; font-size: 20px;">Update Notification</h3>
                        <label for="">Notification ID</label> <br>
                        <input type="number" min="1" name="id" required> <br>
                        <label for="">Message</label> <br>
                        <input type="text"  name="message" required> <br>
                        <button type="submit" name="update" id="add_btn">Update notification</button>
                    </form>
                </div>
                
            </div>
            <div style="display: flex;">
                <div class="add">
                    <form action="notify.php" method="post">
                        <h3 style="text-align: center; font-size: 20px;">Delete Notification</h3> <br>
                        <label for="">Notification ID</label> <br> 
                        <input type="number" min="1" name="id" required> <br> 
                        
                        <button type="submit" name="delete" id="add_btn">Delete notification</button>
                    </form>
                </div>
                <div class="add">
                    <form action="notify.php" method="post">
                        <h3 style="text-align: center; font-size: 20px;">View Notification</h3>
                        <br>
                        <br>
                        <button type="submit" name="view_note" id="add_btn">view notification</button>
                    </form>
                </div>
                
            </div>
            <div style="display: flex;">
                <div class="add">
                    <?php
                     
                    ?>
                </div>
                <div class="add">
                    <form action="notification.php" method="post">
                        <h3 style="text-align: center; font-size: 20px;">View Notification</h3>
                        <br>
                        <br>
                        <button type="submit" name="view_note" id="add_btn">view notification</button>
                    </form>
                </div>
                
            </div>

            

         </section>   
        <!-----------------------------Main content section ends here---------------------------------------------------------->

    </div>
</body>

</html>