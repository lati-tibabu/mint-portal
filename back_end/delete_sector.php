<?php
include("config.php");

if (isset($_GET['sector_id'])) {
    $sectorId = $_GET['sector_id'];

    // Perform database query to delete the news item with the given news_id
    $deleteQuery = "DELETE FROM sector WHERE sector_id = $sectorId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/sectors.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting sector: " . mysqli_error($con);
    }
}
?>
