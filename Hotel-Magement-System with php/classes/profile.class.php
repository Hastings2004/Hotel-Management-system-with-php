<?php
session_start();
if(isset($_POST['update'])){
    
     $first_name = $_POST['fname'];
     $surname  = $_POST['sname'];
     $initials  = $_POST['initial'];
     $gender = $_POST['gender'];
     $nationality = $_POST['nationality'];
     $marital  = $_POST['marital'];
     $title = $_POST['title'];
     $email_address = $_POST['email'];
     $phone_number = $_POST['phone'];
     $id_number = $_POST['id_number'];
     $passport = $_POST['passport'];

     include 'dbh.class.php';
     include 'guest.class.php';
     include 'guest-contr.class.php';

     $guest = new Guest_Contr($_SESSION['user_id'],$first_name, $surname,$initials, $gender, 
        $nationality, $marital,$title,$email_address, $phone_number, $id_number, $passport);
    $guest -> addinfo();

    header('location: ../menu/profile.php?succefully');
}