<?php
include("config.php");

if (isset($_GET['history_id'])) {
    $historyId = $_GET['history_id'];

    // Perform database query to delete the news item with the given news_id
    $deleteQuery = "DELETE FROM mint_history WHERE history_id = $historyId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/history.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting news: " . mysqli_error($con);
    }
}
?>
