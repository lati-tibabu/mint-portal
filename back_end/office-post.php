<?php
include("config.php");
$office_name = $_POST["office-name"];
$office_description = $_POST["office-description"];
$sector_id = $_POST["office-sector"];

// $imageDirectory = __DIR__ . '\sector_images\\'; // Adjust the path as needed
// $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];

// $destination = $imageDirectory . $imageFileName;

// echo $destination;

// if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

//     exit("Can't move uploaded file");

// }

$query = "INSERT INTO office (office_name, description, sector_id) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "ssi", $office_name, $office_description, $sector_id);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    echo "<script>alert(`Entry added!`)</script>";
    header("Location: ../admin-content/offices.php");
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
header("Location: ../admin-content/cms-pages/offices.php");
exit();

?>