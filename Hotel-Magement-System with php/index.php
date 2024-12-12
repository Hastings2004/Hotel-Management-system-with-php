<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jika-Jika Hotel Management System</title>
    <link rel="stylesheet" href="index.css">
    <script>
    </script>
</head>

<body>
  
    <div class="form" style="margin-top: 40px;">
        <form action="index.php" method="post" id="form">
            <div class="head">
                <h3> Login</h3>
            </div>
            <div class="input">
                <div class="email" style="margin-top: 10px;  margin-bottom:10px;"> 
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required><br>
                    <span id="email_msg" style="color: red;font-size: 13px;"></span>
                </div>
                <div class="password"><label for="password">Password</label><br>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required><br>
                    <span id="pass_msg" style="color: red;font-size: 13px;"></span>
                    <span id="pass1_msg" style="color: red;font-size: 13px;"></span>
                </div>

                <div class="check">
                    <input type="checkbox" class="checked">Remember me &nbsp;
                    <a href="forget-password.html">Forgot password?</a>
                </div>
                <button type="submit" name="button">Login </button>
                <div>
                    <p> Don't have account? &nbsp; <a href="includes/sign_user.php">Create account</a></p>
                </div>
                <div class="password">
                    <?php

                        if(isset($_POST['button'])){
                            $email = $_POST['email'];
                            $pass = $_POST['password'];

                            include 'classes/dbh.class.php';
                            include 'classes/login.class.php';
                            include 'classes/login_Contr.class.php';

                            $login = new Login_User($email, $pass);
                            $login -> loginpuser();

                            if($email !== "hastings@gmail.com" || $email !== "ibrahimcassim031@gmail.com"){
                                header("location: menu/dashboarduser.php");
                            }else{
                                
                                header("location:  admin/dashboard-admin.php");
                            }
                            

                        }
                    ?>

                    
                </div> 
            </div>
            <script src="index.js"></script>


        </form>
    </div>
</body>

</html>
