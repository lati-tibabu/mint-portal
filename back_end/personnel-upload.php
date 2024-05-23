<?php
include("config.php");
$personnel_name = $_POST["personnel-name"];
$job_title = $_POST["job-title"];
$department = $_POST["department"];
$desk_id = $_POST["personnel-desk"];

$imageDirectory = __DIR__ . '\personnel_images\\'; // Adjust the path as needed
$imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];

$destination = $imageDirectory . $imageFileName;

echo $destination;

if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

    exit("Can't move uploaded file");

}

$query = "INSERT INTO personnel (name, job_title, department, personnel_image, desk_id) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "ssssi", $personnel_name, $job_title, $department, $imageFileName, $desk_id);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    echo "<script>alert(`Entry added!`)</script>";
    header("Location: ../admin-content/personnel.php");
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
header("Location: ../admin-content/cms-pages/personnel.php");
exit();

?>