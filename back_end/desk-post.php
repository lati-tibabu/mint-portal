<?php
include("config.php");
$desk_name = $_POST["desk-name"];
$desk_description = $_POST["desk-description"];
$office_id = $_POST["desk-office"];
// $sector_id = $_POST["sector-id"];

$query = "INSERT INTO desk (desk_name, desk_description, office_id) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "ssi", $desk_name, $desk_description, $office_id);
$result = mysqli_stmt_execute($stmt);

if ($result) {

    echo "<script>alert(`Entry added!`)</script>";
    header("Location: ../admin-content/desks.php");

} else {

    echo "Error: " . mysqli_error($con);

}

mysqli_stmt_close($stmt);
mysqli_close($con);
header("Location: ../admin-content/cms-pages/desks.php");
exit();

?>