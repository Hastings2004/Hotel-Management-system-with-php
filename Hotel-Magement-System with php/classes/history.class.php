<?php
session_start();


if(isset($_POST['view_history'])){

    include 'dbh.class.php';
    include 'history-contr.class.php';

    $view = new History($_SESSION['user_id']);
    $view->view_history();
}
?>