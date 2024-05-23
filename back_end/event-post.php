<?php
include("config.php");

// Check if the form is submitted
if (isset($_POST['submit'])) {

    // Get form data
    $event_name = $_POST["event-name"];
    $event_description = $_POST["event-description"];
    $event_happen_date = $_POST["event-happen-date"];
    $event_location = $_POST["event-location"];
    $event_is_featured = $_POST["is_featured"];
    $event_happen_time = $_POST["event-happen-time"]; // Add this line to get the event_happen_time

    // Define image upload directory and filename
    $imageDirectory = __DIR__ . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'event' . DIRECTORY_SEPARATOR;
    $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];
    $destination = $imageDirectory . $imageFileName;

    // Move uploaded image to the destination directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

        // Prepare SQL query
        $query = "INSERT INTO event (event_name, event_description, event_location, event_happen_date, event_happen_time, event_date, event_image, event_is_featured, event_is_published) VALUES (?, ?, ?, ?, ?, NOW(), ?, ?, '1')";
        
        // Prepare and execute the statement
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssssss", $event_name, $event_description, $event_location, $event_happen_date, $event_happen_time, $imageFileName, $event_is_featured);
        $result = mysqli_stmt_execute($stmt);

        // Check if the query was successful
        if ($result) {
            echo "<script>alert(`Entry added!`)</script>";
            // Redirect to the desired page
            header("Location: ../admin-content/cms-pages/event.php");
            exit();
        } else {
            // If there's an SQL error, display it
            echo "Error: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        // If the file upload fails, display an error
        echo "Error: Can't move uploaded file";
    }

    mysqli_close($con);
}
?>
