<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="dashboard.css">

</head>

<body>
    <!-----------------The navigation section starts here---------------------------------->
    <div class="container">
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
        <!-----------------------------The navigation section ends here-------------------------------------------------->

        <!-----------------------------The form section starts here----------------------------------------------------------->
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
            <h2 style="margin-left: 40%; font-size: 25px;">History</h2>
            <div id="details">
                
                <div style="margin-left: 5px; font-size: 18px;">
                    <?php
                      
                        include '../classes/dbh.class.php';
                        include '../classes/history-contr.class.php';
                    
                        $view = new History($_SESSION['user_id']);
                        $view->view_history();
                    

                    ?>
                </div>

            </div>
           
            
        </section>
        <!-----------------------------Main content section ends here---------------------------------------------------------->

        <!------------------------------------------The form section ends here----------------------------------------->
       
</body>

</html>