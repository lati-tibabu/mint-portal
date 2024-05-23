<?php
include("config.php");

if (isset($_GET['event_id'])) {
    $eventId = $_GET['event_id'];

    // Perform database query to delete the news item with the given news_id
    $deleteQuery = "DELETE FROM event WHERE event_id = $eventId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/event.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting event: " . mysqli_error($con);
    }
}
?>
