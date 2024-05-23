<?php
include("config.php");

if (isset($_GET['news_id'])) {
    $newsId = $_GET['news_id'];

    // Perform database query to delete the news item with the given news_id
    $deleteQuery = "DELETE FROM news WHERE news_id = $newsId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/news.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting news: " . mysqli_error($con);
    }
}
?>
