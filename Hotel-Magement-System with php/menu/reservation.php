<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation Form</title>
    <link rel="stylesheet" href="reservation.css">

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
        <section class="form">
            <h3>Hotel Reservation Form</h3>
            <p>Please complete the form below</p>

            <form action="../classes/reservation.class.php" method="post" id="Form">
                <div class="info">
                    <h4>Guest Information</h4>
                    <section class="guest">
                        <div>
                            <label for="fname">Firstname</label>
                            <input type="text" id="firstname" name="firstname">
                            <span id="fname_error"></span>
                            <br>
                            <label for="lname">Lastname</label>
                            <input type="text" id="lastname" name="lastname">
                            <span id="lname_error"></span>
                        </div>



                        <div>
                            <label for="email">Email Address</label>
                            <input type="email" id="email">
                            <span id="email_error"></span>
                            <br>

                            <label for="nationality">Nationality</label>
                            <input type="text" id="nationality" name="nationality">
                            <span id="nation_error"></span><br>

                        </div>

                        <div>
                            <label for="PhoneNo">Phone Number</label>
                            <input type="number" id="phone-No" name="phone-No">
                            <span id="num_error"></span><br>
                        </div>
                    </section>
                    <div>
                        <h4>Hotel Information</h4>
                        <section class="hotel">
                            <div> <label for="check-in">Check-in Date</label>
                                <input type="date" id="check-in" name="check_in">
                                <span id="checkin_error"></span><br>

                                <label for="check-out">Check-out Date</label>
                                <input type="date" id="check-out" name="check_out">
                                <span id="checkout_error"></span><br>

                            </div>
                            <div>
                                <label for="#room">Room No. </label>
                                <input type="number" id="room" name="room_number" min="1" max="40">
                                <span id="num_error1"></span><br>

                                <label for="room">Room Preference</label>
                                <select>
                                    <option value="single">Single</option>
                                    <option value="deluxe">Deluxe</option>
                                    <option value="executive">Executive</option>
                                    <option value="standard">Standard</option>
                                    <option value="suite">Suite</option>
                                </select>

                            </div>

                            <div> <label style="padding-left: 130px;">Special request</label>
                                <textarea name="" id="" placeholder="This box is optional to write "></textarea><br>
                            </div>

                        </section>
                    </div>
                </div>



                <section class="payment">
                    <h4>Payment Method</h4>

                    <div><input type="radio" name="airtel/tnm/bank">
                        <label for="airtel">Airtel money </label></div>
                    <div><input type="radio" name="airtel/tnm/bank">
                        <label for="tnm">TNM Mpamba</label>
                        <br></div>
                    <div> <input type="radio" name="airtel/tnm/bank">
                        <label for="bank">Bank</label>
                        <br><br></div>
                    <a href="payment.html" style="font-family: serif;color: green;">Upload the receipt -></a>
                </section>


                <div><button type="submit" id="button" name="reserve">Register</button>
                </div>

            </form>
        </section>
        <!------------------------------------------The form section ends here----------------------------------------->
        <script src="reservation.js">
        </script>
</body>

</html>