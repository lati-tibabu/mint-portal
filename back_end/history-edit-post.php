<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $historyIdToUpdate = $_POST["history_id"];
    $historyEvent = $_POST["history-event"];
    $historyYear = $_POST["history-year"];

    $query = "UPDATE mint_history SET history_event = ?, history_year = ? WHERE history_id = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssi", $historyEvent, $historyYear, $historyIdToUpdate);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('History updated!')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($con);

// Redirect to the appropriate page after updating
header("Location: ../admin-content/cms-pages/edit_items_history.php?history_id_no=$historyIdToUpdate");
exit();
?>
