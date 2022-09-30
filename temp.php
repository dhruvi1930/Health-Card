<?php 
    session_start();
    $redirect = $_SESSION['redirect'];
    header('location:'.$redirect.'.php');
?>