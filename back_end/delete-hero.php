<?php
include("config.php");

if (isset($_GET['hero_id'])) {
    $heroId = $_GET['hero_id'];

    // Perform database query to delete the news item with the given news_id
    $deleteQuery = "DELETE FROM hero_image WHERE hero_id = $heroId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/hero_content.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting hero: " . mysqli_error($con);
    }
}
?>
