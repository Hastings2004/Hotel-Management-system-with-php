<?php
session_start();
if(isset($_POST['update'])){
    $newPass = $_POST['newpass'];
    $cPass = $_POST['cpass'];
    $oldpass = $_POST['oldpass'];

    include 'dbh.class.php';
    include 'change.class.php';
    include 'change-contr.class.php';

    $update = new Update($_SESSION['user_email'], $oldpass, $newPass);
    $update -> changePassword();
    header("location: ../menu/profile.php");
}

?>