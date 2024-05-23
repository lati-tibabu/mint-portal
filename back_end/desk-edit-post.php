<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $deskIdToUpdate = $_POST["desk_id"];
    $deskName = $_POST["desk-name"];
    $deskDescription = $_POST["desk-description"];
    $deskOfficeId = $_POST["desk-office"];

    $query = "UPDATE desk SET desk_name = ?, desk_description = ?, office_id = ? WHERE desk_id = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssii", $deskName, $deskDescription, $deskOfficeId, $deskIdToUpdate);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Desk updated!')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($con);

// Redirect back to the edit page with the desk_id
header("Location: ../admin-content/cms-pages/edit_items_desk.php?desk_id_no=$deskIdToUpdate");
exit();
?>
