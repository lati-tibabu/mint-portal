<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $upload_file = $_POST["update_file"];

    $personnelIdToUpdate = $_POST["personnel_id"];

    $personnelName = $_POST["personnel-name"];
    $jobTitle = $_POST["job-title"];
    $department = $_POST["department"];
    $deskId = $_POST["personnel-desk"];

    if ($upload_file == '1') {
        $imageFileName = ""; // Initialize the image filename variable


        $imageDirectory = __DIR__ . '\personnel_images\\'; // Adjust the path as needed
        $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];

        $destination = $imageDirectory . $imageFileName;

        echo $destination;

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

            exit("Can't move uploaded file");
        }


        $query = "UPDATE personnel SET name = ?, job_title = ?, department = ?, desk_id = ?, personnel_image = ? WHERE personnel_id = ?";

        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssssi", $personnelName, $jobTitle, $department, $deskId, $imageFileName, $personnelIdToUpdate);
    } else {
        $query = "UPDATE personnel SET name = ?, job_title = ?, department = ?, desk_id = ? WHERE personnel_id = ?";

        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssi", $personnelName, $jobTitle, $department, $deskId, $personnelIdToUpdate);
    }
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Personnel updated successfully!')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    header("Location: ../admin-content/cms-pages/edit_items_personnel.php?personnel_id_no=$personnelIdToUpdate");
    exit();
} else {
    echo "Invalid request!";
}
