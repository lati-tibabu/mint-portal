<?php
include("config.php");

if (isset($_GET['desk_id'])) {
    $deskId = $_GET['desk_id'];

    // Perform database query to delete the news item with the given news_id
    $deleteQuery = "DELETE FROM desk WHERE desk_id = $deskId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/desks.php");
        exit();
    } else {
        // Deletion failed
        echo "<h3>Error deleting desk: " . mysqli_error($con)."</h3>";
    }
}
