<?php
session_start();

include 'dbh.class.php';
include 'reserve-contr.class.php';

if(isset($_POST['reserve'])){
        $room_number = $_POST['room_number'];
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];

        $reserve = new Reservation();
        $reserve -> reservation($_SESSION['user_id'], $room_number, $check_in, $check_out);
        header("location: ../menu/payment.php?zatheka");
    
   
}

elseif(isset($_POST['reserve_admin'])) {
    $user_id = $_POST['user_id'];
    $room_number = $_POST['room_number'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

   
        $reserve = new Reservation();
        $reserve -> reservation($user_id, $room_number, $check_in, $check_out);
        header("location: ../admin/payment.php?zatheka");
    
}