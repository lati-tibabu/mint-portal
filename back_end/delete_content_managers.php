<?php
include("config.php");

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    // Perform database query to delete the news item with the given news_id
    $deleteQuery = "DELETE FROM user WHERE user_id = $userId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: deletion-success.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting user: " . mysqli_error($con);
    }
}
?>
