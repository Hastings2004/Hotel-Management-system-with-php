<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../menu/dashboard.css">
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
            <div class="profile" >
                <img src="usericon.png " id="img">
                <div style=" padding-left: 10px;padding-top: 10px; ">
                    <h3 style="font-size: 24px;">Welcome Our Guest</h3>
                   
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
            <div class="option" 
            style=" display: flex; margin-left: 15%; background-color: white; margin-right: 25%; border-radius: 5px; padding: 15px;">
                
            <div style="margin-right:25%;">
                <button id="general_btn" class="btn">General</button>
            </div>
            <div style="margin-right:25%;">
                <button class="btn" id="detail_btn">Details</button>
            </div>
            <div style="margin-right:25%;">
                <button class="btn" id="security_btn">Security</button>
            </div>
                
            </div>
            <div id="details" style="display: none;">
                <div style=" font-size: 25px;">
                    <?php
                        include '../classes/dbh.class.php';
                        include '../classes/guest-info.class.php';
                        $info = new Guest_info();
                        $info-> guest_details($_SESSION['user_id']);

                    ?>
                </div>

            </div>
            <form action="../classes/profile.class.php" method="post" id="general" style="display: none;">
                <div>
                    <div class="personal-info ">
                        <h3>Personal Information</h3>
                        <label for="firstname ">Firstname</label><br>
                        <input type="text " id="fname " name="fname"  required><br>

                        <label for="surname ">Surname</label><br>
                        <input type="text " id="sname" name="sname"  required><br>

                        <label for="initials ">Initials</label><br>
                        <input type="text " id="initials" name="initial"  required><br>

                        <label for="gender ">Gender</label><br>
                        <input type="text " id="gender " name="gender" required><br>

                        <label for="nationality ">Nationality</label><br>
                        <input type="text " id="nationality " name="nationality" required><br>

                        <label for="marital status ">Marital Status</label><br>
                        <input type="text " id="marital-status " name="marital" required><br>

                        <label for="title ">Title</label><br>
                        <input type="text " id="title" name="title"  required>
                    </div>


                    <div class="contact-info ">
                        <h3>Contact Information</h3>
                        <label for="email ">Email Address</label><br>
                        <input type="email " id="email" name="email"  required><br>

                        <label for="phone number ">Phone Number</label><br>
                        <input type="number " id="phone_number" minlength="10" maxlength="11" name="phone"  required><br>

                        <label for="national_id ">National ID</label><br>
                        <input type="text " id="national_id" name="id_number"  required><br>

                        <label for="passport ">Passport ID</label><br>
                        <input type="text " id="passport" name="passport"  required><br>
                        <button type="submit" name="update" id="update">Save</button>
                    </div>


                    <div class="history "></div>
                </div>

            </form>

            <form action="../classes/change_password.class.php" method="post"  id="security" style="display: none;">
                <div class="password ">
                    <h3>Security</h3>

                    <label for="old_password">Old Password</label>
                    <i class="fa-solid fa-eye" id="show-password "></i><br>
                    <input type="password" id="old_password" name="oldpass"  placeholder="Enter your old password"><br><br>

                    <label for=" password ">New Password</label>
                    <i class="fa-solid fa-eye " id="show-password "></i><br>
                    <input type="password" id="new_password" name="newpass" placeholder="Enter your new password"><br><br>

                    <label for="password ">Confirm New Password</label>
                    <i class="fa-solid fa-eye " id="show-password "></i><br>
                    <input type="password" id="conf_password" name="cpass" placeholder="Confirm your new password"><br><br>

                    <button type="submit" name="update" id="update">Update</button>
                </div>
                <script></script>

            </form>
            

        </section>
        <!-----------------------------Main content section ends here---------------------------------------------------------->

    </div>
    <script>
        
        let security = document.getElementById("security");
        let general = document.getElementById("general");
        let details = document.getElementById("details");
        let security_btn = document.getElementById("security_btn");
        let detail_btn = document.getElementById("detail_btn");
        let general_btn = document.getElementById("general_btn");

        general_btn.addEventListener('click', (e)=>{
            general.style.display = "block";
        });

        security_btn.addEventListener('click', (e)=>{
            security.style.display = "block";
        });

        detail_btn.addEventListener("click", (e)=>{
            details.style.display = "block";
        });
       
    </script>
</body>

</html>
