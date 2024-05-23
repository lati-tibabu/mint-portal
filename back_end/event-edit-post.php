<?php
include("config.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $upload_file = $_POST["update_file"];

    $event_id = $_POST["event_id"];

    $event_name = $_POST["event-name"];
    $event_description = $_POST["event-detail"];
    $event_happen_date = $_POST["event-happen-date"];
    $event_happen_time = $_POST["event-happen-time"];
    $event_location = $_POST["event-location"];
    $event_is_featured = $_POST["is_featured"];

    // File upload code

    if ($upload_file == '1') {

        $imageDirectory = __DIR__ . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'event' . DIRECTORY_SEPARATOR;
        $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];
        $destination = $imageDirectory . $imageFileName;

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
            echo "Can't move uploaded file";
        }
        // File upload successful, update the database
        $query = "UPDATE event SET event_name = ?, event_description = ?, event_happen_date = ?, event_happen_time = ?, event_location = ?, event_is_featured = ?, event_image = ? WHERE event_id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssssssi", $event_name, $event_description, $event_happen_date, $event_happen_time, $event_location, $event_is_featured, $imageFileName, $event_id);
    } else {
        $query = "UPDATE event SET event_name = ?, event_description = ?, event_happen_date = ?, event_happen_time = ?, event_location = ?, event_is_featured = ? WHERE event_id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssssi", $event_name, $event_description, $event_happen_date, $event_happen_time, $event_location, $event_is_featured, $event_id);
    }

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Event updated!')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    // } else {
    // }
    mysqli_close($con);

    header("Location: ../admin-content/cms-pages/edit_items_events.php?event_id_no=$event_id");
    exit();
}
