<?php

include("config.php");

if (isset($_GET['hero_id'])) {
    $heroId = $_GET['hero_id'];

    // Perform database query to delete the news item with the given news_id
    $useQuery = "UPDATE hero_image 
    SET priority = (SELECT max_priority FROM (SELECT MAX(priority) + 1 as max_priority FROM hero_image) AS subquery) 
    WHERE hero_id = $heroId";    
    if (mysqli_query($con, $useQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/hero_content.php");
        exit();
    } else {
        // Deletion failed
        echo "Error using hero: " . mysqli_error($con);
    }
}
