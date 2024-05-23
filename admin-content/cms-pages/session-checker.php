<?php
session_start();

if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
} else {
    header('Location: ../index.php'); 
    exit;
}
?>