<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>Admin Rooms page</title>
    <link rel="stylesheet" href="../menu/dashboard.css">
</head>

<body>
    <div class="container">
        <div id="nav">
            <ul>
                <li><i class="fa-solid fa-house"></i> <a href="dashboard-admin.php">Home</a>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i> <a href="profile-admin.php">Profile</a>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i><a href="rooms-admin.php">Rooms</a>
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

        <div class="img">
            <div style="display: flex;">
                <div class="add">
                    <form action="rooms-contr.php" method="post">
                        <h3 style="text-align: center; font-size: 20px;">Add Rooms</h3>
                        <label for="">Room number</label> <br>
                        <input type="number" min="1" name="number" required> <br>
                        <label for="">Room Type</label> <br>
                        <input type="text"  name="type" required> <br>
                        <label for="">Availability status</label> <br>
                        <input type="text"  name="status" required> <br>
                        <label for="">Price</label> <br>
                        <input type="number" min="100000" name="price" required> <br>
                        <button type="submit" name="add_rooms" id="add_btn">Add room</button>
                    </form>
                </div>
                <div class="add">
                    <form action="rooms-contr.php" method="post">
                        <h3 style="text-align: center; font-size: 20px;">Update Availability status</h3>
                        <label for="">Room number</label> <br>
                        <input type="number" min="1" name="number" required> <br>
                        <label for="">Availability status</label> <br>
                        <input type="text"  name="status" required> <br>
                        <button type="submit" name="update_status" id="add_btn">Update room</button>
                    </form>
                </div>
                
            </div>
            <div style="display: flex;">
                <div class="add">
                    <form action="rooms-contr.php" method="post">
                        <h3 style="text-align: center; font-size: 20px;">View all room</h3>
                        <br>
                        <br>
                        <br>
                        <button type="submit" name="view" id="add_btn">view rooms</button>
                    </form>
                </div>
            
                
            </div>
            <div id="details" style="display: none;">
                <div style="margin-left: 20%; font-size: 25px;">
                    <?php

                        if(isset($_POST['view'])){

                            include '../classes/dbh.class.php';
                            
                           
                            $rooms = new Room();
                            $rooms -> view_available_rooms();
    
                        }
                       
                    ?>
                </div>

            </div>

            
        </div>
    </div>
</body>

</html>