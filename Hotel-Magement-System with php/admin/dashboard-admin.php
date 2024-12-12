<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard page</title>
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

        <section class="main" style="background-image: url(../back.jpg);">

            <div class="profile" style="width: 85%;">
                <img src="../menu/usericon.png" id="img">
                <div style=" padding-left: 10px;padding-top: 10px;">
                    <h3 style="font-size: 30px;">Welcome Admin</h3>
                    <p style="font-size: 18px;"> 
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


            <div class="content">
                <div class="box">
                    <h4>ROOMS</h4><br>
                    <p>Check Your Favourite Room Here </p><br>
                    <a href="rooms.php"><button>view</button></a>
                </div>

                <div class="box">
                    <h4>RESERVATION</h4><br>
                    <p>Book With the Best Hotel Here</p> <br>
                    <a href="reservation.php">
                        <button>view</button></a>
                </div>

                <div class="box">
                    <h4>PAYMENT</h4> <br>
                    <p>Check Your Invoice</p><br>

                    <a href="payment.php"><button>view</button></a>
                </div>
            </div>

            <div class="content">
                <div class="box">
                    <h4>FOOD MENU</h4> <br>
                    <p>Eat Best Delicious Food and Have Sweet Drinks</p><br>

                    <a href="">
                        <button style=" margin-top: 50px;">view</button>
                    </a>
                </div>

                <div class="box">
                    <h4>WEATHER</h4>

                </div>

                <div class="box">
                    <h4>CALENDAR</h4>
                </div>

            </div>
        </section>
        <!-----------------------------Main content section ends here---------------------------------------------------------->

    </div>
</body>

</html>