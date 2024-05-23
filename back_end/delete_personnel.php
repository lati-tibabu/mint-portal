<?php
include("config.php");

if (isset($_GET['personnel_id'])) {
    $personnelId = $_GET['personnel_id'];

    // Perform database query to delete the news item with the given news_id
    $deleteQuery = "DELETE FROM personnel WHERE personnel_id = $personnelId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/personnel.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting personnel: " . mysqli_error($con);
    }
}
?>
