<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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
        <!------------------------------Main content section starts here------------------------------------------------------>

        <section class="main">
            <div class="pay">
                <h2>Payment</h2>
                <div class="payment-details ">
                    <h3 style="font-size: 20px; color: green; margin-bottom: 10px; ">Bank details</h3>
                    <label for=" " style="margin-top: 10px; margin-bottom: 10px; "><b style="margin-right: 53px; ">Bank name</b> :Natioal Bank</label><br>
                    <label for=" " style="margin-top: 10px; margin-bottom: 10px; "><b style="margin-right: 29px; ">Account name</b> :Jika-Jika Gang Gang</label><br>
                    <label for=" " style="margin-top: 10px; margin-bottom: 10px; "><b style="margin-right: 10px; ">Account number</b> :1011530687</label><br>
                    <label for=" " style="margin-top: 10px; margin-bottom: 10px; "><b style="margin-right: 55px; ">Description</b>:Hotel Payment</label> <br> <br>
                    <h3 style="font-size: 15px; color: green; ">Airtel Number</h3>
                    <p>0999198480</p><br>
                    <h3 style="font-size: 15px; color: green; ">TNM Number</h3>
                    <p>0898941464</p>

                </div>
                <div class="upload" style="height: fit-content;">
                    <form action="../uploads/uploads.php" method="post"  enctype="multipart/form-data">
                        <h5 style="font-size: 20px; color: green; ">Upload deposit slip</h5>
                        <label for="">Date</label> <br>
                        <input type="date" name="date" required> <br>
                        <label for="">Price</label> <br>
                        <input type="number" name="amount" id="" min="10000" required placeholder="enter price"> <br>
                        <input type="file" name="file" id="file" required><br>
                        <button type="submit" id="upload" name="upload">Upload</button>
                    </form>
                </div>
            </div>

        </section>
        <!-----------------------------Main content section ends here---------------------------------------------------------->

    </div>
</body>

</html>