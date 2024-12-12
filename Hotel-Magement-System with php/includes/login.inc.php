<?php

if(isset($_POST['button'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    include '../classes/dbh.class.php';
    include '../classes/login.class.php';
    include '../classes/login_Contr.class.php';

    $login = new Login_User($email, $pass);
    $login -> loginpuser();

    if($email == "hastings@gmail.com"){
        header("location: ../admin/dashboard.php");
    }else{
        header("location: ../menu/dashboard.php");
    }
    

}
?>