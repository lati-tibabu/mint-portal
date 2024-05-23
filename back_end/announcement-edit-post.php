<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $announcementIdToUpdate = $_POST["announcement_id"];
    $announcementName = $_POST["announcement-name"];
    $announcementDescription = $_POST["announcement-description"];
    $announcementDate = $_POST["announcement-date"];

    $query = "UPDATE announcements SET announcement_name = ?, announcement_description = ?, announcement_date = ? WHERE announcement_id = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $announcementName, $announcementDescription, $announcementDate, $announcementIdToUpdate);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Announcement updated!')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($con);
header("Location: ../admin-content/cms-pages/edit_items_announcement.php?announcement_id_no=$announcementIdToUpdate");
exit();
