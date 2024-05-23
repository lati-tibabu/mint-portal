<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $officeIdToUpdate = $_POST["office_id"];
    $officeName = $_POST["office-name"];
    $officeDescription = $_POST["office-description"];
    $officeSectorId = $_POST["office-sector"];

    $query = "UPDATE office SET office_name = ?, description = ?, sector_id = ? WHERE office_id = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssii", $officeName, $officeDescription, $officeSectorId, $officeIdToUpdate);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Office updated!')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($con);

// Redirect back to the edit page with the office_id
header("Location: ../admin-content/cms-pages/edit_items_office.php?office_id_no=$officeIdToUpdate");
exit();
?>
