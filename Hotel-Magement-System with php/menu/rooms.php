<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>Rooms</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <div class="container">
        <div id="nav">
            <ul>
                <li><i class="fa-solid fa-house"></i> <a href="dashboarduser.php">Home</a>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i> <a href="profile.php">Profile</a>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i><a href="rooms.php">Rooms</a>
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

        <div class="img">
            <div style="display: flex;">
                <div>
                    <img src="img/classic-single-room.jpg" title="classic-single-room"> <br>
                    <details style="margin-left: 47px;">Room 1 <br> Room type: Classic single <br> price: K100,000</details>
                </div>
                <div>
                    <img src="img/deluxe--room.jpeg" title="deluxe-room">
                    <details style="margin-left: 47px;">Room 2 <br> Room type: single <br> price: K130,000</details>
                </div>
                <div>
                    <img src="img/deluxe-room.jpeg" title="deluxe-room">
                    <details style="margin-left: 47px;">Room 3 <br> Room type: Shared <br> price: K150,000</details>
                </div>
                <div>
                    <img src="img/deluxe--room.jpeg" title="deluxe-room">
                    <details style="margin-left: 47px;">Room 4 <br> Room type: Shared <br> price: K150,000</details>
                </div>
            </div>


            <div style="display: flex;">
                <div>
                    <img src="img/deluxe.jpeg" title="Deluxe bedroom"><br>
                    <details style="margin-left: 47px;">Room 1 <br> Room type:Deluxe bedroom <br> price: K250,000</details>
                </div>
                <div>
                    <img src="img/executive-room.jpeg" title="executive-room"> <br>
                    <details style="margin-left: 47px;">Room 10 <br> Room type: single <br> price: K130,000</details>
                </div>
                <div>
                    <img src="img/executive-room.jpeg" title="executive-room">
                    <details style="margin-left: 47px;">Room 11 <br> Room type: Shared <br> price: K150,000</details>
                </div>
                <div>
                    <img src="img/Executive_Suite_11.jpg" title="Executive_Suite">
                    <details style="margin-left: 47px;">Room 12<br> Room type: Shared <br> price: K150,000</details>
                </div>
            </div>


            <div style="display: flex;">
                <div><img src="img/siute.jpeg" title="suite-bedroom">
                    <details style="margin-left: 47px;">Room 12<br> Room type: suite-bedroom <br> price: K150,000</details>
                </div>
                <div> <img src="img/stan.jpeg" title="standard-room">
                    <details style="margin-left: 47px;">Room 12<br> Room type: Shared <br> price: K150,000</details>
                </div>
                <div><img src="img/single.jpg" title="single bedroom">
                    <details style="margin-left: 47px;">Room 12<br> Room type: Shared <br> price: K250,000</details>
                </div>
                <div><img src="img/premier-executive3.jpg" title="premier-executive bedroom">
                    <details style="margin-left: 47px;">Room 12<br> Room type: Shared <br> price: K100,000</details>
                </div>
            </div>

            <div style="display: flex;">
                <div> <img src="img/stand-room.jpg" title="standard-room">
                    <details style="margin-left: 47px;">Room 12<br> Room type: Shared <br> price: K100,000</details>
                </div>
                <div><img src="img/standard.jpeg" title="standard-room">
                    <details style="margin-left: 47px;">Room 12<br> Room type: Shared <br> price: K100,000</details>
                </div>
                <div><img src="img/suites-king-bedroom.jpg" title="suites-king-bedroom">
                    <details style="margin-left: 47px;">Room 12<br> Room type: Shared <br> price: K200,000</details>
                </div>
                <div> <img src="img/suite-hotels.jpg" title="suite-bedroom">
                    <details style="margin-left: 47px;">Room 12<br> Room type: Shared <br> price: K140,000</details>
                </div>
            </div>
        </div>
    </div>
</body>

</html>