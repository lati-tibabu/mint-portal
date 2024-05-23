<?php
include("config.php");

$upload_file = $_POST["update_file"];

$sectorIdToUpdate = $_POST["sector_id"];

$sectorName = $_POST["sector-name"];
$sectorDescription = $_POST["sector-description"];

if ($upload_file == '1') {

    $imageFileName = ""; // Initialize the image filename variable

    if ($_FILES['image']['name']) {
        $imageDirectory = __DIR__ . '\sector_images\\';
        $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'])['extension'];
        $destination = $imageDirectory . $imageFileName;

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
            exit("Can't move uploaded file");
        }
    }

    $query = "UPDATE sector SET sector_name = ?, description = ?, sector_image = ? WHERE sector_id = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $sectorName, $sectorDescription, $imageFileName, $sectorIdToUpdate);
} else {
    $query = "UPDATE sector SET sector_name = ?, description = ? WHERE sector_id = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssi", $sectorName, $sectorDescription, $sectorIdToUpdate);
}
$result = mysqli_stmt_execute($stmt);

if ($result) {
    echo "<script>alert('Sector updated!')</script>";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);

header("Location: ../admin-content/cms-pages/edit_items_sector.php?sector_id_no=$sectorIdToUpdate");
exit();
