<?php
include("config.php");

if (isset($_GET['office_id'])) {
    $officeId = $_GET['office_id'];

    $deleteQuery = "DELETE FROM office WHERE office_id = $officeId";
    
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        header("Location: ../admin-content/cms-pages/office.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting office: " . mysqli_error($con);
    }
}
