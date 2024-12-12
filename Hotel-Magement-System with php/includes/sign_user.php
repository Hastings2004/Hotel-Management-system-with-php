<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../index.css">
</head>

<body>
    <div class="form1">
        <form action="sign_user.php" method="post" id="form">
            <div class="head">
                <h3> Sign Up</h3>
            </div>

            <div class="input">
                <div class="email">
                    <label for="name">First name</label><br>
                    <input type="text" name="fname" id="fname" placeholder="Enter your first name" required>
                    <span id="fname_error" style="color: red;font-size: 13px;"></span>
                </div>
                <div class="password"><label for="surname">Surname</label>
                    <input type="text" name="sname" id="sname" placeholder="Enter your surname" required>
                    <span id="sname_error" style="color: red;font-size: 13px;"></span>
                </div>
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                    <span id="email_error" style="color: red;font-size: 13px;"></span>

                </div>
                <div class="password"><label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password">
                    <span id="pass_error1" style="color: red;font-size: 13px;" required></span>

                </div>
                <div class="password"><label for="re-password">Confirm Password</label>
                    <input type="password" name="cpassword" id="cpassword" placeholder="Re-enter your password" required>
                    <span id="cpass_error1" style="color: red;font-size: 13px;"></span>

                </div>
                <button type="submit" name="button">Register </button>
                <div>
                    <p> Do you have account? &nbsp;
                        <a href="../index.php">Login</a>
                    </p>
                </div>
                <div class="password" style="color: red;">
                <?php
                    if(isset($_POST['button'])){
                        $fname = $_POST['fname'];
                        $sname = $_POST['sname'];
                        $email = $_POST['email'];
                        $pass = $_POST['password'];
                        
                        include '../classes/dbh.class.php';
                        include '../classes/signupContr.class.php';
                        include '../classes/sign.class.php';

                        $sign_up = new Signup($fname, $sname, $email, $pass);
                        $sign_up -> signUpuser();

                        header('location: ../index.php');
                    }
                ?>
   

                </div>
                
            </div>
        </form>
        <script>
            let fname = document.getElementById("fname");

            let sname = document.getElementById("sname");

            let email = document.getElementById("email");

            let password = document.getElementById("password");

            let cpassword = document.getElementById("cpassword");

            let fname_error = document.getElementById("fname_error");

            let sname_error = document.getElementById("sname_error");

            let email_error = document.getElementById("email_error");

            let email_error2 = document.getElementById("email_error2");

            let password_error = document.getElementById("pass_error1");

            let cpassword_error = document.getElementById("cpass_error1");

            let cpassword_error2 = document.getElementById("cpass_error2");

            let form = document.getElementById("form");

            let height = document.getElementsByClassName("form1");

            let name = /^[a-zA-Z]*$/;

            let pattern = /^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+(?:\.[a-zA-Z0-9-]+)*$/;

            let format = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9!@#$%^&*()_+=[\]{}|;':"\\<>,.?/-]*$/;

            form.addEventListener("submit", (e) => {
                if (fname.value === "") {
                    e.preventDefault();
                    fname_error.textContent = "Firstane is reqiured";
                } else {
                    if (!fname.value.match(name)) {
                        fname_error.textContent = "Please use letters only";
                    } else {
                        fname_error.textContent = "";
                    }

                }
                if (sname.value === "") {
                    e.preventDefault();
                    sname_error.textContent = "Surname is required";
                } else {
                    if (!sname.value.match(name)) {
                        sname_error.textContent = "Please user only";
                    }
                }
                if (email.value === "") {
                    e.preventDefault();
                    email_error.textContent = "Email is required";
                } else {
                    if (!email.value.match(pattern)) {
                        e.preventDefault();
                        email_error.textContent = "Invalid email";
                    } else {
                        email_error.textContent = "";
                    }

                }
                if (password.value === "") {
                    e.preventDefault();
                    password_error.textContent = "Password is required";
                } else {
                    if (!password.value.match(format)) {
                        e.preventDefault();
                        password_error.textContent = "Create strong password";
                    } else {
                        password_error.textContent = "";
                    }

                }
                if (cpassword.value === "") {
                    e.preventDefault();
                    cpassword_error.textContent = "Confirm password is required";
                } else {
                    if (password.value !== cpassword.value) {
                        e.preventDefault();
                        cpassword_error.textContent = "password does not match";
                    } else {
                        cpassword_error.textContent = "";
                    }

                }

            });
        </script>

</body>

</html>