<?php
include("config.php");

if (isset($_GET['application_id'])) {
    $applicationId = $_GET['application_id'];

    // Perform database query to delete the news item with the given news_id
    $deleteQuery = "DELETE FROM vacancy_applications WHERE application_id = $applicationId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/vacancy.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting application: " . mysqli_error($con);
    }
}
?>
