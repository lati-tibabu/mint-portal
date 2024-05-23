<?php
include("config.php");
$sector_name = $_POST["sector-name"];
$sector_description = $_POST["sector-description"];

$imageDirectory = __DIR__ . '\sector_images\\'; // Adjust the path as needed
$imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];

$destination = $imageDirectory . $imageFileName;

echo $destination;

if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

    exit("Can't move uploaded file");

}

$query = "INSERT INTO sector (sector_name, description, sector_image) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "sss", $sector_name, $sector_description, $imageFileName);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    echo "<script>alert(`Entry added!`)</script>";
    header("Location: ../admin-content/sectors.php");
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
header("Location: ../admin-content/cms-pages/sectors.php");
exit();

?>