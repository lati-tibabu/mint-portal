<?php
include("config.php");

if (isset($_GET['announcement_id'])) {
    $announcementId = $_GET['announcement_id'];

    // Perform database query to delete the news item with the given news_id
    $deleteQuery = "DELETE FROM announcements WHERE announcement_id = $announcementId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/announcements.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting news: " . mysqli_error($con);
    }
}
?>
