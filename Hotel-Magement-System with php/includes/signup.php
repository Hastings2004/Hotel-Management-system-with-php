<?php
 //include 'connection.php';

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

    header('location: ../index.php?error=none');
   
  
}    